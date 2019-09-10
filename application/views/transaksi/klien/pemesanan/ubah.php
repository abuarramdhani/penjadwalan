<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Data
      <small>Pemesanan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li >Pemesanan</li>
      <li class="active">Tambah Data</li>
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

                      <!-- text input -->
                        <input id="tipe_pesanan" name="tipe_pesanan" type="hidden" value="Alat & Jasa">

                        <!-- select -->
                        <div class="form-group col-md-12">
                          <label>Klien</label>
                          <select id="klien" name="klien" class="form-control select2">
                            <?php foreach ($klien_view as $klien_item) { ?>
                            <option value="<?php echo $klien_item['kd_klien']; ?>" <?php if ($pemesanan_item['kd_klien'] == $klien_item['kd_klien']) { echo "selected"; } ?> ><?php echo $klien_item['nama']; ?></option>
                           <?php } ?>
                          </select>
                        </div>

                        <?php

                  	    $tgl1 = $pemesanan_item['tgl_mulai'];
                  	    $tgl1 = explode("-",$tgl1);
                  	    $d1 = $tgl1['0'];
                  	    $m1 = $tgl1['1'];
                  	    $y1 = $tgl1['2'];
                  	    $tanggal1 = array($y1, $m1, $d1);
                  	    $tgl_mulai = implode("/", $tanggal1);

                  	    $tgl2 = $pemesanan_item['tgl_selesai'];
                  	    $tgl2 = explode("-",$tgl2);
                  	    $d2 = $tgl2['0'];
                  	    $m2 = $tgl2['1'];
                  	    $y2 = $tgl2['2'];
                  	    $tanggal2 = array($y2, $m2, $d2);
                  	    $tgl_selesai = implode("/", $tanggal2);

                        $tgl = array($tgl_mulai, $tgl_selesai);
                        $tgl = implode(" - ", $tgl);
                        ?>

                        <!-- Date -->
                        <div class="form-group col-md-12">
                          <label>Tanggal</label>
                          <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                              <input name="tgl" type="text" class="form-control pull-left" id="reservation" readonly="readonly" style="background: white;" value="<?php echo $tgl; ?>" <?php if($pemesanan_item['status'] != "menunggu") {echo "disabled";} ?>>
                          </div>
                          <!-- /.input group -->
                        </div>

                        <!-- select -->
                        <div class="form-group col-md-12">
                          <label>Kota</label>
                          <select id="kota" name="kota" class="form-control select2" <?php if($pemesanan_item['status'] != "menunggu") {echo "disabled";} ?>>
                            <?php foreach ($kota_view as $kota_item) { ?>
                            <option value="<?php echo $kota_item['kd_kota']; ?>" <?php if ($pemesanan_item['kd_kota'] == $kota_item['kd_kota']) { echo "selected"; } ?>><?php echo $kota_item['nama']; ?></option>
                           <?php } ?>
                          </select>
                        </div>

                    </div>

                  <!-- Right Form -->
                    <div class="col-md-6">

                    <!-- text input -->
                    <div class="form-group nama_event col-md-12">
                      <label>Nama Event</label>
                      <input id="nama_event" name="nama_event" type="text" class="form-control" placeholder="..." value="<?php echo $pemesanan_item['nama_event']; ?>">
                      <label class="error" for="nama_event" id="nama_event_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                    </div>

                    <!-- text input -->
                    <div class="form-group lokasi col-md-12">
                      <label>Lokasi</label>
                      <input id="lokasi" name="lokasi" type="text" class="form-control" placeholder="..." value="<?php echo $pemesanan_item['lokasi']; ?>">
                      <label class="error" for="lokasi" id="lokasi_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                    </div>

                    </div>
                    <!--button-->
                    <div class="col-md-12">
                      <div class="col-md-12">
                        <div class="text-center">
                          <a id="batal" style="margin-right: 10px;" href="#" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                          <button id="ubah" name="button" type="submit" class="btn btn-success"  value="ubah"><i class="fa fa-save"></i> Ubah</button>
                        </div>
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
