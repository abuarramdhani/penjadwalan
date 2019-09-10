<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Data
      <small>Pegawai</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li >Pegawai</li>
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
                      <div class="form-group username col-md-12">
                        <label>Username</label>
                        <input id="username" name="username" type="text" class="form-control" placeholder="..." value="<?php echo $pegawai_item['username']; ?>">
                        <label class="vali" for="username" id="username_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
                        <label class="error" for="username" id="username_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        <label class="cek" for="username" id="username_cek" hidden><i class="fa fa-times-circle-o"></i> Username sudah terdaftar dalam database.</label>
                      </div>
                    <!-- text input -->
                    <div class="form-group nama col-md-12">
                      <label>Nama</label>
                      <input id="nama" name="nama" type="text" class="form-control" placeholder="..." value="<?php echo $pegawai_item['nama']; ?>">
                      <label class="vali" for="nama" id="nama_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf.</label>
                      <label class="error" for="nama" id="nama_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                    </div>
                    <!-- text input -->
                    <div class="form-group email col-md-12">
                      <label>Email</label>
                      <input id="email" name="email" type="email" class="form-control" placeholder="..." value="<?php echo $pegawai_item['email']; ?>">
                      <label class="error" for="email" id="email_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali" for="email" id="email_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
                      <label class="cek" for="email" id="email_cek" hidden><i class="fa fa-times-circle-o"></i> Email sudah terdaftar dalam database.</label>
                      <label class="cek" for="email" id="email_cek2" hidden><i class="fa fa-times-circle-o"></i> Email tidak valid.</label>
                    </div>
                    <!-- textarea -->
                    <div class="form-group alamat col-md-12">
                      <label>Alamat</label>
                      <textarea id="alamat" name="alamat" class="form-control" rows="3" placeholder="..."><?php echo $pegawai_item['alamat']; ?></textarea>
                      <label class="error" for="alamat" id="alamat_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                    </div>
                    <!-- text input -->
                    <div class="form-group hp col-md-12">
                      <label>No. HP</label>
                      <input id="hp" name="hp" type="text" class="form-control" placeholder="..." value="<?php echo $pegawai_item['no_hp']; ?>">
                      <label class="error" for="hp" id="hp_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali"  for="hp" id="hp_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                    </div>
                  </div>

                  <!-- Right Form -->
                  <div class="col-md-6">
                    <!-- text input -->
                    <div class="form-group npwp col-md-12">
                      <label>NPWP</label>
                      <input id="npwp" name="npwp" type="text" class="form-control" placeholder="..." value="<?php if ($pegawai_item['npwp'] == "-") {
                                                                                                                      echo "";
                                                                                                                    }
                                                                                                                    else {
                                                                                                                      echo $pegawai_item['npwp'];
                                                                                                                    }?>">
                      <label class="error" for="npwp" id="npwp_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali"  for="npwp" id="npwp_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                    </div>
                    <!-- select -->
                    <div class="form-group jabatan col-md-12">
                      <label>Jabatan</label>
                      <select id="jabatan" name="jabatan" class="form-control">
                        <?php foreach ($jabatan_view as $jabatan_item) { ?>
                        <option value="<?php echo $jabatan_item['kd_jabatan']; ?>" <?php if ($pegawai_item['kd_jabatan'] == $jabatan_item['kd_jabatan']) { echo "selected"; } ?>><?php echo $jabatan_item['nama']; ?></option>
                       <?php } ?>
                      </select>
                    </div>
                    <!-- Date -->
                    <div class="form-group mulai_kerja col-md-12">
                      <label>Mulai Kerja</label>
                      <?php
                      //ubah format tanggal
                      $tgl = $pegawai_item['mulai_kerja'];
                      $tgl = explode("-",$tgl);
                      $d = $tgl['0'];
                      $m = $tgl['1'];
                      $y = $tgl['2'];
                      $tanggal = array($y, $m, $d);
                      $mulai_kerja = implode("-", $tanggal);
                      ?>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="mulai_kerja" class="form-control pull-right" id="datepicker2" placeholder="dd/mm/yyyy" value="<?php echo $mulai_kerja; ?>" readonly style="background: white;">
                      </div>
                      <label class="error" for="mulai_kerja" id="mulai_kerja_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <!-- /.input group -->
                    </div>
                    <!-- radio -->
                    <div class="form-group col-md-5 col-xs-6">
                      <label class="">Status Pegawai</label>
                      <div class="col-md-12">
                        <?php
                        if ($pegawai_item['status_pegawai'] == 'tetap') {
                          $tetap  = 'checked';
                          $magang        = '';
                        }else {
                          $tetap  = '';
                          $magang        = 'checked';
                        }
                         ?>
                      <div class="radio">
                        <label>
                          <input type="radio" name="status_pegawai" id="status1" value="tetap" <?php if (isset($tetap) == TRUE) { echo $tetap;     } ?>> Pegawai Tetap
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="status_pegawai" id="status2" value="magang" <?php if (isset($magang) == TRUE) { echo $magang;     } ?>> Pegawai Magang
                        </label>
                      </div>
                    </div>
                  </div>
                    <!-- radio -->
                    <div class="form-group col-md-4 col-xs-6">
                      <label class="">Status User</label>
                      <div class="col-md-12">
                        <?php
                        if ($pegawai_item['status_user'] == 'superadmin') {
                          $superadmin  = 'checked';
                          $user        = '';
                        }else {
                          $superadmin  = '';
                          $user        = 'checked';
                        }
                         ?>
                      <div class="radio">
                        <label>
                          <input type="radio" name="status_user" id="status1" value="superadmin" <?php if (isset($superadmin) == TRUE) { echo $superadmin;     } ?>> Superadmin
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="status_user" id="status2" value="user" <?php if (isset($user) == TRUE) { echo $user;     } ?>> User
                        </label>
                      </div>
                    </div>
                  </div>
                    <!-- radio -->
                    <div class="form-group col-md-3 col-xs-12">
                      <label class="">Status</label>
                      <div class="col-md-12">
                        <?php
                        if ($pegawai_item['status'] == 'on') {
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
                  <div style="margin-top: 20px;" class="col-md-12 col-xs-12">
                    <div class="text-center">
                      <a href="<?php echo site_url('pegawai/pegawai'); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                      <button id="ubah" type="submit" class="btn btn-success" style="margin-left: 10px;" value="ubah"><i class="fa fa-save"></i> Ubah</button>
                    </div>
                  </div>
                  </form>
                </div>
                <!-- /.box-body -->

            </div>
          </div>
        </div>
      </div>
<!-- /.content-wrapper -->
</section>
