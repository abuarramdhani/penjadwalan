<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$this->load->view('templates/section1');
		$this->load->view('pages/dashboard');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/fullcalendar');
		$this->load->view('templates/09_end');
	}

	public function view($page = 'dashboard')
	{

		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
			show_404();
		}

		$data['judul'] = $page;
		$data[$page] = 'active';

		$this->load->view('templates/section1', $data);
		$this->load->view('pages/'.$page);
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/fullcalendar');
		$this->load->view('templates/09_end');
	}

	public function load(){
		$status_user = $this->session->userdata('akses');
		$klien = $this->dashboard_model->get_klien();
		$k = array();
		foreach ($klien as $value) {
			$k[$value['kd_klien']] = $value['nama'];
		}

		if ($status_user == "user") {
			$pemesanan = $this->dashboard_model->get_pemesanan();
		}
		else {
			$pemesanan = $this->dashboard_model->get_pemesanan2();
		}

		foreach($pemesanan as $row)
		{
		  if ($row['tipe_pesanan'] == 'Alat') {
		    $color = '#3c8dbc';
				$url = '#';
				$title = $k[$row["kd_klien"]];
		  }
		  else {
		    $color = '#dd4b39';
				$url = site_url('pekerjaan_saya/'.$row['kd_pemesanan']);
				$title = $row["nama_event"];
		  }
		 $data[] = array(
		  'id'   => $row["kd_pemesanan"],
		  'title'   => $title,
		  'url'   => $url,
		  'start'   => $row["tgl_mulai"],
		  'end'   => $row["tgl_selesai"],
		  'backgroundColor' => $color,
		  'borderColor' => $color
		 );
		}

		echo json_encode($data);

	}
}
