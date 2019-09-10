<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data
      <small>Jenis Pengeluaran</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li >Jenis Pengeluaran</li>
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
                    <div class="col-md-6">
                    <!-- text input -->
                    <div class="form-group kode col-md-12">
                      <label>Kode</label>
                      <input id="kode" name="kode" type="text" class="form-control" placeholder="...">
                      <label class="error" for="kode" id="kode_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali" for="kode" id="kode_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukan angka.</label>
                      <label class="cek" for="kode" id="kode_cek" hidden><i class="fa fa-times-circle-o"></i> Kode sudah terdaftar di database.</label>
                    </div>
                    <!-- text input -->
                    <div class="form-group nama col-md-12">
                      <label>Nama</label>
                      <input id="nama" name="nama" type="text" class="form-control" placeholder="...">
                      <label class="error" for="nama" id="nama_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali" for="nama" id="nama_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukan huruf dan karakter.</label>
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
                          <a style="margin-right: 10px;" href="<?php echo site_url('jenis_pengeluaran/jenis_pengeluaran'); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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
