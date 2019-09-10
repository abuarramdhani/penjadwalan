<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Kategori';
		$data['kategori'] = 'active';
		$data['master'] = 'active';

		$data['kategori_view'] = $this->kategori_model->get_kategori();


		$this->load->view('templates/section1', $data);
		$this->load->view('kategori/kategori', $data);
		$this->load->view('modals/kategori');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-kategori');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($kategori = 'kategori')
	{

		if (!file_exists(APPPATH.'views/kategori/'.$kategori.'.php')) {
			show_404();
		}

		$data['judul'] = 'Kategori';
		$data['kategori'] = 'active';
		$data['master'] = 'active';

		$data['kategori_view'] = $this->kategori_model->get_kategori();


		$this->load->view('templates/section1', $data);
		$this->load->view('kategori/'.$kategori, $data);
		$this->load->view('modals/kategori');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-kategori');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['kategori'] = 'active';
		$data['master'] = 'active';

		$this->load->view('templates/section1', $data);
		$this->load->view('kategori/tambah');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-kategori');
		$this->load->view('script/notif');
		$this->load->view('validasi/kategori/form_kategori');
		$this->load->view('validasi/kategori/tambah_kategori');
		$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "") {
			$this->kategori_model->tambah_kategori();
		}
	}

	public function ubah($kd_kategori)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['kategori'] = 'active';
		$data['master'] = 'active';

			$data['kategori_item'] = $this->kategori_model->get_kategori($kd_kategori);

			$this->load->view('templates/section1', $data);
			$this->load->view('kategori/ubah', $data);
			$this->load->view('modals/kategori');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-kategori');
			$this->load->view('script/notif');
			$this->load->view('validasi/kategori/form_kategori');
			$this->load->view('validasi/kategori/ubah_kategori');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_kategori)
	{
		if ($_POST['nama'] != "") {
			$this->kategori_model->ubah_kategori($kd_kategori);
		}
	}

	public function hapus($kd_kategori)
	{
			$this->kategori_model->hapus_kategori($kd_kategori);
			$data['kategori_view'] = $this->kategori_model->get_kategori();
			$this->load->view('kategori/result', $data);
	}
}
