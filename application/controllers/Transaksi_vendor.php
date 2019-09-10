<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_vendor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_vendor_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$this->load->helper('form');
		$data['judul'] = 'Peminjaman';
		$data['peminjaman'] = 'active';
		$data['transaksi_vendor'] = 'active';

		$data['peminjaman_view'] = $this->transaksi_vendor_model->get_peminjaman();

		unset($_SESSION['peminjaman']);
		unset($_SESSION['kd_peminjaman']);
		unset($_SESSION['vendor']);
		unset($_SESSION['tgl_pinjam']);
		unset($_SESSION['tgl_kembali']);
		unset($_SESSION['status']);

		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/vendor/peminjaman/peminjaman', $data);
		$this->load->view('modals/peminjaman');
		$this->load->view('modals/hapus');
		$this->load->view('modals/konfirmasi');
		$this->load->view('modals/batalkan');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-konfirmasi');
		$this->load->view('script/modal-batalkan');
		$this->load->view('script/modal-peminjaman');
		$this->load->view('script/datepicker');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
	}

	public function view($peminjaman = 'peminjaman')
	{

		if (!file_exists(APPPATH.'views/transaksi/vendor/peminjaman/'.$peminjaman.'.php')) {
			show_404();
		}
		$this->load->helper('form');
		$data['judul'] = 'Peminjaman';
		$data['peminjaman'] = 'active';
		$data['transaksi_vendor'] = 'active';

		$data['peminjaman_view'] = $this->transaksi_vendor_model->get_peminjaman();

		unset($_SESSION['peminjaman']);
		unset($_SESSION['kd_peminjaman']);
		unset($_SESSION['vendor']);
		unset($_SESSION['tgl_pinjam']);
		unset($_SESSION['tgl_kembali']);
		unset($_SESSION['status']);

		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/vendor/peminjaman/'.$peminjaman, $data);
		$this->load->view('modals/peminjaman');
		$this->load->view('modals/hapus');
		$this->load->view('modals/konfirmasi');
		$this->load->view('modals/batalkan');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-peminjaman');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-konfirmasi');
		$this->load->view('script/modal-batalkan');
		$this->load->view('script/datepicker');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function detail($kd_peminjaman)
	{
		$this->load->helper('form');
		$data['judul'] = 'Peminjaman';
		$data['peminjaman'] = 'active';
		$data['transaksi_vendor'] = 'active';

		$data['detail_peminjaman_view'] = $this->transaksi_vendor_model->get_detail($kd_peminjaman);


		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/vendor/peminjaman/detail', $data);
		$this->load->view('modals/hapus');
		$this->load->view('modals/konfirmasi');
		$this->load->view('modals/batalkan');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-peminjaman');
		$this->load->view('script/modal-hapus');
		$this->load->view('script/modal-konfirmasi');
		$this->load->view('script/modal-batalkan');
		$this->load->view('script/datepicker');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
  }

	public function tambah()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah';
		$data['peminjaman'] = 'active';
		$data['transaksi_vendor'] = 'active';

					unset($_SESSION['peminjaman']);
					unset($_SESSION['kd_peminjaman']);
					unset($_SESSION['vendor']);
					unset($_SESSION['tgl_pinjam']);
					unset($_SESSION['tgl_kembali']);
					unset($_SESSION['status']);

					unset($_POST['peminjaman']);
					unset($_POST['kd_peminjaman']);
					unset($_POST['vendor']);
					unset($_POST['tgl_pinjam']);
					unset($_POST['tgl_kembali']);
					unset($_POST['status']);

      $data['vendor_view'] = $this->transaksi_vendor_model->get_vendor();
			$this->load->view('templates/section1', $data);
			$this->load->view('transaksi/vendor/peminjaman/tambah', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
      $this->load->view('script/datepicker');
			$this->load->view('validasi/peminjaman/tambah_peminjaman');
			$this->load->view('templates/09_end');
	}

	public function tombol_selanjutnya()
	{
		//generate kd_peminjaman
		$kd_peminjaman = $this->transaksi_vendor_model->hitung_kode();
		if (isset( $kd_peminjaman[0]['kd_peminjaman']) == TRUE) {
			$kd_peminjaman = $kd_peminjaman[0]['kd_peminjaman']+1;
		}
		else {
			$kd_peminjaman = 1;
		}

		$vendor = $this->input->post('vendor');
		$tgl = $this->input->post('tgl');
		$tgl = explode(" ", $tgl);

		$tgl1 = $tgl['0'];
		$tgl1 = explode("/",$tgl1);
		$d1 = $tgl1['0'];
		$m1 = $tgl1['1'];
		$y1 = $tgl1['2'];
		$tanggal1 = array($y1, $m1, $d1);
		$tgl_pinjam = implode("-", $tanggal1);

		$tgl2 = $tgl['2'];
		$tgl2 = explode("/",$tgl2);
		$d2 = $tgl2['0'];
		$m2 = $tgl2['1'];
		$y2 = $tgl2['2'];
		$tanggal2 = array($y2, $m2, $d2);
		$tgl_kembali = implode("-", $tanggal2);

		$this->session->set_userdata('kd_peminjaman', $kd_peminjaman);
		$this->session->set_userdata('vendor', $vendor);
		$this->session->set_userdata('tgl_pinjam', $tgl_pinjam);
		$this->session->set_userdata('tgl_kembali', $tgl_kembali);

	}

	public function tambah_detail()
	{
		$this->load->helper('form');

		$data['judul'] = 'Tambah Detail';
		$data['peminjaman'] = 'active';
		$data['transaksi_vendor'] = 'active';

			$peminjaman = $this->session->userdata('peminjaman');
			$this->session->set_userdata('peminjaman', $peminjaman);

      $data['vendor_view'] = $this->transaksi_vendor_model->get_vendor();

			$this->load->view('templates/section1', $data);
			$this->load->view('transaksi/vendor/peminjaman/tambah_detail', $data);
			$this->load->view('templates/section2');
			$this->load->view('templates/08_javascript');
      $this->load->view('script/datepicker');
			$this->load->view('modals/loading');
			$this->load->view('validasi/peminjaman/form_detail');
			$this->load->view('validasi/peminjaman/tambah_detail');
			$this->load->view('templates/09_end');
	}

	public function kembali()
	{
		unset($_SESSION['peminjaman']);
		unset($_SESSION['kd_peminjaman']);
		unset($_SESSION['vendor']);
		unset($_SESSION['tgl_pinjam']);
		unset($_SESSION['tgl_kembali']);
	}

	public function tombol_simpan()
	{
		if (count($_SESSION['peminjaman']) == 0) {
			echo json_encode(array('status'=>FALSE));
		}
		else {
			$this->transaksi_vendor_model->tambah_peminjaman();
			$this->transaksi_vendor_model->tambah_detail_peminjaman();
			unset($_SESSION['peminjaman']);
			unset($_SESSION['kd_peminjaman']);
			unset($_SESSION['vendor']);
			unset($_SESSION['tgl_pinjam']);
			unset($_SESSION['tgl_kembali']);
			echo json_encode(array('status'=>TRUE));
		}
	}

	public function tombol_tambah()
	{
		if ($_POST['nama_alat'] != "" && $_POST['harga_sewa'] != "" && $_POST['jumlah'] != "") {

		$peminjaman = $this->session->userdata('peminjaman');
		$kd_peminjaman = $this->session->userdata('kd_peminjaman');
		$nama_alat = $this->input->post('nama_alat');
		$harga_sewa = $this->input->post('harga_sewa');
		$jumlah = $this->input->post('jumlah');

		$peminjaman[$nama_alat] = array(
									'kd_peminjaman' => $kd_peminjaman,
									'nama_alat' => $nama_alat,
									'harga_sewa' => $harga_sewa,
									'jumlah' => $jumlah
								);

		$this->session->set_userdata('peminjaman', $peminjaman);
		$this->load->view('transaksi/vendor/peminjaman/result_detail_peminjaman');
	}
	}

	public function ubah($kd_peminjaman)
	{
		$this->load->helper('form');
    $this->load->Library('form_validation');
		$data['judul'] = 'Ubah';
		$data['peminjaman'] = 'active';
		$data['transaksi_vendor'] = 'active';

		$data['peminjaman_item'] = $this->transaksi_vendor_model->get_peminjaman($kd_peminjaman);
    $data['vendor_view'] = $this->transaksi_vendor_model->get_vendor();

		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/vendor/peminjaman/ubah', $data);
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
    $this->load->view('script/datepicker');
		$this->load->view('validasi/peminjaman/ubah_peminjaman');
		$this->load->view('templates/09_end');
	}

	public function tombol_ubah($kd_peminjaman)
	{
		$this->transaksi_vendor_model->ubah_peminjaman($kd_peminjaman);
	}

	public function ubah_detail($kd_peminjaman)
	{
		$this->load->helper('form');
		$data['judul'] = 'Ubah Detail';
		$data['peminjaman'] = 'active';
		$data['transaksi_vendor'] = 'active';

		$datapeminjaman = $this->transaksi_vendor_model->get_peminjaman($kd_peminjaman);
		$this->session->set_userdata($datapeminjaman);
		$peminjaman = $this->transaksi_vendor_model->get_detail_peminjaman($kd_peminjaman);
		$nama_alat = $this->transaksi_vendor_model->get_nama_alat($kd_peminjaman);
		$nama ='';

		foreach ($nama_alat as $key => $value) {
			$nama = $nama.' '.$value['nama_alat'];
		}
		$nama = explode(' ', $nama);
		unset($nama[0]);
		$peminjaman = array_combine($nama, $peminjaman);

		$this->session->set_userdata('peminjaman', $peminjaman);

		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/vendor/peminjaman/ubah_detail', $data);
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
    $this->load->view('script/datepicker');
		$this->load->view('modals/loading');
		$this->load->view('validasi/peminjaman/form_detail');
		$this->load->view('validasi/peminjaman/ubah_detail');
		$this->load->view('templates/09_end');
	}

	public function tombol_ubah_detail($kd_peminjaman)
	{
		if (count($_SESSION['peminjaman']) == 0) {
			echo json_encode(array('status' => FALSE));
		}
		else {
		$this->transaksi_vendor_model->hapus_detail_peminjaman($kd_peminjaman);
		$this->transaksi_vendor_model->tambah_detail_peminjaman();

		unset($_SESSION['peminjaman']);
		unset($_SESSION['kd_peminjaman']);
		unset($_SESSION['vendor']);
		unset($_SESSION['tgl_pinjam']);
		unset($_SESSION['tgl_kembali']);
		unset($_SESSION['status']);

		echo json_encode(array('status' => TRUE));
		}
	}

	public function hapus($kd_peminjaman)
	{
			$this->transaksi_vendor_model->hapus_peminjaman($kd_peminjaman);
			$this->transaksi_vendor_model->hapus_detail_peminjaman($kd_peminjaman);
			$data['peminjaman_view'] = $this->transaksi_vendor_model->get_peminjaman();
			$this->load->view('transaksi/vendor/peminjaman/result', $data);
	}

	public function hapus_detail()
	{
		$hapus = $this->input->post('hapus');
		$peminjaman = $this->session->userdata('peminjaman');
		unset($peminjaman[$hapus]);
		$this->session->set_userdata('peminjaman', $peminjaman);
		$this->load->view('transaksi/vendor/peminjaman/result_detail_peminjaman');
	}

	public function edit_detail()
	{
		$edit = $this->input->post('edit');
		$peminjaman = $this->session->userdata('peminjaman');

		$nama_alat = $edit;
		$harga_sewa = $peminjaman[$edit]['harga_sewa'];
		$jumlah = $peminjaman[$edit]['jumlah'];

		echo json_encode(array('nama_alat' => $nama_alat, 'harga_sewa' => $harga_sewa,	'jumlah' => $jumlah, 'edit' => $edit));
	}

	public function tombol_edit()
	{
		if ($_POST['nama_alat'] != "" && $_POST['harga_sewa'] != "" && $_POST['jumlah'] != "") {
			$edit = $this->input->post('edit');
			$peminjaman = $this->session->userdata('peminjaman');

			unset($peminjaman[$edit]);

			$nama_alat = $this->input->post('nama_alat');
			$harga_sewa = $this->input->post('harga_sewa');
			$jumlah = $this->input->post('jumlah');
			$kd_peminjaman = $this->session->userdata('kd_peminjaman');


			$peminjaman[$nama_alat] = array(
										'kd_peminjaman' => $kd_peminjaman,
										'nama_alat' => $nama_alat,
										'harga_sewa' => $harga_sewa,
										'jumlah' => $jumlah
									);

			$this->session->set_userdata('peminjaman', $peminjaman);
			$this->load->view('transaksi/vendor/peminjaman/result_detail_peminjaman');
		}
	}

	public function hapus_ubah_detail($key)
	{
		$peminjaman = $this->session->userdata('peminjaman');
		unset($peminjaman[$key]);
		$this->session->set_userdata('peminjaman', $peminjaman);
		redirect('peminjaman/ubah_detail');
	}

	public function konfirmasi($kd_peminjaman){
		$this->transaksi_vendor_model->konfirmasi_vendor($kd_peminjaman);
		$data['peminjaman_view'] = $this->transaksi_vendor_model->get_peminjaman();
		$this->load->view('transaksi/vendor/peminjaman/result', $data);
	}

	public function pengembalian()
	{
		$this->load->helper('form');
		$data['judul'] = 'Pengembalian';
		$data['pengembalian_vendor'] = 'active';
		$data['transaksi_vendor'] = 'active';

		$data['pengembalian_view'] = $this->transaksi_vendor_model->get_pengembalian();


		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/vendor/pengembalian/pengembalian', $data);
		$this->load->view('modals/pengembalian_vendor');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-pengembalian_vendor');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
	}

	public function pembatalan($kd_peminjaman)
	{
			$this->transaksi_vendor_model->pembatalan($kd_peminjaman);
			$data['peminjaman_view'] = $this->transaksi_vendor_model->get_peminjaman();
			$this->load->view('transaksi/vendor/peminjaman/result', $data);
	}

	public function peralatan_sewa()
	{
		$this->load->helper('form');
		$data['judul'] = 'Peralatan Sewa';
		$data['peralatan_sewa'] = 'active';
		$data['transaksi_vendor'] = 'active';

		$data['peralatan_sewa_view'] = $this->transaksi_vendor_model->get_peralatan_sewa();


		$this->load->view('templates/section1', $data);
		$this->load->view('transaksi/vendor/peralatan_sewa', $data);
		$this->load->view('modals/peralatan_sewa');
		$this->load->view('templates/section2');
		$this->load->view('templates/08_javascript');
		$this->load->view('script/datatable');
		$this->load->view('script/modal-peralatan_sewa');
		$this->load->view('script/notif');
		$this->load->view('templates/09_end');
	}
}
