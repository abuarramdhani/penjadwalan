<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('merk_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Merk';
		$data['merk'] = 'active';
		$data['master'] = 'active';

		$data['merk_view'] = $this->merk_model->get_merk();


		$this->load->view('templates/section1', $data);
		$this->load->view('merk/merk', $data);
		$this->load->view('modals/merk');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-merk');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($merk = 'merk')
	{

		if (!file_exists(APPPATH.'views/merk/'.$merk.'.php')) {
			show_404();
		}

		$data['judul'] = 'Merk';
		$data['merk'] = 'active';
		$data['master'] = 'active';

		$data['merk_view'] = $this->merk_model->get_merk();


		$this->load->view('templates/section1', $data);
		$this->load->view('merk/'.$merk, $data);
		$this->load->view('modals/merk');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-merk');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['merk'] = 'active';
		$data['master'] = 'active';

			$this->load->view('templates/section1', $data);
			$this->load->view('merk/tambah');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-merk');
			$this->load->view('script/notif');
			$this->load->view('validasi/merk/form_merk');
			$this->load->view('validasi/merk/tambah_merk');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "") {
			$this->merk_model->tambah_merk();
		}
	}

	public function ubah($kd_merk)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['merk'] = 'active';
		$data['master'] = 'active';

			$data['merk_item'] = $this->merk_model->get_merk($kd_merk);

			$this->load->view('templates/section1', $data);
			$this->load->view('merk/ubah', $data);
			$this->load->view('modals/merk');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-merk');
			$this->load->view('script/notif');
			$this->load->view('validasi/merk/form_merk');
			$this->load->view('validasi/merk/ubah_merk');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_merk)
	{
		if ($_POST['nama'] != "") {
			$this->merk_model->ubah_merk($kd_merk);
		}
	}

	public function hapus($kd_merk)
	{
			$this->merk_model->hapus_merk($kd_merk);
			$data['merk_view'] = $this->merk_model->get_merk();
			$this->load->view('merk/result', $data);
	}
}
