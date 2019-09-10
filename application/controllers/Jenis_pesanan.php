<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jenis_pesanan_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Jenis Pesanan';
		$data['jenis_pesanan'] = 'active';
		$data['master'] = 'active';

		$data['jenis_pesanan_view'] = $this->jenis_pesanan_model->get_jenis_pesanan();


		$this->load->view('templates/section1', $data);
		$this->load->view('jenis_pesanan/jenis_pesanan', $data);
		$this->load->view('modals/jenis_pesanan');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-jenis_pesanan');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($jenis_pesanan = 'jenis_pesanan')
	{

		if (!file_exists(APPPATH.'views/jenis_pesanan/'.$jenis_pesanan.'.php')) {
			show_404();
		}

		$data['judul'] = 'Jenis Pesanan';
		$data['jenis_pesanan'] = 'active';
		$data['master'] = 'active';

		$data['jenis_pesanan_view'] = $this->jenis_pesanan_model->get_jenis_pesanan();


		$this->load->view('templates/section1', $data);
		$this->load->view('jenis_pesanan/'.$jenis_pesanan, $data);
		$this->load->view('modals/jenis_pesanan');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-jenis_pesanan');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['jenis_pesanan'] = 'active';
		$data['master'] = 'active';

    	$this->load->view('templates/section1', $data);
			$this->load->view('jenis_pesanan/tambah');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-jenis_pesanan');
			$this->load->view('script/notif');
			$this->load->view('validasi/jenis_pesanan/form_jenis_pesanan');
			$this->load->view('validasi/jenis_pesanan/tambah_jenis_pesanan');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "") {
			$this->jenis_pesanan_model->tambah_jenis_pesanan();
		}
	}

	public function ubah($kd_jenis_pesanan)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['jenis_pesanan'] = 'active';
		$data['master'] = 'active';

			$data['jenis_pesanan_item'] = $this->jenis_pesanan_model->get_jenis_pesanan($kd_jenis_pesanan);

			$this->load->view('templates/section1', $data);
			$this->load->view('jenis_pesanan/ubah', $data);
			$this->load->view('modals/jenis_pesanan');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-jenis_pesanan');
			$this->load->view('script/notif');
			$this->load->view('validasi/jenis_pesanan/form_jenis_pesanan');
			$this->load->view('validasi/jenis_pesanan/ubah_jenis_pesanan');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_jenis_pesanan)
	{
		if ($_POST['nama'] != "") {
			$this->jenis_pesanan_model->ubah_jenis_pesanan($kd_jenis_pesanan);
		}
	}

	public function hapus($kd_jenis_pesanan)
	{
			$this->jenis_pesanan_model->hapus_jenis_pesanan($kd_jenis_pesanan);
			$data['jenis_pesanan_view'] = $this->jenis_pesanan_model->get_jenis_pesanan();
			$this->load->view('jenis_pesanan/result', $data);
	}
}
