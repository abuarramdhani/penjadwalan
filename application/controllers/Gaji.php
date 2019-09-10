<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gaji_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Gaji';
		$data['gaji'] = 'active';
		$data['master'] = 'active';

		$data['gaji_view'] = $this->gaji_model->get_gaji();


		$this->load->view('templates/section1', $data);
		$this->load->view('gaji/gaji', $data);
		$this->load->view('modals/gaji');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-gaji');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($gaji = 'gaji')
	{

		if (!file_exists(APPPATH.'views/gaji/'.$gaji.'.php')) {
			show_404();
		}

		$data['judul'] = 'Gaji';
		$data['gaji'] = 'active';
		$data['master'] = 'active';

		$data['gaji_view'] = $this->gaji_model->get_gaji();


		$this->load->view('templates/section1', $data);
		$this->load->view('gaji/'.$gaji, $data);
		$this->load->view('modals/gaji');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-gaji');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['gaji'] = 'active';
		$data['master'] = 'active';

    $data['pekerjaan_view'] = $this->gaji_model->get_pekerjaan();
    $data['area_view'] = $this->gaji_model->get_area();

		$this->load->view('templates/section1', $data);
		$this->load->view('gaji/tambah', $data);
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-gaji');
		$this->load->view('script/notif');
		$this->load->view('script/mask-as-number');
		$this->load->view('validasi/gaji/form_gaji');
		$this->load->view('validasi/gaji/tambah_gaji');
		$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['gaji'] != "" && $_POST['magang'] != "") {
			$this->gaji_model->tambah_gaji();
		}
	}

	public function ubah($kd_gaji)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['gaji'] = 'active';
		$data['master'] = 'active';

			$data['gaji_item'] = $this->gaji_model->get_gaji($kd_gaji);
			$data['pekerjaan_view'] = $this->gaji_model->get_pekerjaan();
      $data['area_view'] = $this->gaji_model->get_area();

			$this->load->view('templates/section1', $data);
			$this->load->view('gaji/ubah', $data);
			$this->load->view('modals/gaji');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-gaji');
			$this->load->view('script/notif');
			$this->load->view('script/mask-as-number');
			$this->load->view('validasi/gaji/form_gaji');
			$this->load->view('validasi/gaji/ubah_gaji');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_gaji)
	{
		if ($_POST['gaji'] != "" && $_POST['magang'] != "") {
			$this->gaji_model->ubah_gaji($kd_gaji);
		}
	}

	public function hapus($kd_gaji)
	{
			$this->gaji_model->hapus_gaji($kd_gaji);
			$data['gaji_view'] = $this->gaji_model->get_gaji();
			$this->load->view('gaji/result', $data);
	}
}
