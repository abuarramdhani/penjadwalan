<?php

class Gaji_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_gaji($kd_gaji = FALSE)
  {
    if ($kd_gaji === FALSE) {
      $query = $this->db->query('SELECT gaji.*, pekerjaan.nama AS pekerjaan, area.nama AS area
                                  FROM gaji
                                  JOIN area ON gaji.kd_area = area.kd_area
                                  JOIN pekerjaan ON gaji.kd_pekerjaan = pekerjaan.kd_pekerjaan');
      return $query->result_array();
    }
    $sql = 'SELECT * FROM gaji WHERE gaji.kd_gaji = ?';
    $query = $this->db->query($sql, array($kd_gaji));
    return $query->row_array();
  }

  public function get_pekerjaan()
  {
    $query = $this->db->query("SELECT kd_pekerjaan, nama FROM pekerjaan WHERE status = 'on' ORDER BY nama");
    return $query->result_array();
  }

  public function get_area()
  {
    $query = $this->db->query("SELECT kd_area, nama FROM area WHERE status = 'on'  ORDER BY nama");
    return $query->result_array();
  }

/*
  public function get_kd_gaji($kd_gaji = FALSE)
  {
    $query = $this->db->get_where('gaji', array('kd_gaji' => $kd_gaji));
    return $query->row_array();
  }
*/
  public function tambah_gaji(){

    $data = array(
      'kd_gaji'  => NULL,
      'gaji'      => $this->input->post('gaji'),
      'gaji_magang'      => $this->input->post('magang'),
      'kd_pekerjaan'     => $this->input->post('pekerjaan'),
      'kd_area'     => $this->input->post('area'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('gaji', $data);
  }

  public function ubah_gaji($kd_gaji){

    $data = array(
      'gaji'      => $this->input->post('gaji'),
      'gaji_magang'      => $this->input->post('magang'),
      'kd_pekerjaan'     => $this->input->post('pekerjaan'),
      'kd_area'     => $this->input->post('area'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('kd_gaji', $kd_gaji);
    return $this->db->update('gaji', $data);
  }

  public function hapus_gaji($kd_gaji){
    return $this->db->delete('gaji', array('kd_gaji' => $kd_gaji ));
  }
}
?>
