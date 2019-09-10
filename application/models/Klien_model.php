<?php

class Klien_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_klien($kd_klien = FALSE)
  {
    if ($kd_klien === FALSE) {
      $query = $this->db->get('klien');
      return $query->result_array();
    }
    $query = $this->db->get_where('klien', array('kd_klien' => $kd_klien));
    return $query->row_array();
  }

  public function get_email_klien($email)
  {
    $this->db->select('email');
    $query = $this->db->get_where('klien', array('email' => $email));
    return $query->row_array();
  }

  public function tambah_klien(){
    $data = array(
      'kd_klien'  => NULL,
      'nama'      => $this->input->post('nama'),
      'no_hp'     => $this->input->post('hp'),
      'alamat'     => $this->input->post('alamat'),
      'email'     => $this->input->post('email'),
      'company'     => $this->input->post('company'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('klien', $data);
  }

  public function ubah_klien($kd_klien){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'no_hp'     => $this->input->post('hp'),
      'alamat'     => $this->input->post('alamat'),
      'email'     => $this->input->post('email'),
      'company'     => $this->input->post('company'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_klien', $kd_klien);
    return $this->db->update('klien', $data);
  }

  public function hapus_klien($kd_klien){
    return $this->db->delete('klien', array('kd_klien' => $kd_klien ));
  }
}
?>
