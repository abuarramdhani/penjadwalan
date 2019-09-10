<?php

class Dashboard_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_pemesanan()
  {
    $username = $this->session->userdata('ses_id');

    $sql = "SELECT a.* FROM pemesanan_klien AS a
	          JOIN sdm_event AS b ON a.kd_pemesanan = b.kd_pemesanan AND b.username = ?
	            AND a.status NOT LIKE 'dibatalkan' GROUP BY a.kd_pemesanan";
    $query = $this->db->query($sql, array($username));
    return $query->result_array();
  }

  public function get_pemesanan2()
  {
    $query = $this->db->query("SELECT * FROM pemesanan_klien WHERE status NOT LIKE 'dibatalkan' ORDER BY kd_pemesanan");
    return $query->result_array();
  }

  public function get_klien()
  {
    $query = $this->db->query("SELECT * FROM klien");
    return $query->result_array();
  }

  public function pekerjaan_saya($kd_pemesanan)
  {
    $sql = 'SELECT pekerjaan1, pekerjaan2, pekerjaan3, tgl, gaji, uang_makan FROM sdm_event WHERE kd_pemesanan = ? ORDER BY tgl ASC';
    $query = $this->db->query($sql, array($kd_pemesanan));
    return $query->result_array();
  }

}
?>
