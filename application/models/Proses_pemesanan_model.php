<?php

class Proses_pemesanan_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }
  
  public function cek_sdm_temp()
  {
    $query = $this->db->query("SELECT * FROM information_schema.tables WHERE TABLE_SCHEMA = 'penjadwalan' AND TABLE_NAME = 'sdm_temp' LIMIT 1");
    return $query->row_array();
  }

  public function buat_sdm_temp()
  {
    $this->db->query("CREATE TABLE sdm_temp(nomer VARCHAR(10), kd_pemesanan VARCHAR(10), username VARCHAR(150), pekerjaan1 VARCHAR(10), pekerjaan2 VARCHAR(10), pekerjaan3 VARCHAR(10), tgl VARCHAR(20), gaji INT(10), uang_makan INT(10), cek VARCHAR(200));");
  }

  public function tambah_sdm_temp(){
    $proses = $_SESSION['proses_sdm'];
    $data = array();
    foreach($proses AS $key => $value){

      $data[] = array(
        'nomer' => $key,
        'kd_pemesanan' => $value['kd_pemesanan'],
        'username' => $value['username'],
        'pekerjaan1' => $value['pekerjaan1'],
        'pekerjaan2' => $value['pekerjaan2'],
        'pekerjaan3' => $value['pekerjaan3'],
        'tgl' => $value['tgl'],
        'gaji' => $value['gaji'],
        'uang_makan' => $value['uang_makan'],
        'cek' => $value['cek']
        );
  }
  return $this->db->insert_batch('sdm_temp', $data);
  }

  public function get_sdm_temp()
  {
    $query = $this->db->query("SELECT * FROM sdm_temp");
    return $query->result_array();
  }

  public function hapus_sdm_temp()
  {
    $query = $this->db->query("DELETE FROM sdm_temp");
  }

  public function drop_sdm_temp()
  {
    $query = $this->db->query("DROP TABLE sdm_temp");
  }

  public function get_driver()
  {
    $kd_pemesanan = $_SESSION['kd_pemesanan'];
    $sql = "SELECT 'Driver' AS pekerjaan, COUNT(username) AS jumlah FROM sdm_temp WHERE pekerjaan1 = '-1' OR pekerjaan2 = '-1' OR pekerjaan3 = '-1'";
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_gaji_rab($kd_area)
  {
    $sql = "SELECT gaji, gaji_magang FROM gaji WHERE kd_area = ? AND kd_pekerjaan = '-2'";
    $query = $this->db->query($sql, array($kd_area));
    return $query->row_array();
  }

  public function get_jumlah_rab($kd_pemesanan)
  {
    $sql = 'SELECT SUM(harga) AS jumlah_rab FROM pengeluaran_event WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_peralatan_event($kd_pemesanan)
  {
    $sql = 'SELECT kd_pemesanan, kd_peralatan FROM peralatan_event WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_alat_sewa_event($kd_pemesanan)
  {
    $sql = 'SELECT * FROM alat_sewa_event WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_pengeluaran_event($kd_pemesanan)
  {
    $sql = 'SELECT kd_pemesanan, kd_jenis_pengeluaran, harga, keterangan FROM pengeluaran_event WHERE kd_jenis_pengeluaran != "777" AND kd_jenis_pengeluaran !="888" AND kd_jenis_pengeluaran != "999" AND kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_sdm_event($kd_pemesanan)
  {
    $sql = 'SELECT kd_pemesanan, username, pekerjaan1, pekerjaan2, pekerjaan3, tgl, gaji, uang_makan FROM sdm_event WHERE kd_pemesanan = ? AND pekerjaan1 != "-2"';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function get_pemesanan($kd_pemesanan)
  {
    $sql = 'SELECT A.tgl_mulai, DATE(A.tgl_selesai) AS tgl_selesai, C.kd_area, C.uang_makan
            FROM pemesanan_klien AS A
            JOIN kota AS B ON A.kd_kota = B.kd_kota
            JOIN area AS C ON B.kd_area = C.kd_area AND A.kd_pemesanan = ?';

    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_pemesanan2($kd_pemesanan)
  {
    $sql = 'SELECT A.tgl_mulai, DATE(A.tgl_selesai) AS tgl_selesai
            FROM pemesanan_klien AS A WHERE A.kd_pemesanan = ?';

    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_detail_pemesanan($kd_pemesanan)
  {
    $sql = 'SELECT b.nama, a.keterangan, a.tgl, a.harga_jual FROM detail_pemesanan AS a
	           JOIN jenis_pesanan AS b ON a.kd_jenis_pesanan = b.kd_jenis_pesanan
             WHERE a.kd_pemesanan = ?';

    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

  public function email($username)
  {
    $sql = 'SELECT nama, email FROM pegawai WHERE username = ?';

    $query = $this->db->query($sql, array($username));
    return $query->row_array();
  }

  public function get_peralatan($tgl_mulai, $tgl_selesai, $kd_pemesanan)
  {
    $sql = 'CALL pilih_peralatan(?, ?, ?) ';
    $query = $this->db->query($sql, array($tgl_mulai, $tgl_selesai, $kd_pemesanan));
    return $query->result_array();
  }

  public function get_vendor()
  {
    $query = $this->db->query("SELECT kd_vendor, nama FROM vendor WHERE status ='on' ORDER BY nama");
    return $query->result_array();
  }

  public function get_jenis_pengeluaran()
  {
    $query = $this->db->query("SELECT * FROM jenis_pengeluaran WHERE status = 'on' ORDER BY nama");
    return $query->result_array();
  }

  public function get_jenis_pengeluaran2()
  {
    $query = $this->db->query("SELECT * FROM jenis_pengeluaran ORDER BY nama");
    return $query->result_array();
  }

  public function get_pegawai($tgl_mulai, $tgl_selesai, $kd_pemesanan)
  {
    $sql = 'CALL pilih_sdm(?, ?, ?)';
    $query = $this->db->query($sql, array($tgl_mulai, $tgl_selesai, $kd_pemesanan));
    return $query->result_array();
  }

  public function get_pegawai_edit($username)
  {
    $sql = 'SELECT username, status_pegawai FROM pegawai WHERE username = ?';
    $query = $this->db->query($sql, array($username));
    return $query->row_array();
  }

  public function get_rab($kd_pemesanan){
    $sql = 'SELECT pemegang_rab FROM pemesanan_klien WHERE kd_pemesanan = ?';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->row_array();
  }

  public function get_pekerjaan($kd_area)
  {
    $sql = 'SELECT A.*, B.gaji, B.gaji_magang
                              FROM pekerjaan AS A
                              JOIN gaji AS B ON A.kd_pekerjaan = B.kd_pekerjaan
                              JOIN area AS C ON B.kd_area = C.kd_area AND C.kd_area = ? AND A.status = "on" AND A.kd_pekerjaan != "-2" ORDER BY A.nama';

    $query = $this->db->query($sql, array($kd_area));
    return $query->result_array();
  }

  public function get_pekerjaan2($kd_area)
  {
    $sql = 'SELECT A.*, B.gaji, B.gaji_magang
                              FROM pekerjaan AS A
                              JOIN gaji AS B ON A.kd_pekerjaan = B.kd_pekerjaan
                              JOIN area AS C ON B.kd_area = C.kd_area AND C.kd_area = ? ORDER BY A.nama';

    $query = $this->db->query($sql, array($kd_area));
    return $query->result_array();
  }

  public function get_pekerjaan_edit($kd_area, $kd_pekerjaan)
  {
    $sql = 'SELECT A.kd_pekerjaan, B.gaji, B.gaji_magang
            FROM pekerjaan AS A
            JOIN gaji AS B ON A.kd_pekerjaan = B.kd_pekerjaan
            JOIN area AS C ON B.kd_area = C.kd_area AND C.kd_area = ? AND A.kd_pekerjaan = ?';

    $query = $this->db->query($sql, array($kd_area, $kd_pekerjaan));
    return $query->row_array();
  }

  public function tambah_peralatan(){
    $proses = $_SESSION['proses_peralatan'];
    $data = array();
    foreach($proses AS $key => $value){
      $data[] = array(
        'kd_pemesanan'  => $value['kd_pemesanan'],
        'kd_peralatan'     => $value['kd_peralatan']
        );
  }
  return $this->db->insert_batch('peralatan_event', $data);
  }

  public function tambah_alat_sewa(){
    $proses = $_SESSION['proses_alat_sewa'];
    $data = array();
    foreach($proses AS $key => $value){
      $data[] = array(
        'kd_pemesanan'  => $value['kd_pemesanan'],
        'nama'     => $value['nama'],
        'jumlah'     => $value['jumlah'],
        'harga'     => $value['harga'],
        'kd_vendor'     => $value['kd_vendor']
        );
  }
  return $this->db->insert_batch('alat_sewa_event', $data);
  }

  public function tambah_pengeluaran_alat_sewa($kd_pemesanan){
    $proses = $_SESSION['proses_alat_sewa'];
    $harga = 0;

    foreach($proses AS $key => $value){
      $harga = $harga + $value['harga'];
    }
    $data = array(
      'kd_pemesanan'  => $kd_pemesanan,
      'kd_jenis_pengeluaran'  => '888',
      'harga'     => $harga
    );
    return $this->db->insert('pengeluaran_event', $data);
  }

  public function tambah_pengeluaran(){
    $proses = $_SESSION['proses_pengeluaran'];
    $data = array();
    foreach($proses AS $key => $value){
      $data[] = array(
        'kd_pemesanan' => $value['kd_pemesanan'],
        'kd_jenis_pengeluaran' => $value['kd_jenis_pengeluaran'],
        'harga' => $value['harga'],
        'keterangan' => $value['keterangan']
        );
  }
  return $this->db->insert_batch('pengeluaran_event', $data);
  }

  public function tambah_sdm(){
    $proses = $this->session->userdata('proses_sdm');
    $data = array();
    foreach($proses AS $key => $value){
      $tgl = explode("-", $value['tgl']);
      $d = $tgl['0'];
      $m = $tgl['1'];
      $y = $tgl['2'];
      $tanggal = array($y, $m, $d);
      $tanggal = implode("-", $tanggal);

      $data[] = array(
        'kd_pemesanan' => $value['kd_pemesanan'],
        'username' => $value['username'],
        'pekerjaan1' => $value['pekerjaan1'],
        'pekerjaan2' => $value['pekerjaan2'],
        'pekerjaan3' => $value['pekerjaan3'],
        'tgl' => $tanggal,
        'gaji' => $value['gaji'],
        'uang_makan' => $value['uang_makan']
        );
  }
  return $this->db->insert_batch('sdm_event', $data);
  }

  public function tambah_gaji_rab(){
    $gaji_rab = $this->session->userdata('gaji_rab');

      $data = array(
        'kd_pemesanan' => $gaji_rab['kd_pemesanan'],
        'username' => $gaji_rab['username'],
        'pekerjaan1' => $gaji_rab['pekerjaan1'],
        'gaji' => $gaji_rab['gaji'],
        'uang_makan' => 0
        );

  return $this->db->insert('sdm_event', $data);
  }

  public function tambah_pengeluaran_gaji($kd_pemesanan){
    $proses = $_SESSION['proses_sdm'];
    $gaji = 0;

    foreach($proses AS $key => $value){
      $gaji = $gaji + ($value['gaji']+$value['uang_makan']);
    }
    $data = array(
      'kd_pemesanan'  => $kd_pemesanan,
      'kd_jenis_pengeluaran'  => '999',
      'harga'     => $gaji
    );
    return $this->db->insert('pengeluaran_event', $data);
  }

  public function tambah_rab($kd_pemesanan){
    $rab = $_SESSION['rab'];

    $data = array(
      'pemegang_rab'      => $rab
    );
    $this->db->where('kd_pemesanan', $kd_pemesanan);
    return $this->db->update('pemesanan_klien', $data);
  }

  public function tambah_jumlah_rab($kd_pemesanan, $jumlah){

    $data = array(
      'jumlah_rab'      => $jumlah
    );
    $this->db->where('kd_pemesanan', $kd_pemesanan);
    return $this->db->update('pemesanan_klien', $data);
  }

  public function hapus_peralatan($kd_pemesanan){
    return $this->db->delete('peralatan_event', array('kd_pemesanan' => $kd_pemesanan ));
  }

  public function hapus_alat_sewa($kd_pemesanan){
    return $this->db->delete('alat_sewa_event', array('kd_pemesanan' => $kd_pemesanan ));
  }

  public function hapus_pengeluaran_alat_sewa($kd_pemesanan){
    return $this->db->delete('pengeluaran_event', array('kd_pemesanan' => $kd_pemesanan, 'kd_jenis_pengeluaran' => '888' ));
  }

  public function hapus_pengeluaran($kd_pemesanan){
    $query = "DELETE FROM pengeluaran_event WHERE kd_jenis_pengeluaran != '777' AND kd_jenis_pengeluaran != '888' AND kd_jenis_pengeluaran != '999' AND kd_pemesanan = ?";
    return $this->db->query($query, array($kd_pemesanan));
  }

  public function hapus_sdm($kd_pemesanan){
    return $this->db->delete('sdm_event', array('kd_pemesanan' => $kd_pemesanan));
  }

  public function hapus_gaji_rab($kd_pemesanan){
    return $this->db->delete('sdm_event', array('kd_pemesanan' => $kd_pemesanan, 'pekerjaan1' => '-2' ));
  }

  public function hapus_pengeluaran_gaji($kd_pemesanan){
    return $this->db->delete('pengeluaran_event', array('kd_pemesanan' => $kd_pemesanan, 'kd_jenis_pengeluaran' => '999' ));
  }

}
?>
