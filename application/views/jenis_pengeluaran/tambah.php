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
                    <div class="form-group nama col-md-12">
                      <label>Nama Pengeluaran</label>
                      <input id="nama" name="nama" type="text" class="form-control" placeholder="...">
                      <label class="error" for="nama" id="nama_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali" for="nama" id="nama_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukan huruf dan karakter.</label>
                    </div>

                    <!-- select -->
                    <div class="form-group kategori_biaya col-md-12">
                      <label>Kategori Biaya Operasional</label>
                      <select id="kategori_biaya" class="form-control" name="kategori_biaya">
                        <!-- <option value="511 - Gaji">511 - Gaji</option> -->
                        <option value="512 - Konsumsi">512 - Konsumsi</option>
                        <option value="513 - Transportasi">513 - Transportasi</option>
                        <!-- <option value="514 - Sewa Alat">514 - Sewa Alat</option> -->
                        <option value="515 - Akomodasi">515 - Akomodasi</option>
                        <option value="516 - Komunikasi">516 - Komunikasi</option>
                        <option value="517 - Cetak">517 - Cetak</option>
                        <option value="518 - Habis Pakai">518 - Habis Pakai</option>
                        <option value="519 - Marketing">519 - Marketing</option>
                        <option value="529 - Lain-lain">529 - Lain-lain</option>
                      </select>
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
