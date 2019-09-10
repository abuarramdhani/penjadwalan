<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peralatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peralatan_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['judul'] = 'Peralatan';
		$data['peralatan'] = 'active';
		$data['master'] = 'active';

		$data['peralatan_view'] = $this->peralatan_model->get_peralatan();


		$this->load->view('templates/section1', $data);
		$this->load->view('peralatan/peralatan', $data);
		$this->load->view('modals/peralatan');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-peralatan');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');

	}

	public function view($peralatan = 'peralatan')
	{

		if (!file_exists(APPPATH.'views/peralatan/'.$peralatan.'.php')) {
			show_404();
		}

		$data['judul'] = 'Peralatan';
		$data['peralatan'] = 'active';
		$data['master'] = 'active';

		$data['peralatan_view'] = $this->peralatan_model->get_peralatan();


		$this->load->view('templates/section1', $data);
		$this->load->view('peralatan/'.$peralatan, $data);
		$this->load->view('modals/peralatan');
		$this->load->view('modals/hapus');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-peralatan');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['peralatan'] = 'active';
		$data['master'] = 'active';

      $data['tipe_view'] = $this->peralatan_model->get_tipe();


			$this->load->view('templates/section1', $data);
			$this->load->view('peralatan/tambah', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('validasi/peralatan/form_tambah_peralatan');
			$this->load->view('validasi/peralatan/tambah_peralatan');
			$this->load->view('templates/09_end');
	}

	public function tombol_simpan()
	{
		if ($_POST['kode1'] != "") {
			$this->peralatan_model->tambah_peralatan();
		}
	}

	public function ubah($kd_peralatan)
	{
		$this->load->helper('form');

		$data['judul'] = 'Ubah';
		$data['peralatan'] = 'active';
		$data['master'] = 'active';

			$data['peralatan_item'] = $this->peralatan_model->get_peralatan($kd_peralatan);
			$data['tipe_view'] = $this->peralatan_model->get_tipe();

			$this->load->view('templates/section1', $data);
			$this->load->view('peralatan/ubah', $data);
			$this->load->view('modals/peralatan');
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('validasi/peralatan/form_ubah_peralatan');
			$this->load->view('validasi/peralatan/ubah_peralatan');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_peralatan)
	{
		if ($_POST['kode1'] != "") {
			$this->peralatan_model->ubah_peralatan($kd_peralatan);
		}
	}

	public function hapus($kd_peralatan)
	{
			$this->peralatan_model->hapus_peralatan($kd_peralatan);
			$data['peralatan_view'] = $this->peralatan_model->get_peralatan();
			$this->load->view('peralatan/result', $data);
	}

	public function cek_kode()
	{
		$kode = $this->input->post('kode');

		$kd_peralatan = $this->peralatan_model->get_kd_peralatan($kode);

		if (count($kd_peralatan) == 1) {
			$respone = TRUE;
		}
		else {
			$respone = FALSE;
		}
		header('Content-Type:application/json;');
		echo json_encode($respone);
	}

	public function cek_kode2()
	{
		$kode = $this->input->post('kode');
		$cek = $this->input->post('cek');

		$kd_peralatan = $this->peralatan_model->get_kd_peralatan($kode);

		if (count($kd_peralatan) == 1) {
			if ($kd_peralatan['kd_peralatan'] != $cek) {
				$respone = TRUE;
			}
			else {
				$respone = FALSE;
			}
		}
		else {
			$respone = FALSE;
		}
		header('Content-Type:application/json;');
		echo json_encode($respone);
	}

}
