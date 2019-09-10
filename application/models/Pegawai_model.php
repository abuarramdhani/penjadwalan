<?php

class Pegawai_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_pegawai($username = FALSE)
  {
    if ($username === FALSE) {
      $query = $this->db->query('SELECT pegawai.*, jabatan.nama AS jabatan
                                  FROM pegawai
                                  JOIN jabatan ON pegawai.kd_jabatan = jabatan.kd_jabatan');
      return $query->result_array();
    }
    $sql = 'SELECT * FROM pegawai WHERE pegawai.username = ?';
    $query = $this->db->query($sql, array($username));
    return $query->row_array();
  }

  public function get_jabatan()
  {
    $query = $this->db->query("SELECT kd_jabatan, nama FROM jabatan WHERE status = 'on'  ORDER BY nama");
    return $query->result_array();
  }


  public function get_username_pegawai($username)
  {
    $this->db->select('username');
    $query = $this->db->get_where('pegawai', array('username' => $username));
    return $query->row_array();
  }

  public function get_email_pegawai($email)
  {
    $this->db->select('email');
    $query = $this->db->get_where('pegawai', array('email' => $email));
    return $query->row_array();
  }

  public function tambah_pegawai(){
    $tgl = $this->input->post('mulai_kerja');
    $tgl = explode("-",$tgl);
    $d = $tgl['0'];
    $m = $tgl['1'];
    $y = $tgl['2'];
    $tanggal = array($y, $m, $d);
    $mulai_kerja = implode("-", $tanggal);
    $data = array(
      'username'     => $this->input->post('username'),
      'kd_jabatan'     => $this->input->post('jabatan'),
      'nama'      => $this->input->post('nama'),
      'mulai_kerja'     => $mulai_kerja,
      'no_hp'     => $this->input->post('hp'),
      'alamat'     => $this->input->post('alamat'),
      'npwp'     => $this->input->post('npwp'),
      'email'     => $this->input->post('email'),
      'password'     => md5($this->input->post('password')),
      'status_user'     => $this->input->post('status_user'),
      'status'     => $this->input->post('status'),
      'tambah'     => $_SESSION['ses_id'],
      'waktu_tambah'     => date('Y-m-d H:i:s')
    );
    return $this->db->insert('pegawai', $data);
  }

  public function ubah_pegawai($username){
    $tgl = $this->input->post('mulai_kerja');
    $tgl = explode("-",$tgl);
    $d = $tgl['0'];
    $m = $tgl['1'];
    $y = $tgl['2'];
    $tanggal = array($y, $m, $d);
    $mulai_kerja = implode("-", $tanggal);
    $data = array(
      'username'     => $this->input->post('username'),
      'kd_jabatan'     => $this->input->post('jabatan'),
      'nama'      => $this->input->post('nama'),
      'mulai_kerja'     => $mulai_kerja,
      'no_hp'     => $this->input->post('hp'),
      'alamat'     => $this->input->post('alamat'),
      'npwp'     => $this->input->post('npwp'),
      'email'     => $this->input->post('email'),
      'status_user'     => $this->input->post('status_user'),
      'status'     => $this->input->post('status'),
      'ubah'     => $_SESSION['ses_id'],
      'waktu_ubah'     => date('Y-m-d H:i:s')
    );
    $this->db->where('username', $username);
    return $this->db->update('pegawai', $data);
  }

  public function hapus_pegawai($username){
    return $this->db->delete('pegawai', array('username' => $username ));
  }

  public function password_pegawai($username){
    $data = array('password' => md5($this->input->post('new_password')));
    $this->db->where('username', $username);
    return $this->db->update('pegawai', $data);
  }

  function cek_password($username, $password){
    $sql = 'SELECT * FROM pegawai WHERE username = ? AND password = ?';
    $query = $this->db->query($sql, array($username, md5($password)));
    return $query->row_array();
	}
}
?>
