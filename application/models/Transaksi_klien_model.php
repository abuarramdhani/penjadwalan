<?php

class Transaksi_klien_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_pemesanan($kd_pemesanan = FALSE)
  {
    if ($kd_pemesanan === FALSE) {
      $query = $this->db->query('SELECT A.*, B.nama AS klien, DATE(A.tgl_selesai) AS tgl_selesai
                                  FROM pemesanan_klien AS A
                                  JOIN klien AS B
                                  ON A.kd_klien = B.kd_klien');
      return $query->result_array();
    }
    $sql = 'SELECT A.*, B.nama AS klien, C.nama AS kota, DATE(A.tgl_selesai) AS tgl_selesai
                                FROM pemesanan_klien AS A
                                JOIN klien AS B
                                ON A.kd_klien = B.kd_klien
                                JOIN kota AS C
                                ON A.kd_kota = C.kd_kota
                                WHERE kd_pemesanan = ?';
            $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_pemesanan2()
  {
    $username = $this->session->userdata('ses_id');

    $sql = "SELECT A.*, B.nama AS klien, DATE(A.tgl_selesai) AS tgl_selesai
            FROM pemesanan_klien AS A
            JOIN klien AS B ON A.kd_klien = B.kd_klien
	          JOIN sdm_event AS C ON A.kd_pemesanan = C.kd_pemesanan AND C.username = ?
	          GROUP BY A.kd_pemesanan";
    $query = $this->db->query($sql, array($username));
    return $query->result_array();
  }

  public function get_pengembalian()
  {
    $query = $this->db->query('SELECT pengembalian_klien.*, klien.nama AS klien
                                FROM pengembalian_klien
                                JOIN pemesanan_klien ON pengembalian_klien.kd_pemesanan = pemesanan_klien.kd_pemesanan
                                JOIN klien ON pemesanan_klien.kd_klien = klien.kd_klien');
      return $query->result_array();
    }

  public function get_klien()
  {
    $query = $this->db->query("SELECT kd_klien, nama FROM klien WHERE status = 'on' ORDER BY nama ASC");
    return $query->result_array();
  }

  public function get_kota()
  {
    $query = $this->db->query("SELECT kd_kota, nama FROM kota WHERE status = 'on' ORDER BY nama ASC");
    return $query->result_array();
  }

  public function get_email()
  {
    $query = $this->db->query("SELECT nama, email FROM pegawai WHERE status = 'on' AND status_user = 'superadmin' ORDER BY nama ASC");
    return $query->result_array();
  }

  public function get_jenis_pesanan()
  {
    $query = $this->db->query("SELECT kd_jenis_pesanan, nama FROM jenis_pesanan WHERE status = 'on' ORDER BY nama ASC");
    return $query->result_array();
  }

  public function get_jenis_pesanan2()
  {
    $query = $this->db->query("SELECT kd_jenis_pesanan, nama FROM jenis_pesanan ORDER BY nama ASC");
    return $query->result_array();
  }

  public function get_detail_pemesanan($kd_pemesanan)
  {
    $sql = "SELECT detail_pemesanan.*
    FROM detail_pemesanan
    JOIN pemesanan_klien
    ON detail_pemesanan.kd_pemesanan = pemesanan_klien.kd_pemesanan
    AND pemesanan_klien.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_nama_alat($kd_pemesanan)
  {
    $sql = "SELECT detail_pemesanan.nama_alat
    FROM detail_pemesanan
    JOIN pemesanan_klien
    ON detail_pemesanan.kd_pemesanan = pemesanan_klien.kd_pemesanan
    AND pemesanan_klien.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function hitung_kode()
  {
    $query = $this->db->query("SELECT kd_pemesanan FROM pemesanan_klien ORDER BY kd_pemesanan DESC");
    return $query->result_array();
  }


  public function tambah_pemesanan(){
    //ubah format tanggal
    $tgl1 = $this->session->userdata('tgl_mulai');
    $tgl1 = explode("-",$tgl1);
    $d1 = $tgl1['0'];
    $m1 = $tgl1['1'];
    $y1 = $tgl1['2'];
    $tanggal1 = array($y1, $m1, $d1);
    $tgl_mulai = implode("-", $tanggal1);
    //ubah format tanggal
    $tgl2 = $this->session->userdata('tgl_selesai');
    $tgl2 = explode("-",$tgl2);
    $d2 = $tgl2['0'];
    $m2 = $tgl2['1'];
    $y2 = $tgl2['2'];
    $tanggal2 = array($y2, $m2, $d2);
    $tgl_selesai = implode("-", $tanggal2);

    $data = array(
      'kd_pemesanan'  => $this->session->userdata('kd_pemesanan'),
      'tipe_pesanan'  => $this->session->userdata('tipe_pesanan'),
      'kd_klien'     => $this->session->userdata('klien'),
      'kd_kota'     => $this->session->userdata('kota'),
      'nama_event'     => $this->session->userdata('nama_event'),
      'lokasi'     => $this->session->userdata('lokasi'),
      'tgl_mulai'      => $this->session->userdata('tgl_mulai'),
      'tgl_selesai'      => $this->session->userdata('tgl_selesai'),
      'status'     => 'menunggu',
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('pemesanan_klien', $data);
  }

  public function tambah_detail_pemesanan(){
      $pemesanan = $_SESSION['pemesanan'];
      $data = array();
      foreach($pemesanan AS $key => $value){
        $data[] = array(
          'kd_detail_pemesanan'  => NULL,
          'kd_pemesanan'  => $value['kd_pemesanan'],
          'kd_jenis_pesanan'     => $value['kd_jenis_pesanan'],
          'harga_jual'      => $value['harga_jual'],
          'keterangan'      => $value['keterangan'],
          'tgl'      => $value['tgl']
          );
    }
    return $this->db->insert_batch('detail_pemesanan', $data);
  }

  public function ubah_pemesanan($kd_pemesanan){
    //ubah format tanggal
    $tgl = $this->input->post('tgl');
    $tgl = explode(" ", $tgl);

    $tgl1 = $tgl['0'];
    $tgl1 = explode("/",$tgl1);
    $d1 = $tgl1['0'];
    $m1 = $tgl1['1'];
    $y1 = $tgl1['2'];
    $tanggal1 = array($y1, $m1, $d1);
    $tgl_mulai = implode("-", $tanggal1);

    $tgl2 = $tgl['2'];
    $tgl2 = explode("/",$tgl2);
    $d2 = $tgl2['0'];
    $m2 = $tgl2['1'];
    $y2 = $tgl2['2'];
    $tanggal2 = array($y2, $m2, $d2);
    $tgl_selesai = implode("-", $tanggal2)." 23:00:00";

    $data = array(
      'kd_klien'     => $this->input->post('klien'),
      'kd_kota'     => $this->input->post('kota'),
      'nama_event'     => $this->input->post('nama_event'),
      'lokasi'     => $this->input->post('lokasi'),
      'tgl_mulai'      => $tgl_mulai,
      'tgl_selesai'      => $tgl_selesai,
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_pemesanan', $kd_pemesanan);
    return $this->db->update('pemesanan_klien', $data);
  }

  public function hapus_pemesanan($kd_pemesanan){
    return $this->db->delete('pemesanan_klien', array('kd_pemesanan' => $kd_pemesanan ));
  }

  public function hapus_detail_pemesanan($kd_pemesanan){
    return $this->db->delete('detail_pemesanan', array('kd_pemesanan' => $kd_pemesanan ));
  }

  public function konfirmasi_klien($kd_pemesanan){

    $data = array(
      'kd_pengembalian_klien'     => NULL,
      'kd_pemesanan'  => $kd_pemesanan,
      'tgl'      => $this->input->post('tgl'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('pengembalian_klien', $data);
  }

  public function pembatalan($kd_pemesanan){
    $data = array('status' => 'dibatalkan');
    $this->db->where('kd_pemesanan', $kd_pemesanan);
    return $this->db->update('pemesanan_klien', $data);
  }
}
?>
