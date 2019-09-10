<?php

class Rab_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }
  public function get_gaji_rab($kd_area)
  {
    $sql = "SELECT gaji, gaji_magang FROM gaji WHERE kd_area = ? AND kd_pekerjaan = '-2'";
    $query = $this->db->query($sql, array($kd_area));
    return $query->row_array();
  }

  public function get_pegawai_rab($username)
  {
    $sql = 'SELECT username, status_pegawai FROM pegawai WHERE username = ?';
    $query = $this->db->query($sql, array($username));
    return $query->row_array();
  }

  public function get_pemesanan($kd_pemesanan)
  {
    $sql = 'SELECT A.nama_event, A.lokasi, A.pemegang_rab, A.tgl_mulai, DATE(A.tgl_selesai) AS tgl_selesai, A.jumlah_rab, A.diskon, A.fee_penjualan, B.nama AS klien, B.company, C.nama AS kota
                              FROM pemesanan_klien AS A
                              JOIN klien AS B
                              ON A.kd_klien = B.kd_klien
                              JOIN kota AS C
                              ON A.kd_kota = C.kd_kota
                              WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_pemesanan2($kd_pemesanan)
  {
    $sql = 'SELECT A.tgl_mulai, DATE(A.tgl_selesai) AS tgl_selesai, A.diskon, A.fee_penjualan, B.nama AS klien
                              FROM pemesanan_klien AS A
                              JOIN klien AS B
                              ON A.kd_klien = B.kd_klien
                              WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_detail_pemesanan($kd_pemesanan)
  {
    $sql = "SELECT b.nama, a.harga_jual, a.tgl, a.keterangan FROM detail_pemesanan AS a
	           JOIN jenis_pesanan AS b ON a.kd_jenis_pesanan = b.kd_jenis_pesanan
	           JOIN pemesanan_klien AS c ON a.kd_pemesanan = c.kd_pemesanan AND c.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_sdm_event($kd_pemesanan)
  {
    $sql = 'SELECT username, pekerjaan1, pekerjaan2, pekerjaan3, tgl, gaji, uang_makan FROM sdm_event WHERE kd_pemesanan = ? AND pekerjaan1 != "-2" ORDER BY tgl ASC';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_sdm($kd_pemesanan)
  {
    $sql = 'SELECT username FROM sdm_event WHERE kd_pemesanan = ? GROUP BY username ASC';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_alat_sewa_event($kd_pemesanan)
  {
    $sql = 'SELECT a.nama, a.jumlah, a.harga, b.nama AS vendor FROM alat_sewa_event AS a
	          JOIN vendor AS b ON a.kd_vendor = b.kd_vendor AND a.kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_pengeluaran_event($kd_pemesanan)
  {
    $sql = 'SELECT b.nama, a.harga, a.keterangan FROM pengeluaran_event AS a
	          JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
	          AND b.kd_jenis_pengeluaran !="777" AND b.kd_jenis_pengeluaran !="888" AND b.kd_jenis_pengeluaran != "999" AND a.kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_peralatan_event($kd_pemesanan)
  {
    $sql = 'SELECT kd_peralatan FROM peralatan_event WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_pegawai()
  {
    $query = $this->db->query("SELECT username FROM pegawai ORDER BY username ASC");
    return $query->result_array();
  }

  public function get_total_gaji($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '511 - Gaji' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_total_konsumsi($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '512 - Konsumsi' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_total_trasportasi($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '513 - Transportasi' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_total_sewa_alat($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '514 - Sewa Alat' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_total_akomodasi($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '515 - Akomodasi' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_total_komunikasi($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '516 - Komunikasi' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }
  public function get_total_cetak($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '517 - Cetak' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_total_habis_pakai($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '518 - Habis Pakai' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_total_marketing($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '519 - Marketing' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_total_fee_penjualan($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '520 - Fee Penjualan' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_total_lain($kd_pemesanan)
  {
    $sql = "SELECT SUM(a.harga) AS total FROM pengeluaran_event AS a JOIN jenis_pengeluaran AS b ON a.kd_jenis_pengeluaran = b.kd_jenis_pengeluaran
    AND b.kategori_biaya = '529 - Lain-lain' AND a.kd_pemesanan = ?";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_pekerjaan($kd_area)
  {
    $query = $this->db->query("SELECT kd_pekerjaan, nama FROM pekerjaan");
    return $query->result_array();
  }

  public function get_area($kd_pemesanan)
  {
    $sql = 'SELECT C.kd_area
            FROM pemesanan_klien AS A
            JOIN kota AS B ON A.kd_kota = B.kd_kota
            JOIN area AS C ON B.kd_area = C.kd_area AND A.kd_pemesanan = ?';

    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_pekerjaan_saya($kd_pemesanan)
  {
    $username = $this->session->userdata('ses_id');

    $sql = 'SELECT username, pekerjaan1, pekerjaan2, pekerjaan3, tgl, gaji, uang_makan FROM sdm_event
            WHERE kd_pemesanan = ? AND username = ? ORDER BY tgl ASC';

    $query = $this->db->query($sql, array($kd_pemesanan, $username));
    return $query->result_array();
  }

  public function get_harga_jual($kd_pemesanan)
  {
    $sql = 'SELECT SUM(harga_jual) AS total FROM detail_pemesanan WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_pengeluaran($kd_pemesanan)
  {
    $sql = 'SELECT SUM(harga) AS total FROM pengeluaran_event WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_jumlah_rab($kd_pemesanan)
  {
    $sql = 'SELECT jumlah_rab FROM pemesanan_klien WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_diskon($kd_pemesanan)
  {
    $sql = 'SELECT diskon FROM pemesanan_klien WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function tambah_jumlah_rab($kd_pemesanan, $jumlah){
    $data = array(
      'jumlah_rab'      => $jumlah
    );
    $this->db->where('kd_pemesanan', $kd_pemesanan);
    return $this->db->update('pemesanan_klien', $data);
  }

  public function tambah_diskon($kd_pemesanan, $jumlah){
    $data = array(
      'diskon'      => $jumlah
    );
    $this->db->where('kd_pemesanan', $kd_pemesanan);
    return $this->db->update('pemesanan_klien', $data);
  }

  public function tambah_pemegang_rab($kd_pemesanan, $rab){

    $data = array(
      'pemegang_rab'      => $rab
    );
    $this->db->where('kd_pemesanan', $kd_pemesanan);
    return $this->db->update('pemesanan_klien', $data);
  }

  public function tambah_nama_fee($kd_pemesanan, $nama_fee){

    $data = array(
      'fee_penjualan' => $nama_fee
    );
    $this->db->where('kd_pemesanan', $kd_pemesanan);
    return $this->db->update('pemesanan_klien', $data);
  }

  public function tambah_persen_fee($kd_pemesanan, $persen_fee, $fee_penjualan){

      $data = array(
        'kd_pemesanan'  => $kd_pemesanan,
        'kd_jenis_pengeluaran'  => '777',
        'harga'     => $fee_penjualan,
        'keterangan'     => $persen_fee
        );

  return $this->db->insert('pengeluaran_event', $data);
  }

  public function hapus_pengeluaran_fee_penjualan($kd_pemesanan){
    return $this->db->delete('pengeluaran_event', array('kd_pemesanan' => $kd_pemesanan, 'kd_jenis_pengeluaran' => '777'));
  }

  public function get_fee_penjualan($kd_pemesanan)
  {
    $sql = 'SELECT keterangan FROM pengeluaran_event WHERE kd_jenis_pengeluaran = "777" AND kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function tambah_gaji_rab($gaji_rab){

      $data = array(
        'kd_pemesanan' => $gaji_rab['kd_pemesanan'],
        'username' => $gaji_rab['username'],
        'pekerjaan1' => $gaji_rab['pekerjaan1'],
        'gaji' => $gaji_rab['gaji'],
        'uang_makan' => 0
        );

  return $this->db->insert('sdm_event', $data);
  }

  public function hapus_gaji_rab($kd_pemesanan){
    return $this->db->delete('sdm_event', array('kd_pemesanan' => $kd_pemesanan, 'pekerjaan1' => '-2' ));
  }

}
?>
