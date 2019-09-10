<?php

class Pekerjaan_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_pekerjaan($kd_pekerjaan = FALSE)
  {
    if ($kd_pekerjaan === FALSE) {
      $query = $this->db->query('SELECT * FROM pekerjaan');
      return $query->result_array();
    }
    $query = $this->db->get_where('pekerjaan', array('kd_pekerjaan' => $kd_pekerjaan));
    return $query->row_array();
  }
/*
  public function get_kd_pekerjaan($kd_pekerjaan = FALSE)
  {
    $query = $this->db->get_where('pekerjaan', array('kd_pekerjaan' => $kd_pekerjaan));
    return $query->row_array();
  }
*/
  public function tambah_pekerjaan(){
    $data = array(
      'kd_pekerjaan'  => NULL,
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('pekerjaan', $data);
  }

  public function ubah_pekerjaan($kd_pekerjaan){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_pekerjaan', $kd_pekerjaan);
    return $this->db->update('pekerjaan', $data);
  }

  public function hapus_pekerjaan($kd_pekerjaan){
    return $this->db->delete('pekerjaan', array('kd_pekerjaan' => $kd_pekerjaan ));
  }
}
?>
