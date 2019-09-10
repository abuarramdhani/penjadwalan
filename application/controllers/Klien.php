<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('klien_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Klien';
		$data['klien'] = 'active';
		$data['master'] = 'active';

		$data['klien_view'] = $this->klien_model->get_klien();


		$this->load->view('templates/section1', $data);
		$this->load->view('klien/klien', $data);
		$this->load->view('modals/klien');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-klien');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($klien = 'klien')
	{

		if (!file_exists(APPPATH.'views/klien/'.$klien.'.php')) {
			show_404();
		}

		$data['judul'] = 'Klien';
		$data['klien'] = 'active';
		$data['master'] = 'active';

		$data['klien_view'] = $this->klien_model->get_klien();


		$this->load->view('templates/section1', $data);
		$this->load->view('klien/'.$klien, $data);
		$this->load->view('modals/klien');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-klien');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['klien'] = 'active';
		$data['master'] = 'active';

			$this->load->view('templates/section1', $data);
			$this->load->view('klien/tambah');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-klien');
			$this->load->view('script/notif');
			$this->load->view('validasi/klien/form_tambah_klien');
			$this->load->view('validasi/klien/tambah_klien');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "" && $_POST['hp'] != "" && $_POST['alamat'] != "") {
			$this->klien_model->tambah_klien();
		}
	}

	public function ubah($kd_klien)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['klien'] = 'active';
		$data['master'] = 'active';

			$data['klien_item'] = $this->klien_model->get_klien($kd_klien);

			$this->load->view('templates/section1', $data);
			$this->load->view('klien/ubah', $data);
			$this->load->view('modals/klien');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-klien');
			$this->load->view('script/notif');
			$this->load->view('validasi/klien/form_ubah_klien');
			$this->load->view('validasi/klien/ubah_klien');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_klien)
	{
		if ($_POST['nama'] != "" && $_POST['hp'] != "" && $_POST['alamat'] != "") {
			$this->klien_model->ubah_klien($kd_klien);
		}
	}

	public function hapus($kd_klien)
	{
		$this->klien_model->hapus_klien($kd_klien);
		$data['klien_view'] = $this->klien_model->get_klien();
		$this->load->view('klien/result', $data);
	}

	public function cek_email()
	{
		$email = $this->input->post('email');

		$email_klien = $this->klien_model->get_email_klien($email);


			if (count($email_klien) > 0) {
				$respone = TRUE;
			}

			else {
				$respone = FALSE;
			}

		header('Content-Type:application/json;');
		echo json_encode($respone);
	}

	public function cek_email2()
	{
		$email = $this->input->post('email');
		$cek = $this->input->post('cek');

		$email_klien = $this->klien_model->get_email_klien($email);

		if (count($email_klien) == 1) {
			if ($email_klien["email"] != $cek) {
				$respone = TRUE;
			}
			else {
				$respone = FALSE;
			}
		}
		else {
			$respone = FALSE;
		}
		header('Content-Type:application/json;');
		echo json_encode($respone);
	}

}
