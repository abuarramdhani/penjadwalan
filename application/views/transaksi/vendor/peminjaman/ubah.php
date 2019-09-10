<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Data
      <small>Peminjaman</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li >Peminjaman</li>
      <li class="active">Ubah Data</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-bottom:171px;">

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

                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Left Form -->
                    <div class="col-md-6">
                      <!-- select -->
                      <div class="form-group col-md-12">
                        <label>Vendor</label>
                        <select id="vendor" name="vendor" class="form-control">
                          <?php foreach ($vendor_view as $vendor_item) { ?>
                          <option value="<?php echo $vendor_item['kd_vendor']; ?>" <?php if ($peminjaman_item['kd_vendor'] == $vendor_item['kd_vendor']) { echo "selected"; } ?>><?php echo $vendor_item['nama']; ?></option>
                         <?php } ?>
                        </select>
                      </div>
                  </div>

                  <!-- Right Form -->
                  <div class="col-md-6">
                    <?php

                    $tgl1 = $peminjaman_item['tgl_pinjam'];
                    $tgl1 = explode("-",$tgl1);
                    $d1 = $tgl1['0'];
                    $m1 = $tgl1['1'];
                    $y1 = $tgl1['2'];
                    $tanggal1 = array($y1, $m1, $d1);
                    $tgl_pinjam = implode("/", $tanggal1);

                    $tgl2 = $peminjaman_item['tgl_kembali'];
                    $tgl2 = explode("-",$tgl2);
                    $d2 = $tgl2['0'];
                    $m2 = $tgl2['1'];
                    $y2 = $tgl2['2'];
                    $tanggal2 = array($y2, $m2, $d2);
                    $tgl_kembali = implode("/", $tanggal2);

                    $tgl = array($tgl_pinjam, $tgl_kembali);
                    $tgl = implode(" - ", $tgl);
                    ?>

                    <!-- Date -->
                    <div class="form-group col-md-12">
                      <label>Tanggal</label>
                      <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <input name="tgl" type="text" class="form-control pull-left" id="reservation" readonly="readonly" style="background: white;" value="<?php echo $tgl; ?>">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                <!--button-->
                <div class="col-md-12">
                      <div class="col-md-12">
                        <div class="text-center">
                          <a style="margin-right: 10px;" href="<?php echo site_url('peminjaman/peminjaman'); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                          <button id="ubah" name="button" type="submit" class="btn btn-success"  value="ubah"><i class="fa fa-save"></i> Ubah</button>
                         </div>
                      </div>
                </div>

                </div>
                <!-- /.box-body -->

            </div>
          </div>
        </div>
      </div>
<!-- /.content-wrapper -->
</section>
