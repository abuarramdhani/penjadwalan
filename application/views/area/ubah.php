
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Data
      <small>Area</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li >Area</li>
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
                    <div class="col-md-6">
                    <!-- text input -->
                    <div class="form-group nama col-md-12">
                      <label>Nama</label>
                      <input id="nama" name="nama" type="text" class="form-control" placeholder="..." value="<?php echo $area_item['nama']; ?>">
                      <label class="error" for="nama" id="nama_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali" for="nama" id="nama_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukan huruf dan angka.</label>
                    </div>
                    <!-- text input -->
                    <div class="form-group uang_makan col-md-12">
                      <label>Uang Makan</label>
                      <input id="uang_makan" name="uang_makan" type="text" class="form-control" placeholder="..." value="<?php echo $area_item['uang_makan']; ?>">
                      <label class="error" for="uang_makan" id="uang_makan_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali" for="uang_makan" id="uang_makan_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukan angka.</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- radio -->
                    <div class="form-group col-md-12">
                      <label class="">Status</label>
                      <div class="col-md-12">
                        <?php
                        if ($area_item['status'] == 'on') {
                          $on  = 'checked';
                          $off = '';
                        }else {
                          $on  = '';
                          $off = 'checked';
                        }
                         ?>
                      <div class="radio">
                        <label>
                          <input type="radio" name="status" id="status1" value="on" <?php if (isset($on) == TRUE) { echo $on;     } ?>> on
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="status" id="status2" value="off" <?php if (isset($off) == TRUE) { echo $off;     } ?>> off
                        </label>
                      </div>
                    </div>
                  </div>
                  </div>
                <!--button-->
                <div class="col-md-12">
                      <div class="col-md-12">
                        <div class="text-center">
                          <a style="margin-right: 10px;" href="<?php echo site_url('area/area'); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                          <button id="ubah" type="submit" class="btn btn-success" value="ubah"><i class="fa fa-save"></i> Ubah</button>
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
