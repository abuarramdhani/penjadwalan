<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pemesanan
      <small>Data Master</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Pemesanan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->

  <!-- /.content -->
  <!-- button -->
  <div class="col-md-12">

      <div class="btn-group" style="margin-bottom: 15px;">
        <button type="button" class="btn-block btn-primary btn-lg fa fa-plus" data-toggle="dropdown" style="border: none;"><b>Tambah Data</b>
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?php echo site_url('pemesanan/tambah'); ?>"> Alat & Jasa</a></li>
          <li><a href="<?php echo site_url('pemesanan2/tambah'); ?>"> Alat</a></li>
        </ul>
      </div>
    </div>


  <!-- /.col -->
  <div class="col-md-12">

        <div class="row">
          <div class="col-xs-12">


              <!-- /.box-header -->
              <div class="box">
              <div class="box-body table-responsive no-padding">
                  <div class="box-header">
                    <h3 class="box-title">Data Pemesanan</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body result">
                    <table id="tabel" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th class="col-md-1">Kode</th>
                        <th>Nama Event</th>
                        <th>Tipe Pesanan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th class="col-md-1">Status</th>
                        <?php if ($_SESSION['akses'] == "superadmin"): ?>
                          <th class="text-center">Proses</th>
                        <?php endif; ?>
                        <th class="text-center">Action</th>
                        <th class="text-center">Pemesanan</th>
                      </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($pemesanan_view as $pemesanan_item) { ?>
                        <tr>
                        <td><?php echo $pemesanan_item['kd_pemesanan']; ?></td>
                        <?php
                        //ubah format tanggal
                        $tgl1 = $pemesanan_item['tgl_mulai'];
                        $tgl1 = explode("-",$tgl1);
                        $d1 = $tgl1['0'];
                        $m1 = $tgl1['1'];
                        $y1 = $tgl1['2'];
                        $tanggal1 = array($y1, $m1, $d1);
                        $tgl_mulai = implode("-", $tanggal1);
                        //ubah format tanggal
                        $tgl2 = $pemesanan_item['tgl_selesai'];
                        $tgl2 = explode("-",$tgl2);
                        $d2 = $tgl2['0'];
                        $m2 = $tgl2['1'];
                        $y2 = $tgl2['2'];
                        $tanggal2 = array($y2, $m2, $d2);
                        $tgl_selesai = implode("-", $tanggal2);

                        if ($pemesanan_item['tipe_pesanan'] == 'Alat') {
                          $warna = 'primary';
                        }
                        else {
                          $warna = 'danger';
                        }
                        ?>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#modal-pemesanan"
                          data-1="<?php echo $pemesanan_item['kd_pemesanan']; ?>"
                          data-2="<?php echo $pemesanan_item['tipe_pesanan']; ?>"
                          data-3="<?php echo $tgl_mulai; ?>"
                          data-4="<?php echo $tgl_selesai; ?>"
                          data-5="<?php echo $pemesanan_item['klien']; ?>"
                          data-6="<?php echo $pemesanan_item['status']; ?>"
                          data-7="<?php echo $pemesanan_item['tambah']; ?>"
                          data-8="<?php echo $pemesanan_item['waktu_tambah']; ?>"
                          data-9="<?php echo $pemesanan_item['ubah']; ?>"
                          data-10="<?php echo $pemesanan_item['waktu_ubah']; ?>"
                          >
                          <?php
                          if ($pemesanan_item['tipe_pesanan'] == "Alat") {
                            echo $pemesanan_item['klien'];
                          }
                          else {
                            echo $pemesanan_item['nama_event'];
                          }
                          ?>
                          </a>
                        </td>
                        <td><span class="label label-<?php echo $warna; ?>"><?php echo $pemesanan_item['tipe_pesanan']; ?></span></td>
                        <td><?php echo $tgl_mulai; ?></td>
                        <td><?php echo $tgl_selesai; ?></td>
                        <td><?php echo $pemesanan_item['status']; ?></td>
                        <?php if ($_SESSION['akses'] == "superadmin"): ?>
                          <td class="text-center">
                            <div class="btn-group-vertical">
                              <a class="btn btn-sm btn-flat btn-info <?php if($pemesanan_item['status'] == 'selesai' || $pemesanan_item['status'] == 'dibatalkan'){echo 'disabled';} ?>" href="<?php echo site_url('proses_pemesanan/pilih_peralatan/'.$pemesanan_item['kd_pemesanan'].'?back=pemesanan&pemesanan='.$pemesanan_item['tipe_pesanan']); ?>"><i class='fa fa-camera'></i> Peralatan Event</a>
                              <?php if ($pemesanan_item['tipe_pesanan'] == "Alat & Jasa"): ?>
                                <a class="btn btn-sm btn-flat btn-info <?php if($pemesanan_item['status'] == 'selesai' || $pemesanan_item['status'] == 'dibatalkan'){echo 'disabled';} ?>" href="<?php echo site_url('proses_pemesanan/pilih_sdm/'.$pemesanan_item['kd_pemesanan'].'?back=pemesanan'); ?>"><i class="fa fa-user"></i> SDM Event</a>
                                <a class="btn btn-sm btn-flat btn-info <?php if($pemesanan_item['status'] == 'selesai' || $pemesanan_item['status'] == 'dibatalkan'){echo 'disabled';} ?>" href="<?php echo site_url('proses_pemesanan/pilih_pengeluaran/'.$pemesanan_item['kd_pemesanan'].'?back=pemesanan'); ?>"><i class="fa fa-dollar"></i> Pengeluaran Event</a>
                              <?php endif; ?>
                            </div>
                          </td>
                        <?php endif; ?>
                        <td style="width: 70px;" class="text-center">
                          <div class="btn-group-vertical">
                            <button type="button" class="btn btn-sm btn-flat btn-warning dropdown-toggle <?php if($pemesanan_item['status'] == 'selesai' || $pemesanan_item['status'] == 'dibatalkan'){echo 'disabled';} ?>" data-toggle="dropdown"><i class="fa fa-edit"></i> Ubah
                              <span class="fa fa-caret-down"></span></button>
                              <ul class="dropdown-menu menu-left">
                                <li><a href="<?php
                                                if ($pemesanan_item['tipe_pesanan'] == 'Alat & Jasa') {
                                                  echo site_url('pemesanan/ubah/'.$pemesanan_item['kd_pemesanan'].'?back=pemesanan');
                                                }
                                                else {
                                                  echo site_url('pemesanan2/ubah/'.$pemesanan_item['kd_pemesanan'].'?back=pemesanan');
                                                }?>">Ubah Data Pemesanan</a></li>
                                <li><a href="<?php
                                                if ($pemesanan_item['tipe_pesanan'] == 'Alat & Jasa') {
                                                  echo site_url('pemesanan/ubah_detail/'.$pemesanan_item['kd_pemesanan'].'?back=pemesanan');
                                                }
                                                else {
                                                  echo site_url('pemesanan2/ubah_detail/'.$pemesanan_item['kd_pemesanan'].'?back=pemesanan');
                                                }?>">Ubah Detail Pemesanan</a></li>
                              </ul>
                              <?php if ($_SESSION['akses'] == "superadmin"): ?>
                                <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='pemesanan' data-controller='transaksi_klien' data-kode="<?php echo $pemesanan_item['kd_pemesanan']; ?>" class="btn btn-sm btn-flat btn-danger <?php if($pemesanan_item['status'] == 'diproses' || $pemesanan_item['status'] == 'menunggu'){echo 'disabled';} ?>"><i class="fa fa-trash-o"></i> Hapus</a>
                              <?php endif; ?>
                            </div>
                          </td>
                        <td style="width: 70px;" class="text-center">
                          <div class="btn-group-vertical">
                            <a href="#" data-toggle="modal" data-target="#modal-konfirmasi" data-kode="<?php echo $pemesanan_item['kd_pemesanan']; ?>" data-controller="transaksi_klien" data-form="pengembalian" class="btn btn-sm btn-flat btn-primary <?php if($pemesanan_item['status'] == 'selesai' || $pemesanan_item['status'] == 'dibatalkan' || $pemesanan_item['status'] == 'menunggu'){echo 'disabled';} ?>"><i class="fa fa-check"></i> Pengembalian</a>
                            <a href="#" data-toggle="modal" data-target="#modal-batalkan" data-kode="<?php echo $pemesanan_item['kd_pemesanan']; ?> " data-controller="transaksi_klien" data-form="pemesanan" class="btn btn-sm btn-flat btn-danger <?php if($pemesanan_item['status'] == 'selesai' || $pemesanan_item['status'] == 'dibatalkan'){echo 'disabled';} ?>"><i class="fa fa-times"></i> Pembatalan</a>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Event</th>
                        <th>Tipe Pesanan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <?php if ($_SESSION['akses'] == "superadmin"): ?>
                          <th class="text-center">Proses</th>
                        <?php endif; ?>
                        <th class="text-center">Action</th>
                        <th class="text-center">Pemesanan</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
</div>
<!-- /.content-wrapper -->
