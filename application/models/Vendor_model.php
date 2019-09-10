<?php

class Vendor_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_vendor($kd_vendor = FALSE)
  {
    if ($kd_vendor === FALSE) {
      $query = $this->db->get('vendor');
      return $query->result_array();
    }
    $query = $this->db->get_where('vendor', array('kd_vendor' => $kd_vendor));
    return $query->row_array();
  }

  public function get_email_vendor($email)
  {
    $this->db->select('email');
    $query = $this->db->get_where('vendor', array('email' => $email));
    return $query->row_array();
  }

  public function tambah_vendor(){
    $data = array(
      'kd_vendor'  => NULL,
      'nama'      => $this->input->post('nama'),
      'no_hp'     => $this->input->post('hp'),
      'alamat'     => $this->input->post('alamat'),
      'email'     => $this->input->post('email'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('vendor', $data);
  }

  public function ubah_vendor($kd_vendor){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'no_hp'     => $this->input->post('hp'),
      'alamat'     => $this->input->post('alamat'),
      'email'     => $this->input->post('email'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_vendor', $kd_vendor);
    return $this->db->update('vendor', $data);
  }

  public function hapus_vendor($kd_vendor){
    return $this->db->delete('vendor', array('kd_vendor' => $kd_vendor ));
  }
}
?>
