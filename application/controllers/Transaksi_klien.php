<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi_klien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_klien_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$this->load->helper('form');
		$data['judul'] = 'Pemesanan';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

		$status_user = $this->session->userdata('akses');

		// if ($status_user == "superadmin") {
			$data['pemesanan_view'] = $this->transaksi_klien_model->get_pemesanan();
		// }
		// else {
		// 	$data['pemesanan_view'] = $this->transaksi_klien_model->get_pemesanan2();
		// }

		unset($_SESSION['pemesanan']);
		unset($_SESSION['proses']);
		unset($_SESSION['kd_pemesanan']);
		unset($_SESSION['kd_peralatan']);
		unset($_SESSION['tipe_pesanan']);
		unset($_SESSION['klien']);
		unset($_SESSION['tgl_mulai']);
		unset($_SESSION['tgl_selesai']);
		unset($_SESSION['kota']);
		unset($_SESSION['nama_event']);
		unset($_SESSION['lokasi']);
		unset($_SESSION['proses_sdm']);
		unset($_SESSION['gaji_rab']);
		unset($_SESSION['email']);
		unset($_SESSION['rab']);
		unset($_SESSION['proses_peralatan']);
		unset($_SESSION['proses_alat_sewa']);
		unset($_SESSION['proses_pengeluaran']);

		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/klien/pemesanan/pemesanan', $data);
		$this->load->view('modals/pemesanan');
		$this->load->view('modals/hapus');
		$this->load->view('modals/konfirmasi');
		$this->load->view('modals/batalkan');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datepicker');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-konfirmasi');
		$this->load->view('script/modal-batalkan');
		$this->load->view('script/modal-pemesanan');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
	}

	public function view($pemesanan = 'pemesanan')
	{

		if (!file_exists(APPPATH.'views/transaksi/klien/pemesanan/'.$pemesanan.'.php')) {
			show_404();
		}
		$this->load->helper('form');
		$data['judul'] = 'Pemesanan';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

		$status_user = $this->session->userdata('akses');

		// if ($status_user == "superadmin") {
			$data['pemesanan_view'] = $this->transaksi_klien_model->get_pemesanan();
		// }
		// else {
		// 	$data['pemesanan_view'] = $this->transaksi_klien_model->get_pemesanan2();
		// }

		unset($_SESSION['pemesanan']);
		unset($_SESSION['proses']);
		unset($_SESSION['kd_pemesanan']);
		unset($_SESSION['kd_peralatan']);
		unset($_SESSION['tipe_pesanan']);
		unset($_SESSION['klien']);
		unset($_SESSION['tgl_mulai']);
		unset($_SESSION['tgl_selesai']);
		unset($_SESSION['kota']);
		unset($_SESSION['nama_event']);
		unset($_SESSION['lokasi']);
		unset($_SESSION['proses_sdm']);
		unset($_SESSION['gaji_rab']);
		unset($_SESSION['email']);
		unset($_SESSION['rab']);
		unset($_SESSION['proses_peralatan']);
		unset($_SESSION['proses_alat_sewa']);
		unset($_SESSION['proses_pengeluaran']);

		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/klien/pemesanan/'.$pemesanan, $data);
		$this->load->view('modals/pemesanan');
		$this->load->view('modals/hapus');
		$this->load->view('modals/konfirmasi');
		$this->load->view('modals/batalkan');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datepicker');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-pemesanan');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-konfirmasi');
		$this->load->view('script/modal-batalkan');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
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
					unset($_SESSION['kota']);
					unset($_SESSION['nama_event']);
					unset($_SESSION['lokasi']);

					unset($_POST['pemesanan']);
					unset($_POST['kd_pemesanan']);
					unset($_POST['tipe_pesanan']);
					unset($_POST['klien']);
					unset($_POST['tgl_mulai']);
					unset($_POST['tgl_selesai']);
					unset($_POST['kota']);
					unset($_POST['nama_event']);
					unset($_POST['lokasi']);

      $data['klien_view'] = $this->transaksi_klien_model->get_klien();
      $data['kota_view'] = $this->transaksi_klien_model->get_kota();
			$this->load->view('templates/section1', $data);
			$this->load->view('transaksi/klien/pemesanan/tambah', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
      $this->load->view('script/datepicker');
			$this->load->view('validasi/pemesanan/tambah_pemesanan');
			$this->load->view('validasi/pemesanan/form_pemesanan');
			$this->load->view('templates/09_end');
	}

	public function tombol_selanjutnya()
	{
		if ($_POST['nama_event'] != "" && $_POST['lokasi'] != "") {
			//generate kd_pemesanan
			$kd_pemesanan = $this->transaksi_klien_model->hitung_kode();
			if (isset( $kd_pemesanan[0]['kd_pemesanan']) == TRUE) {
				$kd_pemesanan = $kd_pemesanan[0]['kd_pemesanan']+1;
			}
			else {
				$kd_pemesanan = 1;
			}

			$tipe_pesanan = $this->input->post('tipe_pesanan');
			$klien = $this->input->post('klien');
			$kota = $this->input->post('kota');
			$nama_event = $this->input->post('nama_event');
			$lokasi = $this->input->post('lokasi');

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
			$this->session->set_userdata('kota', $kota);
			$this->session->set_userdata('nama_event', $nama_event);
			$this->session->set_userdata('lokasi', $lokasi);

		}
	}

	public function tambah_detail()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah Detail';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

		// menghitung selisih tanggal mulai dan selesai
		$tgl_mulai		= new DateTime($_SESSION['tgl_mulai']);
		$tgl_selesai	= new DateTime($_SESSION['tgl_selesai']);

		$selisih = $tgl_mulai->diff($tgl_selesai)->format("%a");

    $tgl = explode("-", $_SESSION['tgl_mulai']);
    $d = $tgl['0'];
    $m = $tgl['1'];
    $y = $tgl['2'];
    $tanggal = array($y, $m, $d);
    $tanggal = implode("-", $tanggal);

		$data['tanggal'] = $tanggal;

		if ($selisih == 0) {
			$selisih = 1;
			$data['indeks'] = $selisih;
		}
		else {
			$data['indeks'] = $selisih+1;
		}

    if (isset($button) === FALSE || $this->form_validation->run() === FALSE) {
			$pemesanan = $this->session->userdata('pemesanan');
			$this->session->set_userdata('pemesanan', $pemesanan);

      $data['jenis_pesanan_view'] = $this->transaksi_klien_model->get_jenis_pesanan();
      $data['jenis_pesanan_view2'] = $this->transaksi_klien_model->get_jenis_pesanan2();

			$this->load->view('templates/section1', $data);
			$this->load->view('transaksi/klien/pemesanan/tambah_detail', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
	    $this->load->view('validasi/pemesanan/form_detail');
	    $this->load->view('validasi/pemesanan/tambah_detail');
      $this->load->view('script/datepicker');
      $this->load->view('script/datatable');
			$this->load->view('modals/loading');
			$this->load->view('templates/09_end');
		}
	}

	public function tombol_tambah(){
		if ($_POST['harga_jual'] != "" && $_POST['keterangan'] != "" && $_POST['tgl'] != "") {
			$data['jenis_pesanan_view2'] = $this->transaksi_klien_model->get_jenis_pesanan2();

			$pemesanan = $this->session->userdata('pemesanan');
			$kd_pemesanan = $this->session->userdata('kd_pemesanan');
			$jenis_pesanan = $this->input->post('jenis_pesanan');
			$harga_jual = $this->input->post('harga_jual');
			$keterangan = $this->input->post('keterangan');
			$tgl = $this->input->post('tgl');
			$tanggal = implode(', ', $tgl);

			$pemesanan[] = array(
										'kd_pemesanan' => $kd_pemesanan,
										'kd_jenis_pesanan' => $jenis_pesanan,
										'harga_jual' => $harga_jual,
										'keterangan' => $keterangan,
										'tgl' => $tanggal
									);

			$this->session->set_userdata('pemesanan', $pemesanan);

	    $this->load->view('transaksi/klien/pemesanan/result_detail_pemesanan', $data);
		}
  }

	public function tombol_simpan(){
			if (count($_SESSION['pemesanan']) == 0) {
				echo json_encode(array('status'=>FALSE));

			}
			else {
			$t = $this->transaksi_klien_model->tambah_pemesanan();
			$td = $this->transaksi_klien_model->tambah_detail_pemesanan();

			unset($_SESSION['pemesanan']);
			unset($_SESSION['tipe_pesanan']);
			unset($_SESSION['klien']);
			unset($_SESSION['tgl_mulai']);
			unset($_SESSION['tgl_selesai']);
			unset($_SESSION['kota']);
			unset($_SESSION['nama_event']);
			unset($_SESSION['lokasi']);;


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

	public function ubah($kd_pemesanan)
	{
		$this->load->helper('form');
    $this->load->Library('form_validation');
		$data['judul'] = 'Ubah';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

		$data['pemesanan_item'] = $this->transaksi_klien_model->get_pemesanan($kd_pemesanan);
    $data['klien_view'] = $this->transaksi_klien_model->get_klien();
    $data['kota_view'] = $this->transaksi_klien_model->get_kota();

		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/klien/pemesanan/ubah', $data);
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
    $this->load->view('script/datepicker');
		$this->load->view('validasi/pemesanan/ubah_pemesanan');
		$this->load->view('validasi/pemesanan/form_pemesanan');
		$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_pemesanan){
		if ($_POST['nama_event'] != "" && $_POST['lokasi'] != "") {
			$this->transaksi_klien_model->ubah_pemesanan($kd_pemesanan);
		}
	}

	public function ubah_detail($kd_pemesanan)
	{
		if (isset($_SESSION['pemesanan']) === FALSE) {
			$pemesanan = $this->transaksi_klien_model->get_detail_pemesanan($kd_pemesanan);
			$this->session->set_userdata('pemesanan', $pemesanan);
		}

		$this->load->helper('form');
		$this->load->Library('form_validation');

		$pem = $this->transaksi_klien_model->get_pemesanan($kd_pemesanan);

		$this->session->set_userdata('kd_pemesanan', $pem['kd_pemesanan']);
		$this->session->set_userdata('tgl_mulai', $pem['tgl_mulai']);
		$this->session->set_userdata('tgl_selesai', $pem['tgl_selesai']);


		$data['judul'] = 'Ubah Detail';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

		// menghitung selisih tanggal mulai dan selesai
		$tgl_mulai		= new DateTime($_SESSION['tgl_mulai']);
		$tgl_selesai	= new DateTime($_SESSION['tgl_selesai']);

		$selisih = $tgl_mulai->diff($tgl_selesai)->format("%a");


    $tgl = explode("-", $_SESSION['tgl_mulai']);
    $d = $tgl['0'];
    $m = $tgl['1'];
    $y = $tgl['2'];
    $tanggal = array($y, $m, $d);
    $tanggal = implode("-", $tanggal);

		$data['tanggal'] = $tanggal;

		if ($selisih == 0) {
			$selisih = 1;
			$data['indeks'] = $selisih;
		}
		else {
			$data['indeks'] = $selisih+1;
		}

			$pemesanan = $this->session->userdata('pemesanan');
			$this->session->set_userdata('pemesanan', $pemesanan);

			$data['jenis_pesanan_view'] = $this->transaksi_klien_model->get_jenis_pesanan();
			$data['jenis_pesanan_view2'] = $this->transaksi_klien_model->get_jenis_pesanan2();

			$this->load->view('templates/section1', $data);
			$this->load->view('transaksi/klien/pemesanan/ubah_detail', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
			$this->load->view('validasi/pemesanan/form_detail');
			$this->load->view('validasi/pemesanan/ubah_detail');
			$this->load->view('script/datepicker');
			$this->load->view('script/datatable');
			$this->load->view('modals/loading');
			$this->load->view('templates/09_end');

	}

	public function tombol_ubah_detail($kd_pemesanan)	{
		$p = $_SESSION['pemesanan'];
		if (count($p) == 0) {
			echo json_encode(array('status'=>FALSE));
		}
		else {

			$this->transaksi_klien_model->hapus_detail_pemesanan($kd_pemesanan);
			$this->transaksi_klien_model->tambah_detail_pemesanan();

			unset($_SESSION['pemesanan']);
			unset($_SESSION['kd_pemesanan']);
			unset($_SESSION['tipe_pesanan']);
			unset($_SESSION['klien']);
			unset($_SESSION['tgl_mulai']);
			unset($_SESSION['tgl_selesai']);
			unset($_SESSION['kota']);
			unset($_SESSION['nama_event']);
			unset($_SESSION['lokasi']);

			echo json_encode(array('status'=>TRUE));
		}
	}

	public function kembali()
	{
		unset($_SESSION['pemesanan']);
		unset($_SESSION['kd_pemesanan']);
		unset($_SESSION['tipe_pesanan']);
		unset($_SESSION['klien']);
		unset($_SESSION['tgl_mulai']);
		unset($_SESSION['tgl_selesai']);
		unset($_SESSION['kota']);
		unset($_SESSION['nama_event']);
		unset($_SESSION['lokasi']);
	}

	public function hapus($kd_pemesanan)
	{
			$this->transaksi_klien_model->hapus_pemesanan($kd_pemesanan);
			$this->transaksi_klien_model->hapus_detail_pemesanan($kd_pemesanan);

			$data['pemesanan_view'] = $this->transaksi_klien_model->get_pemesanan();

			$this->load->view('transaksi/klien/pemesanan/result', $data);
	}

	public function hapus_detail()
	{
		$data['jenis_pesanan_view2'] = $this->transaksi_klien_model->get_jenis_pesanan2();
		$hapus = $this->input->post('hapus');
		$pemesanan = $this->session->userdata('pemesanan');
		unset($pemesanan[$hapus]);
		$this->session->set_userdata('pemesanan', $pemesanan);
		$this->load->view('transaksi/klien/pemesanan/result_detail_pemesanan', $data);
	}

	public function edit_detail()
	{
		$data['jenis_pesanan_view'] = $this->transaksi_klien_model->get_jenis_pesanan();
		$edit = $this->input->post('edit');
		$pemesanan = $this->session->userdata('pemesanan');

		$jenis_pesanan = $pemesanan[$edit]['kd_jenis_pesanan'];
		$harga_jual = $pemesanan[$edit]['harga_jual'];
		$keterangan = $pemesanan[$edit]['keterangan'];
		$tgl = $pemesanan[$edit]['tgl'];
		$tgl = explode(', ', $tgl);

		echo json_encode(array('jenis_pesanan' => $jenis_pesanan, 'harga_jual' => $harga_jual,	'keterangan' => $keterangan, 'tgl' => $tgl, 'edit' => $edit));
	}

	public function tombol_edit()
	{
		if ($_POST['harga_jual'] != "" && $_POST['keterangan'] != "" && $_POST['tgl'] != "") {
			$edit = $this->input->post('edit');
			$jenis_pesanan = $this->input->post('jenis_pesanan');
			$harga_jual = $this->input->post('harga_jual');
			$keterangan = $this->input->post('keterangan');
			$tgl = $this->input->post('tgl');
			$kd_pemesanan = $this->session->userdata('kd_pemesanan');
			$pemesanan = $this->session->userdata('pemesanan');
			$tanggal = implode(', ', $tgl);

			$data['jenis_pesanan_view2'] = $this->transaksi_klien_model->get_jenis_pesanan2();

			unset($pemesanan[$edit]);

			$pemesanan[] = array(
										'kd_pemesanan' => $kd_pemesanan,
										'kd_jenis_pesanan' => $jenis_pesanan,
										'harga_jual' => $harga_jual,
										'keterangan' => $keterangan,
										'tgl' => $tanggal
									);
			$this->session->set_userdata('pemesanan', $pemesanan);
			$this->load->view('transaksi/klien/pemesanan/result_detail_pemesanan', $data);
		}
	}


	public function reload_result()
	{
			$data['jenis_pesanan_view2'] = $this->transaksi_klien_model->get_jenis_pesanan2();

		$this->load->view('transaksi/klien/pemesanan/result_detail_pemesanan', $data);
	}

	public function hapus_ubah_detail($key)
	{
		$pemesanan = $this->session->userdata('pemesanan');
		unset($pemesanan[$key]);
		$this->session->set_userdata('pemesanan', $pemesanan);
		redirect('pemesanan/ubah_detail');
	}

	public function konfirmasi($kd_pemesanan){
		$this->transaksi_klien_model->konfirmasi_klien($kd_pemesanan);
		$data['pemesanan_view'] = $this->transaksi_klien_model->get_pemesanan();
		$this->load->view('transaksi/klien/pemesanan/result', $data);
	}

	public function pengembalian()
	{
		$this->load->helper('form');
		$data['judul'] = 'Pengembalian';
		$data['pengembalian_klien'] = 'active';
		$data['transaksi_klien'] = 'active';

		$data['pengembalian_view'] = $this->transaksi_klien_model->get_pengembalian();


		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/klien/pengembalian/pengembalian', $data);
		$this->load->view('modals/pengembalian_klien');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-pengembalian_klien');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
	}

	public function pembatalan($kd_pemesanan)
	{
			$this->transaksi_klien_model->pembatalan($kd_pemesanan);
			$data['pemesanan_view'] = $this->transaksi_klien_model->get_pemesanan();
			$this->load->view('transaksi/klien/pemesanan/result', $data);
	}

}
