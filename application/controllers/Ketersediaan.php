<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketersediaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ketersediaan_model');
	}

	public function index()
	{
		$this->load->helper('form');
    $data['judul'] = 'Ketersediaan';
		$data['ketersediaan'] = 'active';


		$this->load->view('templates/section1', $data);
    $this->load->view('ketersediaan/ketersediaan');
    $this->load->view('templates/section2');
    $this->load->view('templates/08_javascript');
    $this->load->view('script/datepicker');
		$this->load->view('script/datatable');
		$this->load->view('validasi/ketersediaan/ketersediaan');
    $this->load->view('templates/09_end');

	}

	public function cek()
	{
		$data['peralatan_view'] = $this->ketersediaan_model->get_peralatan();
		$this->load->view('ketersediaan/peralatan', $data);
	}

	public function cek2()
	{
		$data['pegawai_view'] = $this->ketersediaan_model->get_pegawai();
		$this->load->view('ketersediaan/pegawai', $data);
	}

	public function kategori()
	{
		$data['kategori_view'] = $this->ketersediaan_model->get_kategori();
		$this->load->view('ketersediaan/kategori_peralatan', $data);
	}

}
