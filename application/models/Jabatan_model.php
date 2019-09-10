<?php

class Jabatan_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_jabatan($kd_jabatan = FALSE)
  {
    if ($kd_jabatan === FALSE) {
      $query = $this->db->get('jabatan');
      return $query->result_array();
    }
    $query = $this->db->get_where('jabatan', array('kd_jabatan' => $kd_jabatan));
    return $query->row_array();
  }
/*
  public function get_kd_jabatan($kd_jabatan = FALSE)
  {
    $query = $this->db->get_where('jabatan', array('kd_jabatan' => $kd_jabatan));
    return $query->row_array();
  }
*/
  public function tambah_jabatan(){
    $data = array(
      'kd_jabatan'  => NULL,
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('jabatan', $data);
  }

  public function ubah_jabatan($kd_jabatan){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_jabatan', $kd_jabatan);
    return $this->db->update('jabatan', $data);
  }

  public function hapus_jabatan($kd_jabatan){
    return $this->db->delete('jabatan', array('kd_jabatan' => $kd_jabatan ));
  }
}
?>
