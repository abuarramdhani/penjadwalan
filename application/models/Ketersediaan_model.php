<?php

class Ketersediaan_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_peralatan()
  {
    $tgl = $this->input->post('tgl');
    $tgl = explode(" ", $tgl);

    $tgl1 = $tgl['0'];
    $tgl1 = explode("/",$tgl1);
    $d1 = $tgl1['0'];
    $m1 = $tgl1['1'];
    $y1 = $tgl1['2'];
    $tanggal1 = array($y1, $m1, $d1);
    $tgl_mulai = implode("-", $tanggal1);

    $tgl2 = $tgl['2'];
    $tgl2 = explode("/",$tgl2);
    $d2 = $tgl2['0'];
    $m2 = $tgl2['1'];
    $y2 = $tgl2['2'];
    $tanggal2 = array($y2, $m2, $d2);
    $tgl_selesai = implode("-", $tanggal2);

    $sql = 'CALL ketersediaan_alat(?, ?) ';
    $query = $this->db->query($sql, array($tgl_mulai, $tgl_selesai));
    return $query->result_array();
  }

  public function get_pegawai()
  {
    $tgl = $this->input->post('tgl');
    $tgl = explode(" ", $tgl);

    $tgl1 = $tgl['0'];
    $tgl1 = explode("/",$tgl1);
    $d1 = $tgl1['0'];
    $m1 = $tgl1['1'];
    $y1 = $tgl1['2'];
    $tanggal1 = array($y1, $m1, $d1);
    $tgl_mulai = implode("-", $tanggal1);

    $tgl2 = $tgl['2'];
    $tgl2 = explode("/",$tgl2);
    $d2 = $tgl2['0'];
    $m2 = $tgl2['1'];
    $y2 = $tgl2['2'];
    $tanggal2 = array($y2, $m2, $d2);
    $tgl_selesai = implode("-", $tanggal2);

    $sql = 'CALL ketersediaan_pegawai(?, ?) ';
    $query = $this->db->query($sql, array($tgl_mulai, $tgl_selesai));
    return $query->result_array();
  }

  public function get_kategori()
  {
    $tgl = $this->input->post('tgl');
    $tgl = explode(" ", $tgl);

    $tgl1 = $tgl['0'];
    $tgl1 = explode("/",$tgl1);
    $d1 = $tgl1['0'];
    $m1 = $tgl1['1'];
    $y1 = $tgl1['2'];
    $tanggal1 = array($y1, $m1, $d1);
    $tgl_mulai = implode("-", $tanggal1);

    $tgl2 = $tgl['2'];
    $tgl2 = explode("/",$tgl2);
    $d2 = $tgl2['0'];
    $m2 = $tgl2['1'];
    $y2 = $tgl2['2'];
    $tanggal2 = array($y2, $m2, $d2);
    $tgl_selesai = implode("-", $tanggal2);

    $sql = 'CALL ketersediaan_alat_kategori(?, ?) ';
    $query = $this->db->query($sql, array($tgl_mulai, $tgl_selesai));
    return $query->result_array();
  }

}
?>
