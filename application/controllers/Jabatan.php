<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jabatan_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Jabatan';
		$data['jabatan'] = 'active';
		$data['master'] = 'active';

		$data['jabatan_view'] = $this->jabatan_model->get_jabatan();


		$this->load->view('templates/section1', $data);
		$this->load->view('jabatan/jabatan', $data);
		$this->load->view('modals/jabatan');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-jabatan');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($jabatan = 'jabatan')
	{

		if (!file_exists(APPPATH.'views/jabatan/'.$jabatan.'.php')) {
			show_404();
		}

		$data['judul'] = 'Jabatan';
		$data['jabatan'] = 'active';
		$data['master'] = 'active';

		$data['jabatan_view'] = $this->jabatan_model->get_jabatan();


		$this->load->view('templates/section1', $data);
		$this->load->view('jabatan/'.$jabatan, $data);
		$this->load->view('modals/jabatan');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-jabatan');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['jabatan'] = 'active';
		$data['master'] = 'active';

		$this->load->view('templates/section1', $data);
		$this->load->view('jabatan/tambah');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-jabatan');
		$this->load->view('script/notif');
		$this->load->view('validasi/jabatan/form_jabatan');
		$this->load->view('validasi/jabatan/tambah_jabatan');
		$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "") {
			$this->jabatan_model->tambah_jabatan();
		}
	}

	public function ubah($kd_jabatan)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['jabatan'] = 'active';
		$data['master'] = 'active';

			$data['jabatan_item'] = $this->jabatan_model->get_jabatan($kd_jabatan);

			$this->load->view('templates/section1', $data);
			$this->load->view('jabatan/ubah', $data);
			$this->load->view('modals/jabatan');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-jabatan');
			$this->load->view('script/notif');
			$this->load->view('validasi/jabatan/form_jabatan');
			$this->load->view('validasi/jabatan/ubah_jabatan');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_jabatan)
	{
		if ($_POST['nama'] != "") {
			$this->jabatan_model->ubah_jabatan($kd_jabatan);
		}
	}

	public function hapus($kd_jabatan)
	{
			$this->jabatan_model->hapus_jabatan($kd_jabatan);
			$data['jabatan_view'] = $this->jabatan_model->get_jabatan();
			$this->load->view('jabatan/result', $data);
	}
}
