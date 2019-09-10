<?php

class Login_model extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

	function cek_login($username, $password){
    $query = $this->db->query("SELECT * FROM pegawai WHERE username='$username' AND password='$password'");
		return $query;
	}

  function cek_username($username){
    $sql = 'SELECT username, password, nama, email, status_user FROM pegawai WHERE username = ?';
    $query = $this->db->query($sql, array($username));
    return $query->row_array();
	}

  public function password_baru($username){
    $data = array('password' => md5($this->input->post('password')));
    $this->db->where('username', $username);
    return $this->db->update('pegawai', $data);
  }
}
?>
