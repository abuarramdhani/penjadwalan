<?php

class Area_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_area($kd_area = FALSE)
  {
    if ($kd_area === FALSE) {
      $query = $this->db->get('area');
      return $query->result_array();
    }
    $query = $this->db->get_where('area', array('kd_area' => $kd_area));
    return $query->row_array();
  }
/*
  public function get_kd_area($kd_area = FALSE)
  {
    $query = $this->db->get_where('area', array('kd_area' => $kd_area));
    return $query->row_array();
  }
*/
  public function tambah_area(){
    $data = array(
      'kd_area'  => NULL,
      'nama'      => $this->input->post('nama'),
      'uang_makan'     => $this->input->post('uang_makan'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('area', $data);
  }

  public function ubah_area($kd_area){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'uang_makan'     => $this->input->post('uang_makan'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_area', $kd_area);
    return $this->db->update('area', $data);
  }

  public function hapus_area($kd_area){
    return $this->db->delete('area', array('kd_area' => $kd_area ));
  }
}
?>
