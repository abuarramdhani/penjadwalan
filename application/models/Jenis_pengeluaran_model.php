<?php

class Jenis_pengeluaran_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_jenis_pengeluaran($kd_jenis_pengeluaran = FALSE)
  {
    if ($kd_jenis_pengeluaran === FALSE) {
      $query = $this->db->query("SELECT * FROM jenis_pengeluaran WHERE kategori_biaya NOT LIKE '511%' AND kategori_biaya NOT LIKE '514%' AND kategori_biaya NOT LIKE '520%'");
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
      'kd_jenis_pengeluaran'  => NULL,
      'nama'      => $this->input->post('nama'),
      'kategori_biaya'      => $this->input->post('kategori_biaya'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('jenis_pengeluaran', $data);
  }

  public function ubah_jenis_pengeluaran($kd_jenis_pengeluaran){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'kategori_biaya'      => $this->input->post('kategori_biaya'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_jenis_pengeluaran', $kd_jenis_pengeluaran);
    return $this->db->update('jenis_pengeluaran', $data);
  }

  public function hapus_jenis_pengeluaran($kd_jenis_pengeluaran){
    return $this->db->delete('jenis_pengeluaran', array('kd_jenis_pengeluaran' => $kd_jenis_pengeluaran ));
  }
}
?>
