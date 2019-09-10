<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pekerjaan_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Pekerjaan';
		$data['pekerjaan'] = 'active';
		$data['master'] = 'active';

		$data['pekerjaan_view'] = $this->pekerjaan_model->get_pekerjaan();


		$this->load->view('templates/section1', $data);
		$this->load->view('pekerjaan/pekerjaan', $data);
		$this->load->view('modals/pekerjaan');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-pekerjaan');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($pekerjaan = 'pekerjaan')
	{

		if (!file_exists(APPPATH.'views/pekerjaan/'.$pekerjaan.'.php')) {
			show_404();
		}

		$data['judul'] = 'Pekerjaan';
		$data['pekerjaan'] = 'active';
		$data['master'] = 'active';

		$data['pekerjaan_view'] = $this->pekerjaan_model->get_pekerjaan();


		$this->load->view('templates/section1', $data);
		$this->load->view('pekerjaan/'.$pekerjaan, $data);
		$this->load->view('modals/pekerjaan');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-pekerjaan');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['pekerjaan'] = 'active';
		$data['master'] = 'active';

			$this->load->view('templates/section1', $data);
			$this->load->view('pekerjaan/tambah');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-pekerjaan');
			$this->load->view('script/notif');
			$this->load->view('validasi/pekerjaan/form_pekerjaan');
			$this->load->view('validasi/pekerjaan/tambah_pekerjaan');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "") {
			$this->pekerjaan_model->tambah_pekerjaan();
		}
	}

	public function ubah($kd_pekerjaan)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['pekerjaan'] = 'active';
		$data['master'] = 'active';

			$data['pekerjaan_item'] = $this->pekerjaan_model->get_pekerjaan($kd_pekerjaan);

			$this->load->view('templates/section1', $data);
			$this->load->view('pekerjaan/ubah', $data);
			$this->load->view('modals/pekerjaan');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-pekerjaan');
			$this->load->view('script/notif');
			$this->load->view('validasi/pekerjaan/form_pekerjaan');
			$this->load->view('validasi/pekerjaan/ubah_pekerjaan');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_pekerjaan)
	{
		if ($_POST['nama'] != "") {
			$this->pekerjaan_model->ubah_pekerjaan($kd_pekerjaan);
		}
	}

	public function hapus($kd_pekerjaan)
	{
			$this->pekerjaan_model->hapus_pekerjaan($kd_pekerjaan);
			$data['pekerjaan_view'] = $this->pekerjaan_model->get_pekerjaan();
			$this->load->view('pekerjaan/result', $data);
	}
}
