<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kota_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Kota';
		$data['kota'] = 'active';
		$data['master'] = 'active';

		$data['kota_view'] = $this->kota_model->get_kota();


		$this->load->view('templates/section1', $data);
		$this->load->view('kota/kota', $data);
		$this->load->view('modals/kota');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-kota');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($kota = 'kota')
	{

		if (!file_exists(APPPATH.'views/kota/'.$kota.'.php')) {
			show_404();
		}

		$data['judul'] = 'Kota';
		$data['kota'] = 'active';
		$data['master'] = 'active';

		$data['kota_view'] = $this->kota_model->get_kota();


		$this->load->view('templates/section1', $data);
		$this->load->view('kota/'.$kota, $data);
		$this->load->view('modals/kota');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-kota');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['kota'] = 'active';
		$data['master'] = 'active';

      $data['area_view'] = $this->kota_model->get_area();

			$this->load->view('templates/section1', $data);
			$this->load->view('kota/tambah', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-kota');
			$this->load->view('script/notif');
			$this->load->view('validasi/kota/form_kota');
			$this->load->view('validasi/kota/tambah_kota');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "") {
			$this->kota_model->tambah_kota();
		}
	}

	public function ubah($kd_kota)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['kota'] = 'active';
		$data['master'] = 'active';

			$data['kota_item'] = $this->kota_model->get_kota($kd_kota);
			$data['area_view'] = $this->kota_model->get_area();

			$this->load->view('templates/section1', $data);
			$this->load->view('kota/ubah', $data);
			$this->load->view('modals/kota');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-kota');
			$this->load->view('script/notif');
			$this->load->view('validasi/kota/form_kota');
			$this->load->view('validasi/kota/ubah_kota');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_kota)
	{
		if ($_POST['nama'] != "") {
			$this->kota_model->ubah_kota($kd_kota);
		}
	}
	
	public function hapus($kd_kota)
	{
			$this->kota_model->hapus_kota($kd_kota);
			$data['kota_view'] = $this->kota_model->get_kota();
			$this->load->view('kota/result', $data);
	}
}
