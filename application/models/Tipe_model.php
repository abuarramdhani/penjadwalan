<?php

class Tipe_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_tipe($kd_tipe = FALSE)
  {
    if ($kd_tipe === FALSE) {
      $query = $this->db->query('SELECT tipe.*, kategori.nama AS kategori, merk.nama AS merk
                                  FROM tipe
                                  JOIN kategori ON tipe.kd_kategori = kategori.kd_kategori
                                  JOIN merk ON tipe.kd_merk = merk.kd_merk');
      return $query->result_array();
    }
    $sql = 'SELECT tipe.*, merk.nama AS merk FROM tipe JOIN merk ON tipe.kd_merk = merk.kd_merk AND tipe.kd_tipe = ?';
    $query = $this->db->query($sql, array($kd_tipe));
    return $query->row_array();
  }

  public function get_kategori()
  {
    $query = $this->db->query("SELECT kd_kategori, nama FROM kategori WHERE status = 'on' ORDER BY nama");
    return $query->result_array();
  }

  public function get_merk()
  {
    $query = $this->db->query("SELECT kd_merk, nama FROM merk WHERE status = 'on' ORDER BY nama");
    return $query->result_array();
  }

/*
  public function get_kd_tipe($kd_tipe = FALSE)
  {
    $query = $this->db->get_where('tipe', array('kd_tipe' => $kd_tipe));
    return $query->row_array();
  }
*/
  public function tambah_tipe(){
    $data = array(
      'kd_tipe'  => NULL,
      'nama'      => $this->input->post('nama'),
      'kd_merk'     => $this->input->post('merk'),
      'kd_kategori'     => $this->input->post('kategori'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('tipe', $data);
  }

  public function ubah_tipe($kd_tipe){

    $data = array(
      'nama'      => $this->input->post('nama'),
      'kd_merk'     => $this->input->post('merk'),
      'kd_kategori'     => $this->input->post('kategori'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_tipe', $kd_tipe);
    return $this->db->update('tipe', $data);
  }

  public function hapus_tipe($kd_tipe){
    return $this->db->delete('tipe', array('kd_tipe' => $kd_tipe ));
  }
}
?>
