<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_klien_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
			// $this->load->view('emails/email_password');
			$this->load->view('emails/email_proses_pemesanan');
			// $this->load->view('emails/email_pesanan_baru');
	}
}
