<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_klien2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_klien_model2');
		$this->load->helper('url_helper');
	}

	public function tambah2()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

					unset($_SESSION['pemesanan']);
					unset($_SESSION['kd_pemesanan']);
					unset($_SESSION['tipe_pesanan']);
					unset($_SESSION['klien']);
					unset($_SESSION['tgl_mulai']);
					unset($_SESSION['tgl_selesai']);

					unset($_POST['pemesanan']);
					unset($_POST['kd_pemesanan']);
					unset($_POST['tipe_pesanan']);
					unset($_POST['klien']);
					unset($_POST['tgl_mulai']);
					unset($_POST['tgl_selesai']);

      $data['klien_view'] = $this->transaksi_klien_model2->get_klien();

			$this->load->view('templates/section1', $data);
			$this->load->view('transaksi/klien/pemesanan2/tambah2', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
      $this->load->view('script/datepicker');
			$this->load->view('validasi/pemesanan2/tambah_pemesanan2');
			$this->load->view('templates/09_end');
	}

	public function tombol_selanjutnya2()
	{
			//generate kd_pemesanan
			$kd_pemesanan = $this->transaksi_klien_model2->hitung_kode();
			if (isset( $kd_pemesanan[0]['kd_pemesanan']) == TRUE) {
				$kd_pemesanan = $kd_pemesanan[0]['kd_pemesanan']+1;
			}
			else {
				$kd_pemesanan = 1;
			}

			$tipe_pesanan = $this->input->post('tipe_pesanan');
			$klien = $this->input->post('klien');

			$tgl = $this->input->post('tgl');
			$tgl = explode(" ", $tgl);

			$tgl1 = $tgl['0'];
			$tgl1 = explode("/",$tgl1);
			$d1 = $tgl1['0'];
			$m1 = $tgl1['1'];
			$y1 = $tgl1['2'];
			$tanggal1 = array($y1, $m1, $d1);
			$tgl_mulai = implode("-", $tanggal1);

			$tgl2 = $tgl['2'];
			$tgl2 = explode("/",$tgl2);
			$d2 = $tgl2['0'];
			$m2 = $tgl2['1'];
			$y2 = $tgl2['2'];
			$tanggal2 = array($y2, $m2, $d2);
			$tgl_selesai = implode("-", $tanggal2)." 23:00:00";

			$this->session->set_userdata('kd_pemesanan', $kd_pemesanan);
			$this->session->set_userdata('tipe_pesanan', $tipe_pesanan);
			$this->session->set_userdata('klien', $klien);
			$this->session->set_userdata('tgl_mulai', $tgl_mulai);
			$this->session->set_userdata('tgl_selesai', $tgl_selesai);

	}

	public function tambah_detail2()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah Detail';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

			$pemesanan = $this->session->userdata('pemesanan');
			$this->session->set_userdata('pemesanan', $pemesanan);

      $data['jenis_pesanan_view'] = $this->transaksi_klien_model2->get_jenis_pesanan();

			$this->load->view('templates/section1', $data);
			$this->load->view('transaksi/klien/pemesanan2/tambah_detail2', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
	    $this->load->view('validasi/pemesanan2/form_detail2');
	    $this->load->view('validasi/pemesanan2/tambah_detail2');
      $this->load->view('script/datepicker');
      $this->load->view('script/datatable');
			$this->load->view('modals/loading');
			$this->load->view('templates/09_end');

	}

	public function tombol_tambah2(){
		if ($_POST['harga_jual'] != "" && $_POST['keterangan'] != "") {
			$data['jenis_pesanan_view'] = $this->transaksi_klien_model2->get_jenis_pesanan();

			$pemesanan = $this->session->userdata('pemesanan');
			$kd_pemesanan = $this->session->userdata('kd_pemesanan');
			$jenis_pesanan = $this->input->post('jenis_pesanan');
			$harga_jual = $this->input->post('harga_jual');
			$keterangan = $this->input->post('keterangan');

			$pemesanan[] = array(
										'kd_pemesanan' => $kd_pemesanan,
										'kd_jenis_pesanan' => $jenis_pesanan,
										'harga_jual' => $harga_jual,
										'keterangan' => $keterangan,
									);

			$this->session->set_userdata('pemesanan', $pemesanan);

	    $this->load->view('transaksi/klien/pemesanan2/result_detail_pemesanan2', $data);
		}
  }

	public function tombol_simpan2(){
			if (count($_SESSION['pemesanan']) == 0) {
				echo json_encode(array('status'=>FALSE));
			}
			else {
			$t = $this->transaksi_klien_model2->tambah_pemesanan();
			$td = $this->transaksi_klien_model2->tambah_detail_pemesanan();

			unset($_SESSION['pemesanan']);
			unset($_SESSION['tipe_pesanan']);
			unset($_SESSION['klien']);
			unset($_SESSION['tgl_mulai']);
			unset($_SESSION['tgl_selesai']);
			unset($_SESSION['status']);


				echo json_encode(array('status'=>TRUE));

			}
	}

	public function kirim_email()
	{
		$daftar = $this->transaksi_klien_model->get_email();

		$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.gmail.com',
						'smtp_port' => 465,
						'smtp_user' => 'muhammadrifki8866@gmail.com',
						'smtp_pass' => 'hitam8696',
						'mailtype'  => 'html',
						'charset'   => 'iso-8859-1'
		);

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

		foreach ($daftar as $kirim)
		{
			$pesan = $this->load->view('emails/email_pesanan_baru',$kirim,TRUE);
			$this->email->clear();
			$this->email->to($kirim['email']);
			$this->email->from('muhammadrifki8866@gmail.com', 'RK Studio');
			$this->email->subject('Pesanan Baru '.$kirim['nama']);
			$this->email->message($pesan);
			$this->email->send();
		}
		unset($_SESSION['kd_pemesanan']);
	}

	public function ubah2($kd_pemesanan)
	{
		$this->load->helper('form');
    $this->load->Library('form_validation');
		$data['judul'] = 'Ubah';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

		$data['pemesanan_item'] = $this->transaksi_klien_model2->get_pemesanan($kd_pemesanan);
    $data['klien_view'] = $this->transaksi_klien_model2->get_klien();

		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/klien/pemesanan2/ubah2', $data);
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
    $this->load->view('script/datepicker');
		$this->load->view('validasi/pemesanan2/ubah_pemesanan2');
		$this->load->view('templates/09_end');
	}

	public function tombol_ubah2($kd_pemesanan){
			$this->transaksi_klien_model2->ubah_pemesanan($kd_pemesanan);
	}

	public function ubah_detail2($kd_pemesanan)
	{
		if (isset($_SESSION['pemesanan']) === FALSE) {
			$pemesanan = $this->transaksi_klien_model2->get_detail_pemesanan($kd_pemesanan);
			$this->session->set_userdata('pemesanan', $pemesanan);
		}

		$this->load->helper('form');

		$pem = $this->transaksi_klien_model2->get_pemesanan($kd_pemesanan);

		$this->session->set_userdata('kd_pemesanan', $pem['kd_pemesanan']);
		$this->session->set_userdata('tgl_mulai', $pem['tgl_mulai']);
		$this->session->set_userdata('tgl_selesai', $pem['tgl_selesai']);


		$data['judul'] = 'Ubah Detail';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

			$pemesanan = $this->session->userdata('pemesanan');
			$this->session->set_userdata('pemesanan', $pemesanan);

			$data['jenis_pesanan_view'] = $this->transaksi_klien_model2->get_jenis_pesanan();

			$this->load->view('templates/section1', $data);
			$this->load->view('transaksi/klien/pemesanan2/ubah_detail2', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('validasi/pemesanan2/form_detail2');
			$this->load->view('validasi/pemesanan2/ubah_detail2');
			$this->load->view('script/datepicker');
			$this->load->view('script/datatable');
			$this->load->view('modals/loading');
			$this->load->view('templates/09_end');
	}

	public function tombol_ubah_detail2($kd_pemesanan)	{
		$p = $_SESSION['pemesanan'];
		if (count($p) == 0) {
			echo json_encode(array('status'=>FALSE));
		}
		else {

			$this->transaksi_klien_model2->hapus_detail_pemesanan($kd_pemesanan);
			$this->transaksi_klien_model2->tambah_detail_pemesanan();

			unset($_SESSION['pemesanan']);
			unset($_SESSION['kd_pemesanan']);
			unset($_SESSION['tipe_pesanan']);
			unset($_SESSION['klien']);
			unset($_SESSION['tgl_mulai']);
			unset($_SESSION['tgl_selesai']);
			unset($_SESSION['status']);

			echo json_encode(array('status'=>TRUE));
		}
	}

	public function kembali2()
	{
		unset($_SESSION['pemesanan']);
		unset($_SESSION['kd_pemesanan']);
		unset($_SESSION['tipe_pesanan']);
		unset($_SESSION['klien']);
		unset($_SESSION['tgl_mulai']);
		unset($_SESSION['tgl_selesai']);
		unset($_SESSION['status']);
	}

	public function hapus_detail2()
	{
		$data['jenis_pesanan_view'] = $this->transaksi_klien_model2->get_jenis_pesanan();
		$hapus = $this->input->post('hapus');
		$pemesanan = $this->session->userdata('pemesanan');
		unset($pemesanan[$hapus]);
		$this->session->set_userdata('pemesanan', $pemesanan);
		$this->load->view('transaksi/klien/pemesanan2/result_detail_pemesanan2', $data);
	}

	public function edit_detail2()
	{
		$data['jenis_pesanan_view'] = $this->transaksi_klien_model2->get_jenis_pesanan();
		$edit = $this->input->post('edit');
		$pemesanan = $this->session->userdata('pemesanan');

		$jenis_pesanan = $pemesanan[$edit]['kd_jenis_pesanan'];
		$harga_jual = $pemesanan[$edit]['harga_jual'];
		$keterangan = $pemesanan[$edit]['keterangan'];

		echo json_encode(array('jenis_pesanan' => $jenis_pesanan, 'harga_jual' => $harga_jual,	'keterangan' => $keterangan, 'edit' => $edit));
	}

	public function tombol_edit2()
	{
		if ($_POST['harga_jual'] != "" && $_POST['keterangan'] != "") {
			$edit = $this->input->post('edit');
			$jenis_pesanan = $this->input->post('jenis_pesanan');
			$harga_jual = $this->input->post('harga_jual');
			$keterangan = $this->input->post('keterangan');
			$kd_pemesanan = $this->session->userdata('kd_pemesanan');
			$pemesanan = $this->session->userdata('pemesanan');

			$data['jenis_pesanan_view'] = $this->transaksi_klien_model2->get_jenis_pesanan();

			unset($pemesanan[$edit]);

			$pemesanan[] = array(
										'kd_pemesanan' => $kd_pemesanan,
										'kd_jenis_pesanan' => $jenis_pesanan,
										'harga_jual' => $harga_jual,
										'keterangan' => $keterangan,
									);
			$this->session->set_userdata('pemesanan', $pemesanan);
			$this->load->view('transaksi/klien/pemesanan2/result_detail_pemesanan2', $data);
		}
	}


	public function reload_result2()
	{
			$data['jenis_pesanan_view'] = $this->transaksi_klien_model2->get_jenis_pesanan();

		$this->load->view('transaksi/klien/pemesanan2/result_detail_pemesanan2', $data);
	}

	public function hapus_ubah_detail($key)
	{
		$pemesanan = $this->session->userdata('pemesanan');
		unset($pemesanan[$key]);
		$this->session->set_userdata('pemesanan', $pemesanan);
		redirect('pemesanan2/ubah_detail');
	}
}
