<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Peralatan Sewa
      <small>Data Master</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Peralatan Sewa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->

  <!-- /.content -->

  <!-- /.col -->
  <div class="col-md-12">

        <div class="row">
          <div class="col-xs-12">


              <!-- /.box-header -->
              <div class="box">
              <div class="box-body table-responsive no-padding">
                  <div class="box-header">
                    <h3 class="box-title">Data Peralatan Sewa</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="tabel" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Harga Sewa</th>
                      </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($peralatan_sewa_view as $peralatan_sewa_item) { ?>
                        <tr>
                        <td><?php echo $peralatan_sewa_item['kd_detail_peminjaman']; ?></td>
                        <?php
                        //ubah format tanggal
                        $tgl1 = $peralatan_sewa_item['tgl_pinjam'];
                        $tgl1 = explode("-",$tgl1);
                        $d1 = $tgl1['0'];
                        $m1 = $tgl1['1'];
                        $y1 = $tgl1['2'];
                        $tanggal1 = array($y1, $m1, $d1);
                        $tgl_pinjam = implode("-", $tanggal1);
                        //ubah format tanggal
                        $tgl2 = $peralatan_sewa_item['tgl_kembali'];
                        $tgl2 = explode("-",$tgl2);
                        $d2 = $tgl2['0'];
                        $m2 = $tgl2['1'];
                        $y2 = $tgl2['2'];
                        $tanggal2 = array($y2, $m2, $d2);
                        $tgl_kembali = implode("-", $tanggal2);
                        ?>
                         <!--trnsfer dta ke modal-->
                        <td><a href="#" data-toggle="modal" data-target="#modal-peralatan_sewa"
                          data-1="<?php echo  $peralatan_sewa_item['kd_detail_peminjaman'];?>"
                          data-2="<?php echo $peralatan_sewa_item['nama_alat']; ?>"
                          data-3="<?php echo $peralatan_sewa_item['jumlah']; ?>"
                          data-4="<?php echo $peralatan_sewa_item['harga_sewa']; ?>"
                          data-5="<?php echo $peralatan_sewa_item['kd_peminjaman']; ?>"
                          data-6="<?php echo $peralatan_sewa_item['vendor']; ?>"
                          data-7="<?php echo $tgl_pinjam ?>"
                          data-8="<?php echo $tgl_kembali; ?>"
                          ><?php echo $peralatan_sewa_item['nama_alat']; ?></a></td>

                        <td><?php echo $peralatan_sewa_item['jumlah']; ?></td>
                        <td><?php echo $peralatan_sewa_item['harga_sewa']; ?></td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Harga Sewa</th>
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
      </div>
      </div>
<!-- /.content-wrapper -->
</section>
