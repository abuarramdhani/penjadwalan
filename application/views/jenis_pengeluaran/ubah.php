<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Data
      <small>Jenis Pengeluaran</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li >Jenis Pengeluaran</li>
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
                      <input id="nama" name="nama" type="text" class="form-control" placeholder="..." value="<?php echo $jenis_pengeluaran_item['nama']; ?>">
                      <label class="error" for="nama" id="nama_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      <label class="vali" for="nama" id="nama_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukan huruf dan karakter.</label>
                    </div>

                    <!-- select -->
                    <div class="form-group kategori_biaya col-md-12">
                      <label>Kategori Biaya Operasional</label>
                      <select id="kategori_biaya" class="form-control" name="kategori_biaya">
                        <!-- <option value="511 - Gaji" <?php if ($jenis_pengeluaran_item['kategori_biaya'] == "511 - Gaji") { echo "selected";} ?>>511 - Gaji</option> -->
                        <option value="512 - Konsumsi" <?php if ($jenis_pengeluaran_item['kategori_biaya'] == "512 - Konsumsi") { echo "selected";} ?>>512 - Konsumsi</option>
                        <option value="513 - Transportasi" <?php if ($jenis_pengeluaran_item['kategori_biaya'] == "513 - Transportasi") { echo "selected";} ?>>513 - Transportasi</option>
                        <!-- <option value="514 - Sewa Alat" <?php if ($jenis_pengeluaran_item['kategori_biaya'] == "514 - Sewa Alat") { echo "selected";} ?>>514 - Sewa Alat</option> -->
                        <option value="515 - Akomodasi" <?php if ($jenis_pengeluaran_item['kategori_biaya'] == "515 - Akomodasi") { echo "selected";} ?>>515 - Akomodasi</option>
                        <option value="516 - Komunikasi" <?php if ($jenis_pengeluaran_item['kategori_biaya'] == "516 - Komunikasi") { echo "selected";} ?>>516 - Komunikasi</option>
                        <option value="517 - Cetak" <?php if ($jenis_pengeluaran_item['kategori_biaya'] == "517 - Cetak") { echo "selected";} ?>>517 - Cetak</option>
                        <option value="518 - Habis Pakai" <?php if ($jenis_pengeluaran_item['kategori_biaya'] == "518 - Habis Pakai") { echo "selected";} ?>>518 - Habis Pakai</option>
                        <option value="519 - Marketing" <?php if ($jenis_pengeluaran_item['kategori_biaya'] == "519 - Marketing") { echo "selected";} ?>>519 - Marketing</option>
                        <option value="529 - Lain-lain" <?php if ($jenis_pengeluaran_item['kategori_biaya'] == "529 - Lain-lain") { echo "selected";} ?>>529 - Lain-lain</option>
                      </select>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <!-- radio -->
                    <div class="form-group col-md-12">
                      <label class="">Status</label>
                      <div class="col-md-12">
                        <?php
                        if ($jenis_pengeluaran_item['status'] == 'on') {
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
                              <a style="margin-right: 10px;" href="<?php echo site_url('jenis_pengeluaran/jenis_pengeluaran'); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                              <button id="ubah" type="submit" class="btn btn-success" value="ubah"><i class="fa fa-save"></i> Ubah</button>
                             </div>
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
