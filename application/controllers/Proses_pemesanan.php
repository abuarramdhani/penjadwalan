<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proses_pemesanan_model');
		$this->load->helper('url_helper');
	}

	// ==========================================================================================================
	//
	// ============================================MODUL PERALATAN===============================================
	//
	// ==========================================================================================================


	public function pilih_peralatan($kd_pemesanan)
	{
		if (isset($_SESSION['proses_peralatan']) === FALSE) {
			$p= $this->proses_pemesanan_model->get_peralatan_event($kd_pemesanan);
			if (count($p) == false) {
				$arr = array();
				$this->session->set_userdata('proses_peralatan', $arr);
			}
			else {
				foreach ($p as $key) {
					$proses[$key['kd_peralatan']] = array(
												'kd_pemesanan' => $key['kd_pemesanan'],
												'kd_peralatan' => $key['kd_peralatan']
											);
				}
				unset($p);
				$this->session->set_userdata('proses_peralatan', $proses);
			}
		}

		if (isset($_SESSION['proses_alat_sewa']) === FALSE) {
			$p1 = $this->proses_pemesanan_model->get_alat_sewa_event($kd_pemesanan);
			if (count($p1) == false) {
				$arr1 = array();
				$this->session->set_userdata('proses_alat_sewa', $arr1);
			}
			else {
				foreach ($p1 as $key) {
					$proses1[] = array(
																'kd_pemesanan' => $key['kd_pemesanan'],
																'nama' => $key['nama'],
																'jumlah' => $key['jumlah'],
																'harga' => $key['harga'],
																'kd_vendor' => $key['kd_vendor']
											);
				}
				unset($p1);
				$this->session->set_userdata('proses_alat_sewa', $proses1);
			}
		}

		$this->load->helper('form');

		$this->session->set_userdata('kd_pemesanan', $kd_pemesanan);

		$data['judul'] = 'Pilih Peralatan';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

		$proses = $this->session->userdata('proses_peralatan');
		$this->session->set_userdata('proses_peralatan', $proses);

		$tipe_pesanan = $_GET['pemesanan'];
		if ($tipe_pesanan == 'Alat') {
			$p = $this->proses_pemesanan_model->get_pemesanan2($kd_pemesanan);
		}
		else {
			$p = $this->proses_pemesanan_model->get_pemesanan($kd_pemesanan);
		}


		$tgl_mulai = $p['tgl_mulai'];
		$tgl_selesai = $p['tgl_selesai'];

		$data['vendor_view'] = $this->proses_pemesanan_model->get_vendor();
		$data['detail_pemesanan_view'] = $this->proses_pemesanan_model->get_detail_pemesanan($kd_pemesanan);
		$data['peralatan_view'] = $this->proses_pemesanan_model->get_peralatan($tgl_mulai, $tgl_selesai, $kd_pemesanan);


		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/klien/proses_pemesanan/pilih_peralatan', $data);
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('validasi/proses_pemesanan/form_alat_sewa');
		$this->load->view('validasi/proses_pemesanan/pilih_alat_sewa');
		$this->load->view('validasi/proses_pemesanan/pilih_peralatan');
		$this->load->view('modals/loading');
		$this->load->view('templates/09_end');
	}

	public function tombol_tambah_peralatan(){
		$proses = $this->session->userdata('proses_peralatan');
		$kd_pemesanan = $this->session->userdata('kd_pemesanan');
		$peralatan = $this->input->post('peralatan');

		$proses[$peralatan] = array(
			'kd_pemesanan' => $kd_pemesanan,
			'kd_peralatan' => $peralatan
		);

		$this->session->set_userdata('proses_peralatan', $proses);

		$this->load->view('transaksi/klien/proses_pemesanan/result_peralatan');
	}

	public function tombol_tambah_alat_sewa(){
		$proses1 = $this->session->userdata('proses_alat_sewa');
		$kd_pemesanan = $this->session->userdata('kd_pemesanan');
		$nama = $this->input->post('nama');
		$jumlah = $this->input->post('jumlah');
		$harga = $this->input->post('harga');
		$vendor = $this->input->post('vendor');

		$proses1[] = array(
			'kd_pemesanan' => $kd_pemesanan,
			'nama' => $nama,
			'jumlah' => $jumlah,
			'harga' => $harga,
			'kd_vendor' => $vendor
		);

		$this->session->set_userdata('proses_alat_sewa', $proses1);
		$data['vendor_view'] = $this->proses_pemesanan_model->get_vendor();
		$this->load->view('transaksi/klien/proses_pemesanan/result_alat_sewa', $data);
	}

	public function tombol_pilih_peralatan($kd_pemesanan)	{
		$p = $_SESSION['proses_peralatan'];
		$p1 = $_SESSION['proses_alat_sewa'];

		if (count($p) == 0 && count($p1) == 0) {
			echo json_encode(array('status'=>FALSE));
		}
		else {

			$this->proses_pemesanan_model->hapus_peralatan($kd_pemesanan);
			$this->proses_pemesanan_model->hapus_alat_sewa($kd_pemesanan);
			$this->proses_pemesanan_model->hapus_pengeluaran_alat_sewa($kd_pemesanan);

			if (count($p) != 0) {
				$this->proses_pemesanan_model->tambah_peralatan();
			}

			if (count($p1) != 0) {
				$this->proses_pemesanan_model->tambah_alat_sewa();
				$this->proses_pemesanan_model->tambah_pengeluaran_alat_sewa($kd_pemesanan);
			}

			$jum = $this->proses_pemesanan_model->get_jumlah_rab($kd_pemesanan);
			$jumlah = $jum['jumlah_rab'];
			$this->proses_pemesanan_model->tambah_jumlah_rab($kd_pemesanan, $jumlah);

			unset($_SESSION['proses_peralatan']);
			unset($_SESSION['proses_alat_sewa']);
			unset($_SESSION['kd_pemesanan']);

			echo json_encode(array('status'=>TRUE));
		}
	}

	public function kembali_peralatan()
	{
		unset($_SESSION['proses_peralatan']);
		unset($_SESSION['proses_alat_sewa']);
		unset($_SESSION['kd_pemesanan']);
		unset($_SESSION['tgl_mulai']);
		unset($_SESSION['tgl_selesai']);
	}

	public function hapus_peralatan()
	{
		$hapus = $this->input->post('hapus');
		$proses = $this->session->userdata('proses_peralatan');
		unset($proses[$hapus]);
		$this->session->set_userdata('proses_peralatan', $proses);
		$this->load->view('transaksi/klien/proses_pemesanan/result_peralatan');
	}

	public function hapus_alat_sewa()
	{
		$hapus = $this->input->post('hapus');
		$proses = $this->session->userdata('proses_alat_sewa');
		unset($proses[$hapus]);
		$this->session->set_userdata('proses_alat_sewa', $proses);
		$data['vendor_view'] = $this->proses_pemesanan_model->get_vendor();
		$this->load->view('transaksi/klien/proses_pemesanan/result_alat_sewa', $data);
	}

	public function edit_peralatan()
	{
		$edit = $this->input->post('edit');
		$proses = $this->session->userdata('proses_peralatan');

		$peralatan = $proses[$edit]['kd_peralatan'];

		echo json_encode(array('peralatan' => $peralatan));
	}

	public function edit_alat_sewa()
	{
		$edit = $this->input->post('edit');
		$proses = $this->session->userdata('proses_alat_sewa');

		$nama = $proses[$edit]['nama'];
		$jumlah = $proses[$edit]['jumlah'];
		$harga = $proses[$edit]['harga'];
		$vendor = $proses[$edit]['kd_vendor'];

		echo json_encode(array('nama' => $nama, 'jumlah' => $jumlah, 'harga' => $harga, 'vendor' => $vendor));
	}

	public function tombol_edit_peralatan()
	{
			$edit = $this->input->post('edit');
			$kd_pemesanan = $this->session->userdata('kd_pemesanan');
			$peralatan = $this->input->post('peralatan');
			$proses = $this->session->userdata('proses_peralatan');

			unset($proses[$edit]);

			$proses[$peralatan] = array(
										'kd_pemesanan' => $kd_pemesanan,
										'kd_peralatan' => $peralatan
									);
			$this->session->set_userdata('proses_peralatan', $proses);
			$this->load->view('transaksi/klien/proses_pemesanan/result_peralatan');
	}

	public function tombol_edit_alat_sewa()
	{
			$edit = $this->input->post('edit');
			$proses1 = $this->session->userdata('proses_alat_sewa');
			$kd_pemesanan = $this->session->userdata('kd_pemesanan');
			$nama = $this->input->post('nama');
			$jumlah = $this->input->post('jumlah');
			$harga = $this->input->post('harga');
			$vendor = $this->input->post('vendor');

			unset($proses1[$edit]);

			$proses1[] = array(
				'kd_pemesanan' => $kd_pemesanan,
				'nama' => $nama,
				'jumlah' => $jumlah,
				'harga' => $harga,
				'kd_vendor' => $vendor
			);

			$this->session->set_userdata('proses_alat_sewa', $proses1);

			$data['vendor_view'] = $this->proses_pemesanan_model->get_vendor();
			$this->load->view('transaksi/klien/proses_pemesanan/result_alat_sewa', $data);
	}

	public function cek_peralatan()
	{
		$peralatan = $this->input->post('peralatan');

		$proses = $_SESSION['proses_peralatan'];

	  $cek = array_search($peralatan, array_column($proses, 'kd_peralatan'));
		$cek = "$cek";
		$respone = strlen($cek);

		header('Content-Type:application/json;');
		echo json_encode($respone);

	}

	public function cek_peralatan2()
	{
		$edit = $this->input->post('edit');
		$peralatan = $this->input->post('peralatan');

		$proses = $_SESSION['proses_peralatan'];

	  $cek = array_search($peralatan, array_column($proses, 'kd_peralatan'));
		$cek = "$cek";

		if ($peralatan == $edit) {
			$respone = 0;
		}
		else {
			$respone = strlen($cek);
		}

		header('Content-Type:application/json;');
		echo json_encode($respone);

	}

	// ==========================================================================================================
	//
	// ===========================================MODUL PENGELUARAN==============================================
	//
	// ==========================================================================================================

	public function pilih_pengeluaran($kd_pemesanan)
	{
		if (isset($_SESSION['proses_pengeluaran']) === FALSE) {
			$p= $this->proses_pemesanan_model->get_pengeluaran_event($kd_pemesanan);
			if (count($p) == false) {
				$arr = array();
				$this->session->set_userdata('proses_pengeluaran', $arr);
			}
			else {
				$this->session->set_userdata('proses_pengeluaran', $p);
			}
		}

		$this->load->helper('form');

		$this->session->set_userdata('kd_pemesanan', $kd_pemesanan);

		$data['judul'] = 'Pilih Pengeluaran';
		$data['pemesanan'] = 'active';
		$data['transaksi_klien'] = 'active';

		$proses = $this->session->userdata('proses_pengeluaran');
		$this->session->set_userdata('proses_pengeluaran', $proses);

		$data['jenis_pengeluaran_view'] = $this->proses_pemesanan_model->get_jenis_pengeluaran();
		$data['jenis_pengeluaran_view2'] = $this->proses_pemesanan_model->get_jenis_pengeluaran2();

		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/klien/proses_pemesanan/pilih_pengeluaran', $data);
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('validasi/proses_pemesanan/form_pengeluaran');
		$this->load->view('validasi/proses_pemesanan/pilih_pengeluaran');
		$this->load->view('modals/loading');
		$this->load->view('templates/09_end');
	}

	public function tombol_tambah_pengeluaran(){
		$proses = $this->session->userdata('proses_pengeluaran');
		$kd_pemesanan = $this->session->userdata('kd_pemesanan');
		$jenis_pengeluaran = $this->input->post('jenis_pengeluaran');
		$harga = $this->input->post('harga');
		$keterangan = $this->input->post('keterangan');

		$proses[] = array(
			'kd_pemesanan' => $kd_pemesanan,
			'kd_jenis_pengeluaran' => $jenis_pengeluaran,
			'harga' => $harga,
			'keterangan' => $keterangan
		);
		$this->session->set_userdata('proses_pengeluaran', $proses);

		$data['jenis_pengeluaran_view2'] = $this->proses_pemesanan_model->get_jenis_pengeluaran2();

		$this->load->view('transaksi/klien/proses_pemesanan/result_pengeluaran', $data);
	}

	public function tombol_pilih_pengeluaran($kd_pemesanan)	{
		$p = $_SESSION['proses_pengeluaran'];
		if (count($p) == 0) {
			echo json_encode(array('status'=>FALSE));
		}
		else {

			$this->proses_pemesanan_model->hapus_pengeluaran($kd_pemesanan);
			$this->proses_pemesanan_model->tambah_pengeluaran();

			$jum = $this->proses_pemesanan_model->get_jumlah_rab($kd_pemesanan);
			$jumlah = $jum['jumlah_rab'];
			$this->proses_pemesanan_model->tambah_jumlah_rab($kd_pemesanan, $jumlah);

			unset($_SESSION['proses_pengeluaran']);
			unset($_SESSION['kd_pemesanan']);

			echo json_encode(array('status'=>TRUE));
		}
	}

	public function kembali_pengeluaran()
	{
		unset($_SESSION['proses_pengeluaran']);
		unset($_SESSION['kd_pemesanan']);
		unset($_SESSION['tgl_mulai']);
		unset($_SESSION['tgl_selesai']);
	}

	public function hapus_pengeluaran()
	{
		$hapus = $this->input->post('hapus');
		$proses = $this->session->userdata('proses_pengeluaran');
		unset($proses[$hapus]);
		$this->session->set_userdata('proses_pengeluaran', $proses);

		$data['jenis_pengeluaran_view2'] = $this->proses_pemesanan_model->get_jenis_pengeluaran2();

		$this->load->view('transaksi/klien/proses_pemesanan/result_pengeluaran', $data);
	}

	public function edit_pengeluaran()
	{
		$edit = $this->input->post('edit');
		$proses = $this->session->userdata('proses_pengeluaran');

		$jenis_pengeluaran = $proses[$edit]['kd_jenis_pengeluaran'];
		$harga = $proses[$edit]['harga'];
		$keterangan = $proses[$edit]['keterangan'];

		echo json_encode(array('jenis_pengeluaran' => $jenis_pengeluaran, 'harga' => $harga, 'keterangan' => $keterangan));
	}

	public function tombol_edit_pengeluaran()
	{
			$edit = $this->input->post('edit');
			$kd_pemesanan = $this->session->userdata('kd_pemesanan');
			$jenis_pengeluaran = $this->input->post('jenis_pengeluaran');
			$harga = $this->input->post('harga');
			$keterangan = $this->input->post('keterangan');
			$proses = $this->session->userdata('proses_pengeluaran');

			unset($proses[$edit]);

			$proses[] = array(
										'kd_pemesanan' => $kd_pemesanan,
										'kd_jenis_pengeluaran' => $jenis_pengeluaran,
										'harga' => $harga,
										'keterangan' => $keterangan
									);
			$this->session->set_userdata('proses_pengeluaran', $proses);

			$data['jenis_pengeluaran_view2'] = $this->proses_pemesanan_model->get_jenis_pengeluaran2();

			$this->load->view('transaksi/klien/proses_pemesanan/result_pengeluaran', $data);
	}

	// ==========================================================================================================
	//
	// ============================================MODUL SDM===============================================
	//
	// ==========================================================================================================


	public function pilih_sdm($kd_pemesanan)
	{


		if (isset($_SESSION['proses_sdm']) === FALSE) {
			$proses = $this->proses_pemesanan_model->get_sdm_event($kd_pemesanan);

			foreach ($proses as $p) {
				$tgl = explode("-", $p['tgl']);
		    $d = $tgl['0'];
		    $m = $tgl['1'];
		    $y = $tgl['2'];
		    $tanggal = array($y, $m, $d);
		    $tanggal = implode("-", $tanggal);
				$prose[] = array(
					'kd_pemesanan' => $p['kd_pemesanan'],
					'username' => $p['username'],
					'pekerjaan1' => $p['pekerjaan1'],
					'pekerjaan2' => $p['pekerjaan2'],
					'pekerjaan3' => $p['pekerjaan3'],
					'gaji' => $p['gaji'],
					'uang_makan' => $p['uang_makan'],
					'tgl' => $tanggal,
					'cek' => $p['username']." ".$tanggal
				);
			}


			if (count($proses) == false) {
				$arr = array();
				$this->session->set_userdata('proses_sdm', $arr);
			}
			else {
				$this->session->set_userdata('proses_sdm', $prose);
			}
		}

		if (isset($_SESSION['rab']) === FALSE) {
			$r = $this->proses_pemesanan_model->get_rab($kd_pemesanan);
			if ($r['pemegang_rab'] == "") {
				$rab = '-';
				$this->session->set_userdata('rab', $rab);
			}
			else {
				$rab = $r['pemegang_rab'];
				$this->session->set_userdata('rab', $rab);
			}
		}

		if (isset($_SESSION['email']) == FALSE) {
			$email = array();
			$this->session->set_userdata('email', $email);
		}

		if (isset($_SESSION['gaji_rab']) == FALSE) {
			$gaji_rab = array();
			$this->session->set_userdata('gaji_rab', $gaji_rab);
		}

		$this->load->helper('form');

		$this->session->set_userdata('kd_pemesanan', $kd_pemesanan);

		$data1['judul'] = 'Pilih SDM';
		$data1['pemesanan'] = 'active';
		$data1['transaksi_klien'] = 'active';

		$proses = $this->session->userdata('proses_sdm');
		$this->session->set_userdata('proses_sdm', $proses);

		$p = $this->proses_pemesanan_model->get_pemesanan($kd_pemesanan);
		$data['pemesanan'] = $p;
		$kd_area = $p['kd_area'];
		$data['pekerjaan_view'] = $this->proses_pemesanan_model->get_pekerjaan($kd_area);
		$data['pekerjaan_view2'] = $this->proses_pemesanan_model->get_pekerjaan2($kd_area);

		$tgl_mulai		= new DateTime($p['tgl_mulai']);
		$tgl_selesai	= new DateTime($p['tgl_selesai']);
		// menghitung selisih tanngal mulai dan tgl_selesai

		$selisih = $tgl_mulai->diff($tgl_selesai)->format("%a");

    $tgl = explode("-", $p['tgl_mulai']);
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

		$tm	= $p['tgl_mulai'];
		$ts	= $p['tgl_selesai'];

		$data['detail_pemesanan_view'] = $this->proses_pemesanan_model->get_detail_pemesanan($kd_pemesanan);
		$data['sdm_view'] = $this->proses_pemesanan_model->get_pegawai($tm, $ts, $kd_pemesanan);

		$this->load->view('templates/section1', $data1);
		$this->load->view('transaksi/klien/proses_pemesanan/pilih_sdm', $data);
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('validasi/proses_pemesanan/pilih_sdm');
		$this->load->view('validasi/proses_pemesanan/form_sdm');
		$this->load->view('modals/loading');
		$this->load->view('templates/09_end');
	}

	public function tombol_tambah_sdm(){
		$proses = $this->session->userdata('proses_sdm');
		$email = $this->session->userdata('email');
		$kd_pemesanan = $this->session->userdata('kd_pemesanan');
		$username = $this->input->post('username');
		$pekerjaan1 = $this->input->post('pekerjaan1');
		$pekerjaan2 = $this->input->post('pekerjaan2');
		$pekerjaan3 = $this->input->post('pekerjaan3');
		$gaji = $this->input->post('gaji');
		$uang_makan = $this->input->post('uang_makan');
		$tgl = $this->input->post('tgl');
		$cek = $this->input->post('cek');

		$email[$username] = array(
			'username' => $username,
		);
		$this->session->set_userdata('email', $email);

		$proses[] = array(
			'kd_pemesanan' => $kd_pemesanan,
			'username' => $username,
			'pekerjaan1' => $pekerjaan1,
			'pekerjaan2' => $pekerjaan2,
			'pekerjaan3' => $pekerjaan3,
			'gaji' => $gaji,
			'uang_makan' => $uang_makan,
			'tgl' => $tgl,
			'cek' => $cek,
		);

		$this->session->set_userdata('proses_sdm', $proses);

		$p = $this->proses_pemesanan_model->get_pemesanan($kd_pemesanan);
		$kd_area = $p['kd_area'];

		$data['pekerjaan_view2'] = $this->proses_pemesanan_model->get_pekerjaan2($kd_area);

		$this->load->view('transaksi/klien/proses_pemesanan/result_sdm', $data);
	}

	public function set_rab()	{
		$rab = $this->input->post('rab');
		$this->session->set_userdata('rab', $rab);

		$kd_pemesanan = $this->session->userdata('kd_pemesanan');
		$p = $this->proses_pemesanan_model->get_pemesanan($kd_pemesanan);
		$kd_area = $p['kd_area'];

		$g = $this->proses_pemesanan_model->get_gaji_rab($kd_area);

		$peg = $this->proses_pemesanan_model->get_pegawai_edit($rab);
		$gaji = 0;

		if ($peg['status_pegawai'] == "tetap") {
			$gaji = $g['gaji'];
		}
		else {
			$gaji = $this->pekerjaan($g['gaji'], $g['gaji_magang']);
		}

		$gaji_rab = array(
											'kd_pemesanan' => $kd_pemesanan,
											'username' => $rab,
											'pekerjaan1' => '-2',
											'gaji' => $gaji
										);

		$this->session->set_userdata('gaji_rab', $gaji_rab);

	}

	public function tombol_pilih_sdm($kd_pemesanan)	{
		$p = $_SESSION['proses_sdm'];
		$gaji_rab = $_SESSION['gaji_rab'];

		if (count($p) == 0) {
			echo json_encode(array('status'=>FALSE));
		}
		else {
			$this->proses_pemesanan_model->hapus_sdm($kd_pemesanan);
			$this->proses_pemesanan_model->tambah_sdm();

			$this->proses_pemesanan_model->hapus_pengeluaran_gaji($kd_pemesanan);
			$this->proses_pemesanan_model->tambah_pengeluaran_gaji($kd_pemesanan);

			if (count($gaji_rab) > 0) {
				$this->proses_pemesanan_model->hapus_gaji_rab($kd_pemesanan);
				$this->proses_pemesanan_model->tambah_gaji_rab();
			}

			$this->proses_pemesanan_model->tambah_rab($kd_pemesanan);

			$a = $this->proses_pemesanan_model->get_pemesanan($kd_pemesanan);
			$kd_area = $a['kd_area'];



			$jum = $this->proses_pemesanan_model->get_jumlah_rab($kd_pemesanan);
			$jumlah = $jum['jumlah_rab'];
			$this->proses_pemesanan_model->tambah_jumlah_rab($kd_pemesanan, $jumlah);

			unset($_SESSION['proses_sdm']);
			unset($_SESSION['gaji_rab']);
			unset($_SESSION['rab']);

			echo json_encode(array('status'=>TRUE));
		}
	}

	public function kirim_email()
	{
		$email = $_SESSION['email'];

	if (count($email) > 0) {
		$e = array();
		foreach ($email as $value) {
			$e[$value['username']] = $this->proses_pemesanan_model->email($value['username']);
		}

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

				foreach ($e as $kirim)
				{
				$pesan = $this->load->view('emails/email_proses_pemesanan',$kirim,TRUE);
				$this->email->clear();
				$this->email->to($kirim['email']);
				$this->email->from('muhammadrifki8866@gmail.com', 'RK Studio');
				$this->email->subject('Pekerjaan Baru '.$kirim['nama']);
				$this->email->message($pesan);
				$this->email->send();
				}
			}
			unset($_SESSION['email']);
			unset($_SESSION['kd_pemesanan']);
	}

	// public function gaji_driver()
	// {
	// 	$this->proses_pemesanan_model->tambah_sdm_temp();
	//
	// 	$driver = $this->proses_pemesanan_model->get_driver();
	//
	// 	$d = $driver['jumlah']+1;
	//
	// 	$this->proses_pemesanan_model->hapus_sdm_temp();
	//
	// 	echo json_encode($d);
	// }

	public function kembali_sdm()
	{
		unset($_SESSION['proses_sdm']);
		unset($_SESSION['gaji_rab']);
		unset($_SESSION['email']);
		unset($_SESSION['rab']);
		unset($_SESSION['kd_pemesanan']);
		unset($_SESSION['tgl_mulai']);
		unset($_SESSION['tgl_selesai']);
	}

	public function hapus_sdm()
	{
		$hapus = $this->input->post('hapus');
		$proses = $this->session->userdata('proses_sdm');
		unset($proses[$hapus]);
		$this->session->set_userdata('proses_sdm', $proses);

		$kd_pemesanan = $this->session->userdata('kd_pemesanan');
		$p = $this->proses_pemesanan_model->get_pemesanan($kd_pemesanan);
		$kd_area = $p['kd_area'];

		$data['pekerjaan_view2'] = $this->proses_pemesanan_model->get_pekerjaan2($kd_area);

		$this->load->view('transaksi/klien/proses_pemesanan/result_sdm', $data);
	}

	public function edit_sdm()
	{
		$edit = $this->input->post('edit');
		$proses = $this->session->userdata('proses_sdm');
		$kd_pemesanan = $this->session->userdata('kd_pemesanan');

		$username = $proses[$edit]['username'];
		$pekerjaan1 = $proses[$edit]['pekerjaan1'];
		$pekerjaan2 = $proses[$edit]['pekerjaan2'];
		$pekerjaan3 = $proses[$edit]['pekerjaan3'];
		$gaji = $proses[$edit]['gaji'];
		$uang_makan = $proses[$edit]['uang_makan'];
		$tgl = $proses[$edit]['tgl'];

		$user = $this->proses_pemesanan_model->get_pegawai_edit($username);

		$username = implode(" || ", $user);

		$pem = $this->proses_pemesanan_model->get_pemesanan($kd_pemesanan);
		$kd_area = $pem['kd_area'];
		$p1 = $this->proses_pemesanan_model->get_pekerjaan_edit($kd_area, $pekerjaan1);
		$p2 = $this->proses_pemesanan_model->get_pekerjaan_edit($kd_area, $pekerjaan2);
		$p3 = $this->proses_pemesanan_model->get_pekerjaan_edit($kd_area, $pekerjaan3);

		$m1 = $this->pekerjaan($p1['gaji'], $p1['gaji_magang']);
		$m2 = $this->pekerjaan($p2['gaji'], $p2['gaji_magang']);
		$m3 = $this->pekerjaan($p3['gaji'], $p3['gaji_magang']);

		if (count($p1) > 0) {
			$pekerjaan1 = $p1['kd_pekerjaan']." || ".$p1['gaji']." || ".$m1;
		}
		else {
			$pekerjaan1 = "- || 0 || 0";
		}
		if (count($p2) > 0) {
			$pekerjaan2 = $p2['kd_pekerjaan']." || ".$p2['gaji']." || ".$m2;
		}
		else {
			$pekerjaan2 = "- || 0 || 0";
		}
		if (count($p3) > 0) {
		$pekerjaan3 = $p3['kd_pekerjaan']." || ".$p3['gaji']." || ".$m3;
		}
		else {
			$pekerjaan3 = "- || 0 || 0";
		}

		echo json_encode(array('username' => $username, 'pekerjaan1' => $pekerjaan1, 'pekerjaan2' => $pekerjaan2, 'pekerjaan3' => $pekerjaan3, 'gaji' => $gaji, 'uang_makan' => $uang_makan, 'tgl' => $tgl));
	}

	function pekerjaan($gaji, $magang)
	{
		$m = $gaji*$magang/100;

		$ribuan = substr($m, -3);
		if ($ribuan != "000") {
			$gaji_magang = $m + (1000-$ribuan);
		}
		else{
			$gaji_magang = $m;
		}

		return $gaji_magang;
	}

	public function tombol_edit_sdm()
	{
			$edit = $this->input->post('edit');
			$proses = $this->session->userdata('proses_sdm');

			unset($proses[$edit]);

			$kd_pemesanan = $this->session->userdata('kd_pemesanan');
			$username = $this->input->post('username');
			$pekerjaan1 = $this->input->post('pekerjaan1');
			$pekerjaan2 = $this->input->post('pekerjaan2');
			$pekerjaan3 = $this->input->post('pekerjaan3');
			$gaji = $this->input->post('gaji');
			$uang_makan = $this->input->post('uang_makan');
			$tgl = $this->input->post('tgl');
			$cek = $this->input->post('cek');

			$email[$username] = array(
				'username' => $username,
			);
			$this->session->set_userdata('email', $email);

			$proses[] = array(
				'kd_pemesanan' => $kd_pemesanan,
				'username' => $username,
				'pekerjaan1' => $pekerjaan1,
				'pekerjaan2' => $pekerjaan2,
				'pekerjaan3' => $pekerjaan3,
				'gaji' => $gaji,
				'uang_makan' => $uang_makan,
				'tgl' => $tgl,
				'cek' => $cek,
			);

			$this->session->set_userdata('proses_sdm', $proses);

			$p = $this->proses_pemesanan_model->get_pemesanan($kd_pemesanan);
			$kd_area = $p['kd_area'];

			$data['pekerjaan_view2'] = $this->proses_pemesanan_model->get_pekerjaan2($kd_area);

			$this->load->view('transaksi/klien/proses_pemesanan/result_sdm', $data);
	}

	public function cek_sdm()
	{
		$username = $this->input->post('username');
		$tgl = $this->input->post('tgl');

		$cek = $username." ".$tgl;

		$proses = $_SESSION['proses_sdm'];

	  $cek = array_search($cek, array_column($proses, 'cek'));
		$cek = "$cek";
		$respone = strlen($cek);

		header('Content-Type:application/json;');
		echo json_encode($respone);

	}

	public function cek_sdm2()
	{
		$tes = $this->input->post('tes');

		$username = $this->input->post('username');
		$tgl = $this->input->post('tgl');

		$cek = $username." ".$tgl;


		$proses = $_SESSION['proses_sdm'];

	  $cek1 = array_search($cek, array_column($proses, 'cek'));
		$cek1 = "$cek1";

		if ($cek == $tes) {
			$respone = 0;
		}
		else {
			$respone = strlen($cek1);
		}

		header('Content-Type:application/json;');
		echo json_encode($respone);

	}

}
