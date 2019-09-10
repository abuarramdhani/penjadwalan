<?php

class Merk_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_merk($kd_merk = FALSE)
  {
    if ($kd_merk === FALSE) {
      $query = $this->db->get('merk');
      return $query->result_array();
    }
    $query = $this->db->get_where('merk', array('kd_merk' => $kd_merk));
    return $query->row_array();
  }
/*
  public function get_kd_merk($kd_merk = FALSE)
  {
    $query = $this->db->get_where('merk', array('kd_merk' => $kd_merk));
    return $query->row_array();
  }
*/
  public function tambah_merk(){
    $data = array(
      'kd_merk'  => NULL,
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('merk', $data);
  }

  public function ubah_merk($kd_merk){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_merk', $kd_merk);
    return $this->db->update('merk', $data);
  }

  public function hapus_merk($kd_merk){
    return $this->db->delete('merk', array('kd_merk' => $kd_merk ));
  }
}
?>
