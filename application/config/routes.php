<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['test'] = 'test';

$route['pekerjaan_saya/(:any)'] = 'rab/pekerjaan_saya/$1';
$route['rab2/print/(:any)'] = 'rab/print_rab2/$1';
$route['rab/print/(:any)'] = 'rab/print_rab/$1';
$route['rab2/(:any)'] = 'rab/rab2/$1';
$route['rab/(:any)'] = 'rab/index/$1';

$route['ketersediaan/cek'] = 'ketersediaan/cek';
$route['ketersediaan'] = 'ketersediaan';

$route['simpan/(:any)'] = 'transaksi_klien/tombol_ubah_detail/$1';

$route['proses_pemesanan/pilih_peralatan/(:any)'] ='proses_pemesanan/pilih_peralatan/$1';
$route['proses_pemesanan/pilih_sdm/(:any)'] ='proses_pemesanan/pilih_sdm/$1';
$route['proses_pemesanan/pilih_pengeluaran/(:any)'] ='proses_pemesanan/pilih_pengeluaran/$1';
$route['proses_pemesanan/hapus_peralatan/(:any)'] ='proses_pemesanan/hapus_peralatan/$1';
$route['proses_pemesanan/hapus_sdm/(:any)'] ='proses_pemesanan/hapus_sdm/$1';
$route['proses_pemesanan/hapus_pengeluaran/(:any)'] ='proses_pemesanan/hapus_pengeluaran/$1';
$route['proses_pemesanan/hapus_ubah_peralatan/(:any)'] ='proses_pemesanan/hapus_ubah_peralatan/$1';
$route['proses_pemesanan/hapus_ubah_sdm/(:any)'] ='proses_pemesanan/hapus_ubah_sdm/$1';
$route['proses_pemesanan/hapus_ubah_pengeluaran/(:any)'] ='proses_pemesanan/hapus_ubah_pengeluaran/$1';

$route['pemesanan2/tambah'] = 'transaksi_klien2/tambah2';
$route['pemesanan2/tambah_detail'] = 'transaksi_klien2/tambah_detail2';
$route['pemesanan2/ubah/(:any)'] ='transaksi_klien2/ubah2/$1';
$route['pemesanan2/ubah_detail/(:any)'] ='transaksi_klien2/ubah_detail2/$1';
$route['pemesanan2/hapus/(:any)'] ='transaksi_klien2/hapus2/$1';
$route['pemesanan2/hapus_detail/(:any)'] ='transaksi_klien2/hapus_detail2/$1';
$route['pemesanan2/hapus_ubah_detail/(:any)'] ='transaksi_klien2/hapus_ubah_detail2/$1';

$route['pemesanan/pembatalan/(:any)'] ='transaksi_klien/pembatalan/$1';
$route['pengembalian/klien'] ='transaksi_klien/pengembalian';
$route['pemesanan/pengembalian/klien/(:any)'] ='transaksi_klien/konfirmasi_klien/$1';
$route['pemesanan/tambah'] = 'transaksi_klien/tambah';
$route['pemesanan/tambah_detail'] = 'transaksi_klien/tambah_detail';
$route['pemesanan/ubah/(:any)'] ='transaksi_klien/ubah/$1';
$route['pemesanan/ubah_detail/(:any)'] ='transaksi_klien/ubah_detail/$1';
$route['pemesanan/hapus/(:any)'] ='transaksi_klien/hapus/$1';
$route['pemesanan/hapus_detail/(:any)'] ='transaksi_klien/hapus_detail/$1';
$route['pemesanan/hapus_ubah_detail/(:any)'] ='transaksi_klien/hapus_ubah_detail/$1';
$route['pemesanan'] = 'transaksi_klien';
$route['pemesanan/(:any)'] = 'transaksi_klien/view/$1';

// $route['peralatan/sewa'] ='transaksi_vendor/peralatan_sewa';
// $route['peminjaman/pembatalan/(:any)'] ='transaksi_vendor/pembatalan/$1';
// $route['pengembalian/vendor'] ='transaksi_vendor/pengembalian';
// $route['peminjaman/pengembalian/vendor/(:any)'] ='transaksi_vendor/konfirmasi_vendor/$1';
// $route['peminjaman/detail/(:any)'] = 'transaksi_vendor/detail/$1';
// $route['peminjaman/tambah'] = 'transaksi_vendor/tambah';
// $route['peminjaman/tambah_detail'] = 'transaksi_vendor/tambah_detail';
// $route['peminjaman/ubah/(:any)'] ='transaksi_vendor/ubah/$1';
// $route['peminjaman/ubah_detail/(:any)'] ='transaksi_vendor/ubah_detail/$1';
// $route['peminjaman/hapus/(:any)'] ='transaksi_vendor/hapus/$1';
// $route['peminjaman/hapus_detail/(:any)'] ='transaksi_vendor/hapus_detail/$1';
// $route['peminjaman/hapus_ubah_detail/(:any)'] ='transaksi_vendor/hapus_ubah_detail/$1';
// $route['peminjaman'] = 'transaksi_vendor';
// $route['peminjaman/(:any)'] = 'transaksi_vendor/view/$1';

$route['pegawai/tambah'] = 'pegawai/tambah';
$route['pegawai/ubah/(:any)'] ='pegawai/ubah/$1';
$route['pegawai/hapus/(:any)'] ='pegawai/hapus/$1';
$route['pegawai'] = 'pegawai';
$route['pegawai/(:any)'] = 'pegawai/view/$1';

$route['gaji/tambah'] = 'gaji/tambah';
$route['gaji/ubah/(:any)'] ='gaji/ubah/$1';
$route['gaji/hapus/(:any)'] ='gaji/hapus/$1';
$route['gaji'] = 'gaji';
$route['gaji/(:any)'] = 'gaji/view/$1';

$route['peralatan/tambah'] = 'peralatan/tambah';
$route['peralatan/ubah/(:any)'] ='peralatan/ubah/$1';
$route['peralatan/hapus/(:any)'] ='peralatan/hapus/$1';
$route['peralatan'] = 'peralatan';
$route['peralatan/(:any)'] = 'peralatan/view/$1';

$route['tipe/tambah'] = 'tipe/tambah';
$route['tipe/ubah/(:any)'] ='tipe/ubah/$1';
$route['tipe/hapus/(:any)'] ='tipe/hapus/$1';
$route['tipe'] = 'tipe';
$route['tipe/(:any)'] = 'tipe/view/$1';

$route['kota/tambah'] = 'kota/tambah';
$route['kota/ubah/(:any)'] ='kota/ubah/$1';
$route['kota/hapus/(:any)'] ='kota/hapus/$1';
$route['kota'] = 'kota';
$route['kota/(:any)'] = 'kota/view/$1';

$route['area/tambah'] = 'area/tambah';
$route['area/ubah/(:any)'] ='area/ubah/$1';
$route['area/hapus/(:any)'] ='area/hapus/$1';
$route['area'] = 'area';
$route['area/(:any)'] = 'area/view/$1';

$route['pekerjaan/tambah'] = 'pekerjaan/tambah';
$route['pekerjaan/ubah/(:any)'] ='pekerjaan/ubah/$1';
$route['pekerjaan/hapus/(:any)'] ='pekerjaan/hapus/$1';
$route['pekerjaan'] = 'pekerjaan';
$route['pekerjaan/(:any)'] = 'pekerjaan/view/$1';

$route['merk/tambah'] = 'merk/tambah';
$route['merk/ubah/(:any)'] ='merk/ubah/$1';
$route['merk/hapus/(:any)'] ='merk/hapus/$1';
$route['merk'] = 'merk';
$route['merk/(:any)'] = 'merk/view/$1';

$route['jenis_pengeluaran/tambah'] = 'jenis_pengeluaran/tambah';
$route['jenis_pengeluaran/ubah/(:any)'] ='jenis_pengeluaran/ubah/$1';
$route['jenis_pengeluaran/hapus/(:any)'] ='jenis_pengeluaran/hapus/$1';
$route['jenis_pengeluaran'] = 'jenis_pengeluaran';
$route['jenis_pengeluaran/(:any)'] = 'jenis_pengeluaran/view/$1';

$route['jenis_pesanan/tambah'] = 'jenis_pesanan/tambah';
$route['jenis_pesanan/ubah/(:any)'] ='jenis_pesanan/ubah/$1';
$route['jenis_pesanan/hapus/(:any)'] ='jenis_pesanan/hapus/$1';
$route['jenis_pesanan'] = 'jenis_pesanan';
$route['jenis_pesanan/(:any)'] = 'jenis_pesanan/view/$1';

$route['jabatan/tambah'] = 'jabatan/tambah';
$route['jabatan/ubah/(:any)'] ='jabatan/ubah/$1';
$route['jabatan/hapus/(:any)'] ='jabatan/hapus/$1';
$route['jabatan'] = 'jabatan';
$route['jabatan/(:any)'] = 'jabatan/view/$1';

$route['kategori/tambah'] = 'kategori/tambah';
$route['kategori/ubah/(:any)'] ='kategori/ubah/$1';
$route['kategori/hapus/(:any)'] ='kategori/hapus/$1';
$route['kategori'] = 'kategori';
$route['kategori/(:any)'] = 'kategori/view/$1';

$route['vendor/tambah'] = 'vendor/tambah';
$route['vendor/ubah/(:any)'] ='vendor/ubah/$1';
$route['vendor/hapus/(:any)'] ='vendor/hapus/$1';
$route['vendor'] = 'vendor';
$route['vendor/(:any)'] = 'vendor/view/$1';

$route['klien/tambah'] = 'klien/tambah';
$route['klien/ubah/(:any)'] ='klien/ubah/$1';
$route['klien/hapus/(:any)'] ='klien/hapus/$1';
$route['klien'] = 'klien';
$route['klien/(:any)'] = 'klien/view/$1';

$route['password_baru'] = 'login/password_baru';
$route['email'] = 'test';
$route['login'] = 'login';
$route['load'] = 'dashboard/load';

$route['default_controller'] = 'login';
$route['(:any)'] = 'dashboard/view/$1';

$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = '';
