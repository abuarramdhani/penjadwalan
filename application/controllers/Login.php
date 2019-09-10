<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('form');
		$this->load->helper('cookie');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('pages/login');

		if (get_cookie('username') == TRUE) {
			$username = get_cookie('username');
			$password = get_cookie('password');
			$cek=$this->login_model->cek_login($username,$password);

			if($cek->num_rows() > 0){
				$data=$cek->row_array();

				$this->session->set_userdata('akses',$data['status_user']);
        $this->session->set_userdata('ses_id',$data['username']);
        $this->session->set_userdata('ses_nama',$data['nama']);

				redirect('dashboard');
	    }
		}
	}

	function login_action()
	{
			$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
			$password=md5(htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
			$remember = $this->input->post('remember', TRUE);

		if ($remember == TRUE) {
			$cookie1 = array(
      'name'   => 'username',
      'value'  => $username,
      'expire' => '2592000',
      'path'   => '/'
		);
		$this->input->set_cookie($cookie1);
			$cookie2 = array(
      'name'   => 'password',
      'value'  => $password,
      'expire' => '2592000',
      'path'   => '/'
		);
			$this->input->set_cookie($cookie2);
		}
		else {
			delete_cookie('username');
			delete_cookie('password');
		}


	    $cek=$this->login_model->cek_login($username,$password);

	    if($cek->num_rows() > 0){
				 $data=$cek->row_array();

				 $this->session->set_userdata('akses',$data['status_user']);
	       $this->session->set_userdata('ses_id',$data['username']);
	       $this->session->set_userdata('ses_nama',$data['nama']);

				 $respone = TRUE;
	   	}
			else{
				$respone = FALSE;
			}
			header('Content-Type:application/json;');
			echo json_encode($respone);
	}

	function logout(){
		$this->session->sess_destroy();
		delete_cookie('username');
		delete_cookie('password');
		redirect(base_url());
	}

	function lupa_password(){
		$username = $this->input->post('new_username');
		$this->session->set_userdata('username',$username);
		$data['cek'] = $this->login_model->cek_username($username);

		if(count($data['cek']) > 0){
			$respone = TRUE;
		}
		else {
			$respone = FALSE;
		}
		header('Content-Type:application/json;');
		echo json_encode($respone);
	}

	public function kirim_email()
	{
		$username = $this->session->userdata('username');
		$data['cek'] = $this->login_model->cek_username($username);

		$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.gmail.com',
						'smtp_port' => 465,
						'smtp_user' => 'muhammadrifki8866@gmail.com',
						'smtp_pass' => 'hitam8696',
						'mailtype'  => 'html',
						'charset'   => 'iso-8859-1'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$pesan = $this->load->view('emails/email_password',$data,TRUE);

		$this->email->clear();
		$this->email->to($data['cek']['email']);
		$this->email->from('muhammadrifki8866@gmail.com', 'RK Studio');
		$this->email->subject('Lupa Password');
		$this->email->message($pesan);
		$this->email->send();

		unset($_SESSION['username']);
	}

	public function password_baru()
	{
		$username = $_GET['user'];
		$password = $_GET['x'];

		$cek=$this->login_model->cek_login($username,$password);

		if($cek->num_rows() > 0){
			$data['username'] = $username;
			$data['gagal'] = 'tidak';
			$this->load->view('pages/password_baru', $data);
		}
		else {
			$data['gagal'] = 'ya';
			$this->load->view('pages/password_baru', $data);
		}
	}

	public function simpan_password_baru()
	{
		$username = $this->input->post('username');

		$this->login_model->password_baru($username);

		$cek=$this->login_model->cek_username($username);

		if(count($cek) > 0){

			 $this->session->set_userdata('akses',$cek['status_user']);
			 $this->session->set_userdata('ses_id',$cek['username']);
			 $this->session->set_userdata('ses_nama',$cek['nama']);

			 $respone = TRUE;
		}

		header('Content-Type:application/json;');
		echo json_encode($respone);
	}

}
