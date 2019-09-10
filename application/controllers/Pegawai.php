<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$this->load->helper('form');
		$data['judul'] = 'Pegawai';
		$data['pegawai'] = 'active';
		$data['master'] = 'active';

		$data['pegawai_view'] = $this->pegawai_model->get_pegawai();


		$this->load->view('templates/section1', $data);
		$this->load->view('pegawai/pegawai', $data);
		$this->load->view('modals/pegawai');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-pegawai');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($pegawai = 'pegawai')
	{

		if (!file_exists(APPPATH.'views/pegawai/'.$pegawai.'.php')) {
			show_404();
		}
		$this->load->helper('form');
		$data['judul'] = 'Pegawai';
		$data['pegawai'] = 'active';
		$data['master'] = 'active';

		$data['pegawai_view'] = $this->pegawai_model->get_pegawai();


		$this->load->view('templates/section1', $data);
		$this->load->view('pegawai/'.$pegawai, $data);
		$this->load->view('modals/pegawai');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-pegawai');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['pegawai'] = 'active';
		$data['master'] = 'active';

      $data['jabatan_view'] = $this->pegawai_model->get_jabatan();

			$this->load->view('templates/section1', $data);
			$this->load->view('pegawai/tambah', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
      $this->load->view('script/datepicker');
			$this->load->view('validasi/pegawai/form_tambah_pegawai');
			$this->load->view('validasi/pegawai/tambah_pegawai');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "" && $_POST['hp'] != "" && $_POST['alamat'] != "") {
			$this->pegawai_model->tambah_pegawai();
		}
	}

	public function ubah($username)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['pegawai'] = 'active';
		$data['master'] = 'active';

			$data['pegawai_item'] = $this->pegawai_model->get_pegawai($username);
      $data['jabatan_view'] = $this->pegawai_model->get_jabatan();

			$this->load->view('templates/section1', $data);
			$this->load->view('pegawai/ubah', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
      $this->load->view('script/datepicker');
			$this->load->view('validasi/pegawai/form_ubah_pegawai');
			$this->load->view('validasi/pegawai/ubah_pegawai');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($username)
	{
		if ($_POST['nama'] != "" && $_POST['hp'] != "" && $_POST['alamat'] != "") {
			$this->pegawai_model->ubah_pegawai($username);
		}
	}

	public function hapus($username)
	{
		$this->pegawai_model->hapus_pegawai($username);
		$data['pegawai_view'] = $this->pegawai_model->get_pegawai();
		$this->load->view('pegawai/result', $data);
	}

	public function password($username){
		$password = $this->input->post('old_password');
		$cek = $this->pegawai_model->cek_password($username,$password);

		if(count($cek) > 0){
			$this->pegawai_model->password_pegawai($username);
			$respone = TRUE;
		}
		else {
			$respone = FALSE;
		}
		header('Content-Type:application/json;');
		echo json_encode($respone);
	}

	public function cek()
	{
			$username = $this->input->post('username');
			$username_pegawai = $this->pegawai_model->get_username_pegawai($username);

			$email = $this->input->post('email');
			$email_pegawai = $this->pegawai_model->get_email_pegawai($email);


			if (count($username_pegawai) > 0 && count($email_pegawai) > 0) {
				$respone = "A";
			}
			elseif (count($username_pegawai) > 0) {
				$respone = "B";
			}
			elseif (count($email_pegawai) > 0) {
				$respone = "C";
			}
			else{
				$respone = "D";
			}

		header('Content-Type:application/json;');
		echo json_encode($respone);
	}

	public function cek2()
	{
			$username = $this->input->post('username');
			$cek_username = $this->input->post('cek_username');
			$username_pegawai = $this->pegawai_model->get_username_pegawai($username);

			$email = $this->input->post('email');
			$cek_email = $this->input->post('cek_email');
			$email_pegawai = $this->pegawai_model->get_email_pegawai($email);


			if (count($username_pegawai) > 0 && count($email_pegawai) > 0) {
				if ($username == $cek_username && $email == $cek_email) {
					$respone = "D";
				}
				elseif ($username != $cek_username && $email != $cek_email) {
					$respone = "A1";
				}
				elseif ($username != $cek_username && $email == $cek_email) {
					$respone = "A2";
				}
				elseif ($username == $cek_username && $email != $cek_email) {
					$respone = "A3";
				}
			}
			elseif (count($username_pegawai) == 0 && count($email_pegawai) > 0) {
				if ($email == $cek_email) {
					$respone = "D";
				}
				else {
					$respone = "A4";
				}
			}
			elseif (count($username_pegawai) > 0 && count($email_pegawai) == 0) {
				if ($username == $cek_username) {
					$respone = "D";
				}
				else {
					$respone = "A5";
				}
			}
			else{
				$respone = "D";
			}

		header('Content-Type:application/json;');
		echo json_encode($respone);
	}

	public function cek3()
	{
			$username = $this->input->post('username');
			$cek_username = $this->input->post('cek_username');
			$username_pegawai = $this->pegawai_model->get_username_pegawai($username);

			$email = $this->input->post('email');
			$cek_email = $this->input->post('cek_email');
			$email_pegawai = $this->pegawai_model->get_email_pegawai($email);

			if (count($username_pegawai) > 0) {
				if ($username == $cek_username) {
					$respone = "D";
				}elseif ($username != $cek_username) {
					$respone = "B";
				}
			}
			elseif (count($email_pegawai) > 0) {
				if ($email == $cek_email) {
					$respone = "D";
				}elseif ($email != $cek_email) {
					$respone = "C";
				}
			}
			else {
				$respone = "D";
			}

			header('Content-Type:application/json;');
			echo json_encode($respone);
		}


}
