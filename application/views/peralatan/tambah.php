
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data
      <small>Peralatan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li >Peralatan</li>
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

                    <div class="col-md-6" style="margin-bottom: 50px;">
                    <!-- select -->
                    <div class="form-group col-md-12">
                      <label>Tipe</label>
                      <select id="tipe" name="tipe" class="form-control select2" style="width: 100%;">
                        <?php foreach ($tipe_view as $tipe_item) { ?>
                        <option value="<?php echo $tipe_item['kd_tipe']; ?>" ><?php echo $tipe_item['merk']." || ".$tipe_item['nama']." || ".$tipe_item['kategori']; ?></option>
                       <?php } ?>
                      </select>
                    </div>
                    <!-- text input -->
                    <div class="form-group kode col-md-12">
                        <label style="width: 100%;">Kode</label>
                        <input style="text-transform:uppercase; float: left; width: 50%; margin: 0px;" id="kode" name="kode" type="text" class="form-control" placeholder="..." >
                        <label class="no-padding" style="float: right; width: 48%; color: #9E9E9E; font-size: 23px; margin: 0px;  margin-left: 5px;" > - <tek></tek></label>
                        <label style="margin-left: 0px; padding-left: 0px;" class="error col-md-12" for="kode" id="kode_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        <label style="margin-left: 0px; padding-left: 0px;" class="vali col-md-12" for="kode" id="kode_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
                        <label style="margin-left: 0px; padding-left: 0px;" class="cek col-md-12" for="cek" id="kode_cek" hidden><i class="fa fa-times-circle-o"></i> Kode sudah terdaftar dalam database.</label>
                    </div>
                  </div>
                    <div class="col-md-6">
                      <!-- radio -->
                      <div class="form-group col-md-12">
                        <label class="">Status</label>
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
                          <a href="<?php echo site_url('peralatan/peralatan'); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                          <button id="simpan" type="submit" class="btn btn-success" style="margin-left: 10px;" value="simpan"><i class="fa fa-save"></i> Simpan</button>
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
