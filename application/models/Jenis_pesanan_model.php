<?php

class Jenis_pesanan_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_jenis_pesanan($kd_jenis_pesanan = FALSE)
  {
    if ($kd_jenis_pesanan === FALSE) {
      $query = $this->db->get('jenis_pesanan');
      return $query->result_array();
    }
    $query = $this->db->get_where('jenis_pesanan', array('kd_jenis_pesanan' => $kd_jenis_pesanan));
    return $query->row_array();
  }
/*
  public function get_kd_jenis_pesanan($kd_jenis_pesanan = FALSE)
  {
    $query = $this->db->get_where('jenis_pesanan', array('kd_jenis_pesanan' => $kd_jenis_pesanan));
    return $query->row_array();
  }
*/
  public function tambah_jenis_pesanan(){
    $data = array(
      'kd_jenis_pesanan'  => NULL,
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('jenis_pesanan', $data);
  }

  public function ubah_jenis_pesanan($kd_jenis_pesanan){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_jenis_pesanan', $kd_jenis_pesanan);
    return $this->db->update('jenis_pesanan', $data);
  }

  public function hapus_jenis_pesanan($kd_jenis_pesanan){
    return $this->db->delete('jenis_pesanan', array('kd_jenis_pesanan' => $kd_jenis_pesanan ));
  }
}
?>
