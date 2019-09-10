<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengeluaran Event
      <small>Proses Pemesanan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li >Proses Pemesanan</li>
      <li class="active">Pilih Data</li>
    </ol>
  </section>
<?php
foreach ($jenis_pengeluaran_view2 as $jenis_pengeluaran_item2) {
  $jp[$jenis_pengeluaran_item2['kd_jenis_pengeluaran']] = $jenis_pengeluaran_item2['nama'];
}
?>
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

          <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <div class="alert alert-danger alert-dismissible text-center" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Peringatan</h4>
                    Belum ada item yang dimasukkan!
                  </div>


                  <!-- Left Form -->
                    <div class="col-md-6">
                      <!-- select -->
                      <div class="form-group jenis_pengeluaran col-md-12">
                        <label>Pengeluaran</label>
                        <select id="jenis_pengeluaran" name="jenis_pengeluaran" class="form-control select2" style="width: 100%;">
                          <?php foreach ($jenis_pengeluaran_view as $jenis_pengeluaran_item) { ?>
                          <option value="<?php echo $jenis_pengeluaran_item['kd_jenis_pengeluaran']; ?>" ><?php echo $jenis_pengeluaran_item['nama']; ?></option>
                         <?php } ?>
                        </select>
                      </div>

                      <!-- text input -->
                      <div class="form-group harga col-md-12">
                        <label>Harga</label>
                        <input id="harga" name="harga" type="text" class="form-control angkaSaja" placeholder="..." >
                        <label class="error" for="harga" id="harga_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        <label class="vali" for="harga" id="harga_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                      </div>

                      <!-- text area -->
                      <div class="form-group keterangan col-md-12">
                        <label>Keterangan</label>
                        <textarea id="keterangan" name="keterangan" class="form-control" rows="3" placeholder="..."></textarea>
                        <label class="error" for="keterangan" id="keterangan_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                      </div>

                      <!--button-->
                      <div class="form-group col-md-12 col-md-12">
                        <div class="text-center">
                          <button style="margin-right: 10px; display: none;" id="batal_edit" name="button" type="submit" class="btn btn-danger" value="batal"><i class="fa fa-remove"></i> Batal</button>
                          <button style="display: none;" id="tombol_edit" name="button" type="submit" class="btn btn-warning" style="margin-right: 10px;" value="tombol_edit"><i class="fa fa-edit"></i> Edit</button>
                          <button id="tambah" name="button" type="submit" class="btn btn-success" style="margin-right: 10px;" value="tambah"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                      </div>

                    </div>
                  <!-- Right Form -->
                    <div class="col-md-6">
                      <!-- Table -->
                      <div class="col-md-12">
                      <div class="box-body table-responsive no-padding">
                        <div class="result">
                          <table id="tabel" class="table table-hover">
                            <tr>
                              <th>Jenis Pengeluaran</th>
                              <th>Harga</th>
                              <th>Keterangan</th>
                              <th style='text-align: center;'  class='col-md-1'>Action</th>
                            </tr>
                            <?php
                            if (count($_SESSION['proses_pengeluaran']) != 0) {
                            $proses = $_SESSION['proses_pengeluaran'];
                              foreach ($proses as $key => $value) {
                                echo "
                                <tr>
                                  <td>".$jp[$value['kd_jenis_pengeluaran']]."</span></td>
                                  <td>Rp  ".number_format($value['harga'], 0, ',' , '.' )."</td>
                                  <td>".$value['keterangan']."</span></td>
                                  <td style='text-align: center;'>
                                    <div class='btn-group-vertical'>
                                      <button data-id=".$key." class='btn btn-sm btn-flat btn-warning' id='edit'><i class='fa fa-edit'></i></button>
                                      <button data-id=".$key." class='btn btn-sm btn-flat btn-danger' id='hapus'><i class='fa fa-trash-o'></i></button>
                                    </div>
                                  </td>
                                </tr>
                                ";
                              }
                            }
                            else {
                              echo "<td colspan='4' style='text-align:center;'>Belum ada Data</td>";
                            }
                            ?>
                          </table>
                        </div>
                        </div>

                        <!--button-->
                          <div class="box-footer text-center">
                            <button id="pilih" name="button" type="submit" class="btn btn-success" value="pilih" ><i class="fa fa-save"></i> Simpan</button>
                          </div>
                    </div>

                    </div>
                    <!--button-->
                      <div class="col-md-12" style="margin-top: 30px;">
                        <div class="text-center">
                          <button id="batal" name="button" type="submit" class="btn btn-danger" value="batal"><i class="fa fa-remove"></i> Batal</button>
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
