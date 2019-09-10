<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pengeluaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jenis_pengeluaran_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Jenis Pengeluaran';
		$data['jenis_pengeluaran'] = 'active';
		$data['master'] = 'active';

		$data['jenis_pengeluaran_view'] = $this->jenis_pengeluaran_model->get_jenis_pengeluaran();

		$this->load->view('templates/section1', $data);
		$this->load->view('jenis_pengeluaran/jenis_pengeluaran', $data);
		$this->load->view('modals/jenis_pengeluaran');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-jenis_pengeluaran');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($jenis_pengeluaran = 'jenis_pengeluaran')
	{

		if (!file_exists(APPPATH.'views/jenis_pengeluaran/'.$jenis_pengeluaran.'.php')) {
			show_404();
		}

		$data['judul'] = 'Jenis Pengeluaran';
		$data['jenis_pengeluaran'] = 'active';
		$data['master'] = 'active';

		$data['jenis_pengeluaran_view'] = $this->jenis_pengeluaran_model->get_jenis_pengeluaran();


		$this->load->view('templates/section1', $data);
		$this->load->view('jenis_pengeluaran/'.$jenis_pengeluaran, $data);
		$this->load->view('modals/jenis_pengeluaran');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-jenis_pengeluaran');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['jenis_pengeluaran'] = 'active';
		$data['master'] = 'active';

			$this->load->view('templates/section1', $data);
			$this->load->view('jenis_pengeluaran/tambah');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-jenis_pengeluaran');
			$this->load->view('script/notif');
			$this->load->view('validasi/jenis_pengeluaran/form_jenis_pengeluaran');
			$this->load->view('validasi/jenis_pengeluaran/tambah_jenis_pengeluaran');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "") {
			$this->jenis_pengeluaran_model->tambah_jenis_pengeluaran();
		}
	}

	public function ubah($kd_jenis_pengeluaran)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['jenis_pengeluaran'] = 'active';
		$data['master'] = 'active';

		$data['jenis_pengeluaran_item'] = $this->jenis_pengeluaran_model->get_jenis_pengeluaran($kd_jenis_pengeluaran);

			$this->load->view('templates/section1', $data);
			$this->load->view('jenis_pengeluaran/ubah', $data);
			$this->load->view('modals/jenis_pengeluaran');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-jenis_pengeluaran');
			$this->load->view('script/notif');
			$this->load->view('validasi/jenis_pengeluaran/form_jenis_pengeluaran');
			$this->load->view('validasi/jenis_pengeluaran/ubah_jenis_pengeluaran');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_jenis_pengeluaran)
	{
		if ($_POST['nama'] != "") {
			$this->jenis_pengeluaran_model->ubah_jenis_pengeluaran($kd_jenis_pengeluaran);
		}
	}

	public function hapus($kd_jenis_pengeluaran)
	{
			$this->jenis_pengeluaran_model->hapus_jenis_pengeluaran($kd_jenis_pengeluaran);
			$data['jenis_pengeluaran_view'] = $this->jenis_pengeluaran_model->get_jenis_pengeluaran();
			$this->load->view('jenis_pengeluaran/result', $data);
	}

}
