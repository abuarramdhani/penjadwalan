<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <?php
  //ubah format tanggal
  $tgl1 = $detail_peminjaman_view[0]['tgl_pinjam'];
  $tgl1 = explode("-",$tgl1);
  $d1 = $tgl1['0'];
  $m1 = $tgl1['1'];
  $y1 = $tgl1['2'];
  $tanggal1 = array($y1, $m1, $d1);
  $tgl_pinjam = implode("-", $tanggal1);
  //ubah format tanggal
  $tgl2 = $detail_peminjaman_view[0]['tgl_kembali'];
  $tgl2 = explode("-",$tgl2);
  $d2 = $tgl2['0'];
  $m2 = $tgl2['1'];
  $y2 = $tgl2['2'];
  $tanggal2 = array($y2, $m2, $d2);
  $tgl_kembali = implode("-", $tanggal2);
  ?>

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Peminjaman
      <small>Data Master</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li>Peminjaman</li>
      <li class="active">Detail Peminjaman</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->



  <!-- /.col -->
  <div class="col-md-12">


    <div class="col-md-8 col-xs-6 pull-left">
      <table class="table">
        <tr>
          <td class="col-md-3"><b>Kode Peminjaman</b></td>
          <td><?php echo $detail_peminjaman_view[0]['kd_peminjaman']; ?></td>
        </tr>
        <tr>
          <td><b>Vendor</b></td>
          <td><?php echo $detail_peminjaman_view[0]['vendor']; ?></td>
        </tr>
        <tr>
          <td><b>Status</b></td>
          <td><?php echo $detail_peminjaman_view[0]['status']; ?></td>
        </tr>
      </table>
    </div>
    <div class="col-md-4 col-xs-6 pull-right">
      <table class="table">
        <tr>
          <td><b>Tanggal Pinjam</b></td>
          <td><?php echo $tgl_pinjam; ?></td>
        </tr>
        <tr>
          <td><b>Tanggal Kembali</b></td>
          <td><?php echo $tgl_kembali; ?></td>
        </tr>
      </table>
    </div>

        <div class="row">
          <div class="col-xs-12">


              <!-- /.box-header -->
              <div class="box">
              <div class="box-body table-responsive no-padding">
                  <div class="box-header">
                    <h3 class="box-title">Detail Alat Sewa</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="tabel" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Harga Sewa Satuan</th>
                        <th>Harga Total</th>
                      </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($detail_peminjaman_view as $detail_peminjaman_item) {
                          $total = $detail_peminjaman_item['jumlah']*$detail_peminjaman_item['harga_sewa'];
                          ?>

                        <tr>

                        <td><?php echo $detail_peminjaman_item['nama_alat'];; ?></td>
                        <td><?php echo $detail_peminjaman_item['jumlah'];; ?></td>
                        <td><?php echo "Rp ".number_format($detail_peminjaman_item['harga_sewa'], 0, ',' , '.' ); ?></td>
                        <td><?php echo "Rp ".number_format($total, 0, ',' , '.' ); ?></td>

                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Harga Sewa Satuan</th>
                        <th>Harga Total</th>
                      </tr>
                      </tfoot>
                    </table>

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- button -->
              <div class="text-center" style="margin: 15px 0px;">
                <div class="col-md-3 col-xs-1">

                </div>
                <div class="col-md-5  col-xs-9">
                  <div class="btn-group">
                    <button style="margin-top: 3px;" type="button" class="btn btn-flat btn-sm btn-warning dropdown-toggle <?php if($detail_peminjaman_item['status'] == 'dikembalikan' || $detail_peminjaman_item['status'] == 'dibatalkan'){echo 'disabled';} ?>" data-toggle="dropdown"> Ubah
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="<?php echo site_url('peminjaman/ubah/'.$detail_peminjaman_item['kd_peminjaman']); ?>">Ubah Data Peminjaman</a></li>
                      <li><a href="<?php echo site_url('peminjaman/ubah_detail/'.$detail_peminjaman_item['kd_peminjaman']); ?>">Ubah Detail Peminjaman</a></li>
                    </ul>
                  </div>
                <a style="margin-top: 3px;" href="#" data-toggle="modal" data-target="#modal-hapus" data-kode="<?php echo $detail_peminjaman_item['kd_peminjaman']; ?>" class="btn btn-sm btn-flat btn-danger <?php if($detail_peminjaman_item['status'] == 'dipinjam'){echo 'disabled';} ?>"><i class="fa fa-trash-o"></i> Hapus</a>

                  <a style="margin-top: 3px;" href="#"  data-toggle="modal" data-target="#modal-konfirmasi_vendor" data-kode="<?php echo $detail_peminjaman_item['kd_peminjaman']; ?>" class="btn btn-sm btn-flat btn-primary <?php if($detail_peminjaman_item['status'] == 'dikembalikan' || $detail_peminjaman_item['status'] == 'dibatalkan'){echo 'disabled';} ?>"><i class="fa fa-check"></i> Pengembalian</a>
                  <a style="margin-top: 3px;" href="#" data-toggle="modal" data-target="#modal-batalkan_vendor" data-kode="<?php echo $detail_peminjaman_item['kd_peminjaman']; ?>" class="btn btn-sm btn-flat btn-danger <?php if($detail_peminjaman_item['status'] == 'dikembalikan' || $detail_peminjaman_item['status'] == 'dibatalkan'){echo 'disabled';} ?>"><i class="fa fa-times"></i> Pembatalan</a>
                  <a style="margin-top: 10px;" href="<?php echo site_url("peminjaman/peminjaman"); ?>" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- /.content-wrapper -->
</section>
