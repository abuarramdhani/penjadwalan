<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('tipe_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Tipe';
		$data['tipe'] = 'active';
		$data['master'] = 'active';

		$data['tipe_view'] = $this->tipe_model->get_tipe();

		$this->load->view('templates/section1', $data);
		$this->load->view('tipe/tipe', $data);
		$this->load->view('modals/tipe');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-tipe');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($tipe = 'tipe')
	{

		if (!file_exists(APPPATH.'views/tipe/'.$tipe.'.php')) {
			show_404();
		}

		$data['judul'] = 'Tipe';
		$data['tipe'] = 'active';
		$data['master'] = 'active';

		$data['tipe_view'] = $this->tipe_model->get_tipe();


		$this->load->view('templates/section1', $data);
		$this->load->view('tipe/'.$tipe, $data);
		$this->load->view('modals/tipe');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-tipe');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['tipe'] = 'active';
		$data['master'] = 'active';

      $data['merk_view'] = $this->tipe_model->get_merk();
      $data['kategori_view'] = $this->tipe_model->get_kategori();

			$this->load->view('templates/section1', $data);
			$this->load->view('tipe/tambah', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-tipe');
			$this->load->view('script/notif');
			$this->load->view('validasi/tipe/form_tipe');
			$this->load->view('validasi/tipe/tambah_tipe');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "") {
			$this->tipe_model->tambah_tipe();
		}
	}

	public function ubah($kd_tipe)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['tipe'] = 'active';
		$data['master'] = 'active';

			$data['tipe_item'] = $this->tipe_model->get_tipe($kd_tipe);
			$data['merk_view'] = $this->tipe_model->get_merk();
			$data['kategori_view'] = $this->tipe_model->get_kategori();

			$this->load->view('templates/section1', $data);
			$this->load->view('tipe/ubah', $data);
			$this->load->view('modals/tipe');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-tipe');
			$this->load->view('script/notif');
			$this->load->view('validasi/tipe/form_tipe');
			$this->load->view('validasi/tipe/ubah_tipe');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_tipe)
	{
		if ($_POST['nama'] != "") {
			$this->tipe_model->ubah_tipe($kd_tipe);
		}
	}

	public function hapus($kd_tipe)
	{
			$this->tipe_model->hapus_tipe($kd_tipe);
			$data['tipe_view'] = $this->tipe_model->get_tipe();
			$this->load->view('tipe/result', $data);
	}
}
