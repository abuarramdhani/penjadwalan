
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data
      <small>Gaji</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li >Gaji</li>
      <li class="active">Tambah Data</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-bottom:171px;">

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

  <div class="col-md-12">

        <div class="row">
          <div class="col-xs-12">
              <!-- /.box-header -->
              <div class="box">

                <style media="screen">
                  input[type=number]::-webkit-inner-spin-button,
                  input[type=number]::-webkit-outer-spin-button
                  {
                    -webkit-appearance: none;
                    margin: 0;
                  }
                </style>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-6">

                    <!-- select -->
                    <div class="form-group col-md-12">
                      <label>Pekerjaan</label>
                      <select id="pekerjaan" name="pekerjaan" class="form-control select2">
                        <?php foreach ($pekerjaan_view as $pekerjaan_item) { ?>
                        <option value="<?php echo $pekerjaan_item['kd_pekerjaan']; ?>" ><?php echo $pekerjaan_item['nama']; ?></option>
                       <?php } ?>
                      </select>
                    </div>
                      <!-- select -->
                      <div class="form-group col-md-12">
                        <label>Area</label>
                        <select id="area" name="area" class="form-control">
                          <?php foreach ($area_view as $area_item) { ?>
                          <option value="<?php echo $area_item['kd_area']; ?>" ><?php echo $area_item['nama']; ?></option>
                         <?php } ?>
                        </select>
                      </div>
                      <!-- text input -->
                      <div class="form-group gaji col-md-12">
                        <label>Gaji</label>
                        <input id="gaji" name="gaji" type="number" class="form-control" placeholder="...">
                        <label class="error" for="gaji" id="gaji_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        <label class="vali" for="gaji" id="gaji_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukan angka.</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group magang col-md-12">
                        <label>Persentase Gaji Magang</label><br>
                        <div class="input-group">
                          <input id="magang" name="magang" type="number" class="form-control maskedTextField" data-mask-as-number-min="1" data-mask-as-number-max="100" placeholder="...">
                          <span class="input-group-addon"><strong>%</strong></span>
                        </div>
                        <label class="error" for="magang" id="magang_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        <label class="vali" for="magang" id="magang_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukan angka.</label>
                      </div>
                      <!-- radio -->
                      <div class="form-group col-md-12">
                        <label>Status</label>
                        <div class="col-md-12">
                          <div class="radio">
                            <label>
                              <input type="radio" name="status" id="status1" value="on" checked> On
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="status" id="status2" value="off"> Off
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--button-->
                    <div class="col-md-12">
                      <div class="col-md-12">
                        <div class="text-center">
                          <a style="margin-right: 10px;" href="<?php echo site_url('gaji/gaji'); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                          <button id="simpan" type="submit" class="btn btn-success" value="simpan"><i class="fa fa-save"></i> Simpan</button>
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
