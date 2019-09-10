<?php

class Kategori_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_kategori($kd_kategori = FALSE)
  {
    if ($kd_kategori === FALSE) {
      $query = $this->db->get('kategori');
      return $query->result_array();
    }
    $query = $this->db->get_where('kategori', array('kd_kategori' => $kd_kategori));
    return $query->row_array();
  }
/*
  public function get_kd_kategori($kd_kategori = FALSE)
  {
    $query = $this->db->get_where('kategori', array('kd_kategori' => $kd_kategori));
    return $query->row_array();
  }
*/
  public function tambah_kategori(){
    $data = array(
      'kd_kategori'  => NULL,
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('kategori', $data);
  }

  public function ubah_kategori($kd_kategori){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_kategori', $kd_kategori);
    return $this->db->update('kategori', $data);
  }

  public function hapus_kategori($kd_kategori){
    return $this->db->delete('kategori', array('kd_kategori' => $kd_kategori ));
  }
}
?>
