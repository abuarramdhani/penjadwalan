<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('area_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Area';
		$data['area'] = 'active';
		$data['master'] = 'active';

		$data['area_view'] = $this->area_model->get_area();


		$this->load->view('templates/section1', $data);
		$this->load->view('area/area', $data);
		$this->load->view('modals/area');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-area');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($area = 'area')
	{

		if (!file_exists(APPPATH.'views/area/'.$area.'.php')) {
			show_404();
		}

		$data['judul'] = 'Area';
		$data['area'] = 'active';
		$data['master'] = 'active';

		$data['area_view'] = $this->area_model->get_area();


		$this->load->view('templates/section1', $data);
		$this->load->view('area/'.$area, $data);
		$this->load->view('modals/area');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-area');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['area'] = 'active';
		$data['master'] = 'active';

			$this->load->view('templates/section1', $data);
			$this->load->view('area/tambah');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-area');
			$this->load->view('script/notif');
			$this->load->view('validasi/area/form_area');
			$this->load->view('validasi/area/tambah_area');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['nama'] != "" && $_POST['uang_makan'] != "" && $_POST['status'] != "") {
			$this->area_model->tambah_area();
		}
	}

	public function ubah($kd_area)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['area'] = 'active';
		$data['master'] = 'active';


			$data['area_item'] = $this->area_model->get_area($kd_area);

			$this->load->view('templates/section1', $data);
			$this->load->view('area/ubah', $data);
			$this->load->view('modals/area');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('script/datatable');
			$this->load->view('script/modal-area');
			$this->load->view('script/notif');
			$this->load->view('validasi/area/form_area');
			$this->load->view('validasi/area/ubah_area');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_area)
	{
		if ($_POST['nama'] != "" && $_POST['uang_makan'] != "" && $_POST['status'] != "")
		{
			$this->area_model->ubah_area($kd_area);
		}
	}

	public function hapus($kd_area)
	{
			$this->area_model->hapus_area($kd_area);
			$data['area_view'] = $this->area_model->get_area();
			$this->load->view('area/result', $data);
	}
}
