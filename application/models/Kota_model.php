<?php

class Kota_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_kota($kd_kota = FALSE)
  {
    if ($kd_kota === FALSE) {
      $query = $this->db->query('SELECT kota.*, area.nama AS area FROM kota JOIN area ON kota.kd_area = area.kd_area');
      return $query->result_array();
    }
    $sql = 'SELECT * FROM kota WHERE kota.kd_kota = ?';
    $query = $this->db->query($sql, array($kd_kota));
    return $query->row_array();
  }

  public function get_area()
  {
    $query = $this->db->query("SELECT kd_area, nama FROM area WHERE status = 'on' ORDER BY nama");
    return $query->result_array();
  }

/*
  public function get_kd_kota($kd_kota = FALSE)
  {
    $query = $this->db->get_where('kota', array('kd_kota' => $kd_kota));
    return $query->row_array();
  }
*/
  public function tambah_kota(){
    $data = array(
      'kd_kota'  => NULL,
      'nama'      => $this->input->post('nama'),
      'kd_area'     => $this->input->post('area'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('kota', $data);
  }

  public function ubah_kota($kd_kota){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'kd_area'     => $this->input->post('area'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_kota', $kd_kota);
    return $this->db->update('kota', $data);
  }

  public function hapus_kota($kd_kota){
    return $this->db->delete('kota', array('kd_kota' => $kd_kota ));
  }
}
?>
