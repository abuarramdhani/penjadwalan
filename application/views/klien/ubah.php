<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Data
      <small>Klien</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li >Klien</li>
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
                      <input id="nama" name="nama" type="text" class="form-control" placeholder="..." value="<?php echo $klien_item['nama']; ?>">
                      <label class="error" for="nama" id="nama_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali"  for="nama" id="nama_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf.</label>
                    </div>
                    <!-- text input -->
                    <div class="form-group hp col-md-12">
                      <label>No. HP</label>
                      <input id="hp" name="hp" type="text" class="form-control" placeholder="..." value="<?php echo $klien_item['no_hp']; ?>">
                      <label class="error" for="hp" id="hp_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali"  for="hp" id="hp_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                    </div>
                    <!-- textarea -->
                    <div class="form-group alamat col-md-12">
                      <label>Alamat</label>
                      <textarea id="alamat" name="alamat" class="form-control" rows="3" placeholder="..."><?php echo $klien_item['kd_klien']; ?></textarea>
                      <label class="error" for="alamat" id="alamat_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- text input -->
                    <div class="form-group email col-md-12">
                      <label>Email</label>
                      <input id="email" name="email" type="email" class="form-control" placeholder="..." value="<?php
                                                                                                                    if ($klien_item['email'] == "-") {
                                                                                                                      echo "";
                                                                                                                    }
                                                                                                                    else {
                                                                                                                      echo $klien_item['email'];
                                                                                                                    }
                                                                                                                 ?>">
                      <label class="vali" for="email" id="email_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
                      <label class="cek" for="email" id="email_cek" hidden><i class="fa fa-times-circle-o"></i> email sudah terdaftar dalam database.</label>
                      <label class="cek" for="email" id="email_cek2" hidden><i class="fa fa-times-circle-o"></i> Email tidak valid.</label>
                    </div>
                    <!-- text input -->
                    <div class="form-group company col-md-12">
                      <label>Company</label>
                      <input id="company" name="company" type="text" class="form-control" placeholder="..." value="<?php
                                                                                                                    if ($klien_item['company'] == "-") {
                                                                                                                      echo "";
                                                                                                                    }
                                                                                                                    else {
                                                                                                                      echo $klien_item['company'];
                                                                                                                    }
                                                                                                                 ?>">
                      <label class="vali"  for="company" id="company_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf.</label>
                    </div>
                    <!-- radio -->
                    <div class="form-group col-md-12">
                      <label class="">Status</label>
                      <div class="col-md-12">
                        <?php
                        if ($klien_item['status'] == 'on') {
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
                          <a href="<?php echo site_url('klien/klien'); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                          <button id="ubah" type="submit" class="btn btn-success" style="margin-left: 10px;" value="ubah"><i class="fa fa-save"></i> Ubah</button>
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
