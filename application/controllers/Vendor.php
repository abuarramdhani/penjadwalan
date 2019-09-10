<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('vendor_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Vendor';
		$data['vendor'] = 'active';
		$data['master'] = 'active';

		$data['vendor_view'] = $this->vendor_model->get_vendor();


		$this->load->view('templates/section1', $data);
		$this->load->view('vendor/vendor', $data);
		$this->load->view('modals/vendor');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-vendor');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($vendor = 'vendor')
	{

		if (!file_exists(APPPATH.'views/vendor/'.$vendor.'.php')) {
			show_404();
		}

		$data['judul'] = 'Vendor';
		$data['vendor'] = 'active';
		$data['master'] = 'active';

		$data['vendor_view'] = $this->vendor_model->get_vendor();


		$this->load->view('templates/section1', $data);
		$this->load->view('vendor/'.$vendor, $data);
		$this->load->view('modals/vendor');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-vendor');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['vendor'] = 'active';
		$data['master'] = 'active';

			$this->load->view('templates/section1', $data);
			$this->load->view('vendor/tambah');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('validasi/vendor/form_tambah_vendor');
			$this->load->view('validasi/vendor/tambah_vendor');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "" && $_POST['hp'] != "" && $_POST['alamat'] != "") {
			$this->vendor_model->tambah_vendor();
		}
	}

	public function ubah($kd_vendor)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['vendor'] = 'active';
		$data['master'] = 'active';

			$data['vendor_item'] = $this->vendor_model->get_vendor($kd_vendor);
			$this->load->view('templates/section1', $data);
			$this->load->view('vendor/ubah', $data);
			$this->load->view('modals/vendor');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('validasi/vendor/form_ubah_vendor');
			$this->load->view('validasi/vendor/ubah_vendor');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_vendor)
	{
		if ($_POST['nama'] != "" && $_POST['hp'] != "" && $_POST['alamat'] != "") {
			$this->vendor_model->ubah_vendor($kd_vendor);
		}
	}

	public function hapus($kd_vendor)
	{
		$this->vendor_model->hapus_vendor($kd_vendor);
		$data['vendor_view'] = $this->vendor_model->get_vendor();
		$this->load->view('vendor/result', $data);
	}

	public function cek_email()
	{
		$email = $this->input->post('email');

		$email_vendor = $this->vendor_model->get_email_vendor($email);


			if (count($email_vendor) > 0) {
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

		$email_vendor = $this->vendor_model->get_email_vendor($email);

		if (count($email_vendor) == 1) {
			if ($email_vendor["email"] != $cek) {
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
