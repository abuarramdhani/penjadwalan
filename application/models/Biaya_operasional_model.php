<?php

class Jenis_pengeluaran_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_jenis_pengeluaran($kd_jenis_pengeluaran = FALSE)
  {
    if ($kd_jenis_pengeluaran === FALSE) {
      $query = $this->db->get('jenis_pengeluaran');
      return $query->result_array();
    }
    $query = $this->db->get_where('jenis_pengeluaran', array('kd_jenis_pengeluaran' => $kd_jenis_pengeluaran));
    return $query->row_array();
  }

  public function get_kd_jenis_pengeluaran($kd_jenis_pengeluaran)
  {
    $sql = "SELECT kd_jenis_pengeluaran FROM jenis_pengeluaran WHERE kd_jenis_pengeluaran = ?";
    $query = $this->db->query($sql, array($kd_jenis_pengeluaran));
    return $query->row_array();
  }

  public function tambah_jenis_pengeluaran(){
    $data = array(
      'kd_jenis_pengeluaran'  => $this->input->post('kode'),
      'nama'      => $this->input->post('nama'),
      'status'     => $this->input->post('status')
    );
    return $this->db->insert('jenis_pengeluaran', $data);
  }

  public function ubah_jenis_pengeluaran($kd_jenis_pengeluaran){

    $data = array(
      'kd_jenis_pengeluaran' => $this->input->post('kode'),
      'nama' => $this->input->post('nama'),
      'status' => $this->input->post('status')
    );
    $this->db->where('kd_jenis_pengeluaran', $kd_jenis_pengeluaran);
    return $this->db->update('jenis_pengeluaran', $data);
  }

  public function hapus_jenis_pengeluaran($kd_jenis_pengeluaran){
    return $this->db->delete('jenis_pengeluaran', array('kd_jenis_pengeluaran' => $kd_jenis_pengeluaran ));
  }
}
?>
