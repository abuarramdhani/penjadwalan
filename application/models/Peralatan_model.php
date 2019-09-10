<?php

class Peralatan_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_peralatan($kd_peralatan = FALSE)
  {
    if ($kd_peralatan === FALSE) {
      $query = $this->db->query('SELECT peralatan.*, tipe.nama AS tipe, merk.nama AS merk, kategori.nama AS kategori
                                  FROM peralatan
                                  JOIN tipe ON peralatan.kd_tipe = tipe.kd_tipe
                                  JOIN merk ON merk.kd_merk = tipe.kd_merk
                                  JOIN kategori ON kategori.kd_kategori = tipe.kd_kategori');
      return $query->result_array();
    }
    $sql = 'SELECT * FROM peralatan WHERE peralatan.kd_peralatan = ?';
    $query = $this->db->query($sql, array($kd_peralatan));
    return $query->row_array();
  }

  public function get_tipe()
  {
    $query = $this->db->query("SELECT tipe.*, kategori.nama AS kategori, merk.nama AS merk
                                FROM tipe
                                JOIN kategori ON tipe.kd_kategori = kategori.kd_kategori
                                JOIN merk ON tipe.kd_merk = merk.kd_merk AND tipe.status = 'on' ORDER BY merk.nama");
    return $query->result_array();
  }

  public function get_kd_peralatan($kd_peralatan)
  {
    $sql = "SELECT kd_peralatan FROM peralatan WHERE kd_peralatan = ?";
    $query = $this->db->query($sql, array($kd_peralatan));
    return $query->row_array();
  }

  public function tambah_peralatan(){
    $data = array(
      'kd_peralatan'  => $this->input->post('kode'),
      'kd_tipe'     => $this->input->post('tipe'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('peralatan', $data);
  }

  public function ubah_peralatan($kd_peralatan){

    $data = array(
      'kd_peralatan'  => $this->input->post('kode'),
      'kd_tipe'     => $this->input->post('tipe'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_peralatan', $kd_peralatan);
    return $this->db->update('peralatan', $data);
  }

  public function hapus_peralatan($kd_peralatan){
    return $this->db->delete('peralatan', array('kd_peralatan' => $kd_peralatan ));
  }
}
?>
