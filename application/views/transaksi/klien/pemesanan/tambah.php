<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data
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
                          <option value="<?php echo $klien_item['kd_klien']; ?>" ><?php echo $klien_item['nama']; ?></option>
                         <?php } ?>
                        </select>
                      </div>

                      <!-- Date -->
                      <div class="form-group col-md-12">
                        <label>Tanggal</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                            <input name="tgl" type="text" class="form-control pull-left" id="reservation" readonly="readonly" style="background: white;">
                        </div>
                        <!-- /.input group -->
                      </div>

                      <!-- select -->
                      <div class="form-group col-md-12">
                        <label>Kota</label>
                        <select id="kota" name="kota" class="form-control select2">
                          <?php foreach ($kota_view as $kota_item) { ?>
                            <option value="<?php echo $kota_item['kd_kota']; ?>" ><?php echo $kota_item['nama']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                    </div>

                  <!-- Right Form -->
                    <div class="col-md-6">

                    <!-- text input -->
                    <div class="form-group nama_event col-md-12">
                      <label>Nama Event</label>
                      <input id="nama_event" name="nama_event" type="text" class="form-control" placeholder="...">
                      <label class="error" for="nama_event" id="nama_event_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                    </div>

                    <!-- text input -->
                    <div class="form-group lokasi col-md-12">
                      <label>Lokasi</label>
                      <input id="lokasi" name="lokasi" type="text" class="form-control" placeholder="...">
                      <label class="error" for="lokasi" id="lokasi_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                    </div>

                    </div>
                    <!--button-->
                    <div class="col-md-12">
                      <div class="col-md-12">
                        <div class="text-center">
                          <a style="margin-right: 10px;" href="<?php echo site_url('pemesanan/pemesanan'); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                          <button id="selanjutnya" name="button" type="submit" class="btn btn-primary"  value="selanjunya">Selanjutnya <i class="fa fa-arrow-right"></i></button>
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
