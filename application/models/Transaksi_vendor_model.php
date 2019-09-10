<?php

class Transaksi_vendor_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_peminjaman($kd_peminjaman = FALSE)
  {
    if ($kd_peminjaman === FALSE) {
      $query = $this->db->query('SELECT peminjaman_vendor.*, vendor.nama AS vendor
                                  FROM peminjaman_vendor
                                  JOIN vendor ON peminjaman_vendor.kd_vendor = vendor.kd_vendor ORDER BY peminjaman_vendor.kd_peminjaman ASC');
      return $query->result_array();
    }
    $sql = 'SELECT * FROM peminjaman_vendor WHERE peminjaman_vendor.kd_peminjaman = ?';
    $query = $this->db->query($sql, array($kd_peminjaman));
    return $query->row_array();
  }

  public function get_pengembalian()
  {
    $query = $this->db->query('SELECT pengembalian_vendor.*, vendor.nama AS vendor
                                FROM pengembalian_vendor
                                JOIN peminjaman_vendor ON pengembalian_vendor.kd_peminjaman = peminjaman_vendor.kd_peminjaman
                                JOIN vendor ON peminjaman_vendor.kd_vendor = vendor.kd_vendor');
      return $query->result_array();
    }

  public function get_peralatan_sewa()
  {
    $query = $this->db->query("SELECT detail_peminjaman.*, vendor.nama AS vendor, peminjaman_vendor.tgl_pinjam, peminjaman_vendor.tgl_kembali
                                FROM detail_peminjaman
                                JOIN peminjaman_vendor
                                ON detail_peminjaman.kd_peminjaman = peminjaman_vendor.kd_peminjaman AND peminjaman_vendor.status = 'dipinjam'
                                JOIN vendor
                                ON peminjaman_vendor.kd_vendor = vendor.kd_vendor");
      return $query->result_array();
    }


  public function get_vendor()
  {
    $query = $this->db->query("SELECT kd_vendor, nama FROM vendor WHERE status = 'on'");
    return $query->result_array();
  }


  public function get_detail_peminjaman($kd_peminjaman)
  {
    $sql = "SELECT detail_peminjaman.*
    FROM detail_peminjaman
    JOIN peminjaman_vendor
    ON detail_peminjaman.kd_peminjaman = peminjaman_vendor.kd_peminjaman
    AND peminjaman_vendor.kd_peminjaman = ?";
    $query = $this->db->query($sql, array($kd_peminjaman));
    return $query->result_array();
  }

  public function get_detail($kd_peminjaman)
  {
    $sql = "SELECT a.*, b.*, c.nama AS vendor
            FROM detail_peminjaman AS a
            JOIN peminjaman_vendor AS b
            ON a.kd_peminjaman = b.kd_peminjaman
            JOIN vendor AS c
            ON b.kd_vendor = c.kd_vendor
            AND b.kd_peminjaman = ?";
    $query = $this->db->query($sql, array($kd_peminjaman));
    return $query->result_array();
  }

  public function get_nama_alat($kd_peminjaman)
  {
    $sql = "SELECT detail_peminjaman.nama_alat
    FROM detail_peminjaman
    JOIN peminjaman_vendor
    ON detail_peminjaman.kd_peminjaman = peminjaman_vendor.kd_peminjaman
    AND peminjaman_vendor.kd_peminjaman = ?";
    $query = $this->db->query($sql, array($kd_peminjaman));
    return $query->result_array();
  }

  public function hitung_kode()
  {
    $query = $this->db->query("SELECT kd_peminjaman FROM peminjaman_vendor ORDER BY kd_peminjaman DESC");
    return $query->result_array();
  }


  public function tambah_peminjaman(){

    $data = array(
      'kd_peminjaman'  => $this->session->userdata('kd_peminjaman'),
      'kd_vendor'     => $this->session->userdata('vendor'),
      'tgl_pinjam'      => $this->session->userdata('tgl_pinjam'),
      'tgl_kembali'      => $this->session->userdata('tgl_kembali'),
      'status'     => 'dipinjam'
    );
    return $this->db->insert('peminjaman_vendor', $data);
  }

  public function tambah_detail_peminjaman(){
      $peminjaman = $this->session->userdata('peminjaman');
      $data = array();
      foreach($peminjaman AS $key => $value){
        $data[] = array(
          'kd_detail_peminjaman'  => NULL,
          'kd_peminjaman'  => $value['kd_peminjaman'],
          'nama_alat'     => $value['nama_alat'],
          'jumlah'      => $value['jumlah'],
          'harga_sewa'      => $value['harga_sewa']
          );
    }
    return $this->db->insert_batch('detail_peminjaman', $data);
  }

  public function ubah_peminjaman($kd_peminjaman){
    //ubah format tanggal
    $tgl = $this->input->post('tgl');
    $tgl = explode(" ", $tgl);

    $tgl1 = $tgl['0'];
    $tgl1 = explode("/",$tgl1);
    $d1 = $tgl1['0'];
    $m1 = $tgl1['1'];
    $y1 = $tgl1['2'];
    $tanggal1 = array($y1, $m1, $d1);
    $tgl_pinjam = implode("-", $tanggal1);

    $tgl2 = $tgl['2'];
    $tgl2 = explode("/",$tgl2);
    $d2 = $tgl2['0'];
    $m2 = $tgl2['1'];
    $y2 = $tgl2['2'];
    $tanggal2 = array($y2, $m2, $d2);
    $tgl_kembali = implode("-", $tanggal2);

    $data = array(
      'kd_vendor'     => $this->input->post('vendor'),
      'tgl_pinjam'      => $tgl_pinjam,
      'tgl_kembali'      => $tgl_kembali
    );
    $this->db->where('kd_peminjaman', $kd_peminjaman);
    return $this->db->update('peminjaman_vendor', $data);
  }

  public function ubah_detail_peminjaman($kd_peminjaman){
    $peminjaman = $this->session->userdata('peminjaman');
    $result = array();
    foreach($peminjaman AS $key => $val){
      $result[] = array(
        'nama_alat'     => $_SESSION['nama_alat'][$key],
        'jumlah'      => $_SESSION['jumlah'][$key],
        'harga_sewa'      => $_SESSION['harga_sewa'][$key]
 );
}
$this->db->update_batch('detail_peminjaman', $set=$data, $kd_peminjaman);
  }

  public function hapus_peminjaman($kd_peminjaman){
    return $this->db->delete('peminjaman_vendor', array('kd_peminjaman' => $kd_peminjaman ));
  }

  public function hapus_detail_peminjaman($kd_peminjaman){
    return $this->db->delete('detail_peminjaman', array('kd_peminjaman' => $kd_peminjaman ));
  }

  public function konfirmasi_vendor($kd_peminjaman){
    $data = array(
      'kd_pengembalian_vendor'     => NULL,
      'kd_peminjaman'  => $kd_peminjaman,
      'tgl'      => $this->input->post('tgl')
    );
    return $this->db->insert('pengembalian_vendor', $data);
  }

  public function pembatalan($kd_peminjaman){
    $data = array('status' => 'dibatalkan');
    $this->db->where('kd_peminjaman', $kd_peminjaman);
    return $this->db->update('peminjaman_vendor', $data);
  }
}
?>
