<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rab extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rab_model');
		$this->load->helper('url_helper');
	}

	public function index($kd_pemesanan)
	{
    $data1['judul'] = 'Rencana Anggaran Biaya';

		$data['pemesanan_view'] = $this->rab_model->get_pemesanan($kd_pemesanan);
		$data['detail_pemesanan_view'] = $this->rab_model->get_detail_pemesanan($kd_pemesanan);
		$data['sdm_event_view'] = $this->rab_model->get_sdm_event($kd_pemesanan);
		$data['alat_sewa_event_view'] = $this->rab_model->get_alat_sewa_event($kd_pemesanan);
		$data['pengeluaran_event_view'] = $this->rab_model->get_pengeluaran_event($kd_pemesanan);
		$data['peralatan_event_view'] = $this->rab_model->get_peralatan_event($kd_pemesanan);
		$data['pegawai_view'] = $this->rab_model->get_pegawai();
		$data['sdm_view'] = $this->rab_model->get_sdm($kd_pemesanan);
		$fee = $this->rab_model->get_fee_penjualan($kd_pemesanan);
		$data['fee'] = $fee['keterangan'];

		$area = $this->rab_model->get_area($kd_pemesanan);
		$kd_area = $area['kd_area'];

		$data['pekerjaan'] = $this->rab_model->get_pekerjaan($kd_area);

		$gaji = $this->rab_model->get_total_gaji($kd_pemesanan);
		$konsumsi = $this->rab_model->get_total_konsumsi($kd_pemesanan);
		$transportasi = $this->rab_model->get_total_trasportasi($kd_pemesanan);
		$sewa_alat = $this->rab_model->get_total_sewa_alat($kd_pemesanan);
		$akomodasi = $this->rab_model->get_total_akomodasi($kd_pemesanan);
		$komunikasi = $this->rab_model->get_total_komunikasi($kd_pemesanan);
		$cetak = $this->rab_model->get_total_cetak($kd_pemesanan);
		$habis_pakai = $this->rab_model->get_total_habis_pakai($kd_pemesanan);
		$marketing = $this->rab_model->get_total_marketing($kd_pemesanan);
		$fee_penjualan = $this->rab_model->get_total_fee_penjualan($kd_pemesanan);
		$lain = $this->rab_model->get_total_lain($kd_pemesanan);

		if (count($gaji) > 0) {
			$data['pengeluaran_gaji'] = $gaji['total'];
		}
		else {
			$data['pengeluaran_gaji'] = 0;
		}

		if (count($konsumsi) > 0) {
			$data['pengeluaran_konsumsi'] = $konsumsi['total'];
		}
		else {
			$data['pengeluaran_konsumsi'] = 0;
		}

		if (count($transportasi) > 0) {
			$data['pengeluaran_transportasi'] = $transportasi['total'];
		}
		else {
			$data['pengeluaran_transportasi'] = 0;
		}

		if (count($sewa_alat) > 0) {
			$data['pengeluaran_sewa_alat'] = $sewa_alat['total'];
		}
		else {
			$data['pengeluaran_sewa_alat'] = 0;
		}

		if (count($akomodasi) > 0) {
			$data['pengeluaran_akomodasi'] = $akomodasi['total'];
		}
		else {
			$data['pengeluaran_akomodasi'] = 0;
		}

		if (count($komunikasi) > 0) {
			$data['pengeluaran_komunikasi'] = $komunikasi['total'];
		}
		else {
			$data['pengeluaran_komunikasi'] = 0;
		}

		if (count($cetak) > 0) {
			$data['pengeluaran_cetak'] = $cetak['total'];
		}
		else {
			$data['pengeluaran_cetak'] = 0;
		}

		if (count($habis_pakai) > 0) {
			$data['pengeluaran_habis_pakai'] = $habis_pakai['total'];
		}
		else {
			$data['pengeluaran_habis_pakai'] = 0;
		}

		if (count($marketing) > 0) {
			$data['pengeluaran_marketing'] = $marketing['total'];
		}
		else {
			$data['pengeluaran_marketing'] = 0;
		}

		if (count($fee_penjualan) > 0) {
			$data['pengeluaran_fee_penjualan'] = $fee_penjualan['total'];
		}
		else {
			$data['pengeluaran_fee_penjualan'] = 0;
		}

		if (count($lain) > 0) {
			$data['pengeluaran_lain'] = $lain['total'];
		}
		else {
			$data['pengeluaran_lain'] = 0;
		}

		$this->session->set_userdata('kd_pemesanan', $kd_pemesanan);

		$this->load->view('templates/section1', $data1);
		$this->load->view('rab/rab',$data);
    $this->load->view('templates/section2');
    $this->load->view('templates/08_javascript');
    $this->load->view('script/mask-as-number');
    $this->load->view('validasi/rab/rab');
    $this->load->view('templates/09_end');
	}

	public function rab2($kd_pemesanan)
	{
    $data1['judul'] = 'Laporan Penjualan';
		$data['pemesanan_view'] = $this->rab_model->get_pemesanan2($kd_pemesanan);
		$data['detail_pemesanan_view'] = $this->rab_model->get_detail_pemesanan($kd_pemesanan);
		$data['alat_sewa_event_view'] = $this->rab_model->get_alat_sewa_event($kd_pemesanan);
		$data['pegawai_view'] = $this->rab_model->get_pegawai();
		$fee = $this->rab_model->get_fee_penjualan($kd_pemesanan);
		$data['fee'] = $fee['keterangan'];

		$sewa_alat = $this->rab_model->get_total_sewa_alat($kd_pemesanan);
		$fee_penjualan = $this->rab_model->get_total_fee_penjualan($kd_pemesanan);

		if (count($sewa_alat) > 0) {
			$data['pengeluaran_sewa_alat'] = $sewa_alat['total'];
		}
		else {
			$data['pengeluaran_sewa_alat'] = 0;
		}

		if (count($fee_penjualan) > 0) {
			$data['pengeluaran_fee_penjualan'] = $fee_penjualan['total'];
		}
		else {
			$data['pengeluaran_fee_penjualan'] = 0;
		}

		$this->session->set_userdata('kd_pemesanan', $kd_pemesanan);

		$this->load->view('templates/section1', $data1);
		$this->load->view('rab/rab2',$data);
    $this->load->view('templates/section2');
    $this->load->view('templates/08_javascript');
		$this->load->view('script/mask-as-number');
    $this->load->view('validasi/rab/rab2');
    $this->load->view('templates/09_end');
	}

  public function print_rab($kd_pemesanan){
		$this->session->set_userdata('kd_pemesanan', $kd_pemesanan);

		$data['pemesanan_view'] = $this->rab_model->get_pemesanan($kd_pemesanan);
		$data['detail_pemesanan_view'] = $this->rab_model->get_detail_pemesanan($kd_pemesanan);
		$data['sdm_event_view'] = $this->rab_model->get_sdm_event($kd_pemesanan);
		$data['alat_sewa_event_view'] = $this->rab_model->get_alat_sewa_event($kd_pemesanan);
		$data['pengeluaran_event_view'] = $this->rab_model->get_pengeluaran_event($kd_pemesanan);
		$data['peralatan_event_view'] = $this->rab_model->get_peralatan_event($kd_pemesanan);
		$data['pegawai_view'] = $this->rab_model->get_pegawai();
		$fee = $this->rab_model->get_fee_penjualan($kd_pemesanan);
		$data['fee'] = $fee['keterangan'];

		$area = $this->rab_model->get_area($kd_pemesanan);
		$kd_area = $area['kd_area'];

		$data['pekerjaan'] = $this->rab_model->get_pekerjaan($kd_area);

		$gaji = $this->rab_model->get_total_gaji($kd_pemesanan);
		$konsumsi = $this->rab_model->get_total_konsumsi($kd_pemesanan);
		$transportasi = $this->rab_model->get_total_trasportasi($kd_pemesanan);
		$sewa_alat = $this->rab_model->get_total_sewa_alat($kd_pemesanan);
		$akomodasi = $this->rab_model->get_total_akomodasi($kd_pemesanan);
		$komunikasi = $this->rab_model->get_total_komunikasi($kd_pemesanan);
		$cetak = $this->rab_model->get_total_cetak($kd_pemesanan);
		$habis_pakai = $this->rab_model->get_total_habis_pakai($kd_pemesanan);
		$marketing = $this->rab_model->get_total_marketing($kd_pemesanan);
		$fee_penjualan = $this->rab_model->get_total_fee_penjualan($kd_pemesanan);
		$lain = $this->rab_model->get_total_lain($kd_pemesanan);

		if (count($gaji) > 0) {
			$data['pengeluaran_gaji'] = $gaji['total'];
		}
		else {
			$data['pengeluaran_gaji'] = 0;
		}

		if (count($konsumsi) > 0) {
			$data['pengeluaran_konsumsi'] = $konsumsi['total'];
		}
		else {
			$data['pengeluaran_konsumsi'] = 0;
		}

		if (count($transportasi) > 0) {
			$data['pengeluaran_transportasi'] = $transportasi['total'];
		}
		else {
			$data['pengeluaran_transportasi'] = 0;
		}

		if (count($sewa_alat) > 0) {
			$data['pengeluaran_sewa_alat'] = $sewa_alat['total'];
		}
		else {
			$data['pengeluaran_sewa_alat'] = 0;
		}

		if (count($akomodasi) > 0) {
			$data['pengeluaran_akomodasi'] = $akomodasi['total'];
		}
		else {
			$data['pengeluaran_akomodasi'] = 0;
		}

		if (count($komunikasi) > 0) {
			$data['pengeluaran_komunikasi'] = $komunikasi['total'];
		}
		else {
			$data['pengeluaran_komunikasi'] = 0;
		}

		if (count($cetak) > 0) {
			$data['pengeluaran_cetak'] = $cetak['total'];
		}
		else {
			$data['pengeluaran_cetak'] = 0;
		}

		if (count($habis_pakai) > 0) {
			$data['pengeluaran_habis_pakai'] = $habis_pakai['total'];
		}
		else {
			$data['pengeluaran_habis_pakai'] = 0;
		}

		if (count($marketing) > 0) {
			$data['pengeluaran_marketing'] = $marketing['total'];
		}
		else {
			$data['pengeluaran_marketing'] = 0;
		}

		if (count($fee_penjualan) > 0) {
			$data['pengeluaran_fee_penjualan'] = $fee_penjualan['total'];
		}
		else {
			$data['pengeluaran_fee_penjualan'] = 0;
		}

		if (count($lain) > 0) {
			$data['pengeluaran_lain'] = $lain['total'];
		}
		else {
			$data['pengeluaran_lain'] = 0;
		}

    $this->load->view('rab/print', $data);
  }

	public function print_rab2($kd_pemesanan)
	{
		$data1['judul'] = 'Laporan Penjualan';
		$data['pemesanan_view'] = $this->rab_model->get_pemesanan2($kd_pemesanan);
		$data['detail_pemesanan_view'] = $this->rab_model->get_detail_pemesanan($kd_pemesanan);
		$data['alat_sewa_event_view'] = $this->rab_model->get_alat_sewa_event($kd_pemesanan);
		$data['pegawai_view'] = $this->rab_model->get_pegawai();
		$fee = $this->rab_model->get_fee_penjualan($kd_pemesanan);
		$data['fee'] = $fee['keterangan'];

		$sewa_alat = $this->rab_model->get_total_sewa_alat($kd_pemesanan);
		$fee_penjualan = $this->rab_model->get_total_fee_penjualan($kd_pemesanan);

		if (count($sewa_alat) > 0) {
			$data['pengeluaran_sewa_alat'] = $sewa_alat['total'];
		}
		else {
			$data['pengeluaran_sewa_alat'] = 0;
		}

		if (count($fee_penjualan) > 0) {
			$data['pengeluaran_fee_penjualan'] = $fee_penjualan['total'];
		}
		else {
			$data['pengeluaran_fee_penjualan'] = 0;
		}

		$this->session->set_userdata('kd_pemesanan', $kd_pemesanan);

		$this->load->view('rab/print2', $data);
	}

	public function pekerjaan_saya($kd_pemesanan)
	{
    $data1['judul'] = 'Pekerjaan Saya';

		$data['pemesanan_view'] = $this->rab_model->get_pemesanan($kd_pemesanan);

		$data['sdm_event_view'] = $this->rab_model->get_pekerjaan_saya($kd_pemesanan);


		$area = $this->rab_model->get_area($kd_pemesanan);
		$kd_area = $area['kd_area'];

		$data['pekerjaan'] = $this->rab_model->get_pekerjaan($kd_area);

		$this->load->view('templates/section1', $data1);
		$this->load->view('rab/pekerjaan_saya',$data);
    $this->load->view('templates/section2');
    $this->load->view('templates/08_javascript');
    $this->load->view('templates/09_end');
	}

	public function diskon($kd_pemesanan)
	{
		$jumlah = $this->input->post('diskon');
		$total_harga_jual = $this->rab_model->get_harga_jual($kd_pemesanan);
		$pengeluaran_total = $this->rab_model->get_pengeluaran($kd_pemesanan);
		$pengeluaran_fee_penjualan = $this->rab_model->get_total_fee_penjualan($kd_pemesanan);

		$harga_jual = $total_harga_jual['total'];
		$pengeuaran = $pengeluaran_total['total'];
		$fee_penjualan = $pengeluaran_fee_penjualan['total'];

		if ($harga_jual == "") {
			$harga_jual = 0;
		}
		if ($pengeuaran == "") {
			$pengeuaran = 0;
		}
		if ($fee_penjualan == "") {
			$fee_penjualan = 0;
		}

		$this->rab_model->tambah_diskon($kd_pemesanan, $jumlah);

		$jum = $this->rab_model->get_diskon($kd_pemesanan);

		$total_harga_jual2 = $harga_jual-$jum['diskon'];
		$laba_kotor = $total_harga_jual2-$pengeuaran;
		$laba_bersih = $laba_kotor-$fee_penjualan;

		$j = number_format($jum['diskon'], 0, ',' , '.' );
		$a = number_format($total_harga_jual2, 0, ',' , '.' );
		$b = number_format($laba_kotor, 0, ',' , '.' );
		$c = number_format($laba_bersih, 0, ',' , '.' );

		header('Content-Type:application/json;');
		echo json_encode(array('diskon'=>$j, 'total_harga_jual' => $a, 'laba_kotor' => $b, 'laba_bersih' => $c));
	}

	public function jumlah_rab($kd_pemesanan)
	{
		$jumlah = $this->input->post('jumlah_rab');

		$this->rab_model->tambah_jumlah_rab($kd_pemesanan, $jumlah);

		$jum = $this->rab_model->get_jumlah_rab($kd_pemesanan);

		$j = number_format($jum['jumlah_rab'], 0, ',' , '.' );

		header('Content-Type:application/json;');
		echo json_encode(array('jumlah_rab'=>$j));
	}

	public function pemegang_rab($kd_pemesanan)
	{
		$rab = $this->input->post('pemegang_rab');

		$this->rab_model->tambah_pemegang_rab($kd_pemesanan, $rab);

		$peg = $this->rab_model->get_pegawai_rab($rab);

		$p = $this->rab_model->get_area($kd_pemesanan);
		$kd_area = $p['kd_area'];

		$g = $this->rab_model->get_gaji_rab($kd_area);

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

		$this->rab_model->hapus_gaji_rab($kd_pemesanan);
		$this->rab_model->tambah_gaji_rab($gaji_rab);

		$pr = $this->rab_model->get_pemesanan($kd_pemesanan);

		$r = $pr['pemegang_rab'];

		header('Content-Type:application/json;');
		echo json_encode(array('pemegang_rab'=>$r));
	}

	function pekerjaan($gaji, $magang)
	{
		$m = $gaji*$magang/100;

		$ribuan = substr($m, -3);
		if ($ribuan != "000") {
			$gaji_magang = $m + (1000-$ribuan);
		}
		else {
			$gaji_magang = $m;
		}

		return $gaji_magang;
	}

	public function persen_fee($kd_pemesanan)
	{
		$persen_fee = $this->input->post('persen_fee');

		$diskon = $this->rab_model->get_diskon($kd_pemesanan);
		$total_harga_jual = $this->rab_model->get_harga_jual($kd_pemesanan);
		$pengeluaran_total = $this->rab_model->get_pengeluaran($kd_pemesanan);

		$fee_penjualan = $total_harga_jual['total']*($persen_fee/100);

		$this->rab_model->hapus_pengeluaran_fee_penjualan($kd_pemesanan);
		$this->rab_model->tambah_persen_fee($kd_pemesanan, $persen_fee, $fee_penjualan);

		$pengeluaran_fee_penjualan = $this->rab_model->get_total_fee_penjualan($kd_pemesanan);

		$laba_bersih = $total_harga_jual['total']-$diskon['diskon']-$pengeluaran_total['total']-$pengeluaran_fee_penjualan['total'];

		$pfp = number_format($pengeluaran_fee_penjualan['total'], 0, ',' , '.' );
		$lb = number_format($laba_bersih, 0, ',' , '.' );

		header('Content-Type:application/json;');
		echo json_encode(array('harga'=>$pfp, 'laba_bersih' => $lb));
	}

	public function nama_fee($kd_pemesanan)
	{
		$nama_fee = $this->input->post('nama_fee');

		$this->rab_model->tambah_nama_fee($kd_pemesanan, $nama_fee);

		$pr = $this->rab_model->get_pemesanan($kd_pemesanan);

		$r = $pr['fee_penjualan'];

		header('Content-Type:application/json;');
		echo json_encode(array('nama_fee'=>$r));
	}

}
