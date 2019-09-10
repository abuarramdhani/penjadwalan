<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Peralatan Event
      <small>Proses Pemesanan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li >Proses Pemesanan</li>
      <li class="active">Pilih Data</li>
    </ol>
  </section>

<?php
foreach ($vendor_view as $vendor_item) {
  $v[$vendor_item['kd_vendor']] = $vendor_item['nama'];
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

            <div class="box box-default box-solid collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Pesanan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="display: none;">
              <table id="tabel" class="table table-hover">
                <tr>
                  <th>Pesanan</th>
                  <th>Keterangan</th>
                  <th>Tanggal Pemakaian</th>
                  <th>Harga Jual</th>
                </tr>
                <?php
                foreach ($detail_pemesanan_view as $key => $value) {
                  echo "
                  <tr>
                    <td>".$value['nama']."</span></td>
                    <td>".$value['keterangan']."</span></td>
                    <td>".$value['tgl']."</span></td>
                    <td>Rp ".number_format($value['harga_jual'], 0, ',' , '.' )."</span></td>
                  </tr>
                  ";
                }
                 ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

              <div class="box">
                <div class="box-body">
                  <div class="alert alert-danger alert-dismissible text-center" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Peringatan</h4>
                    Belum ada item yang dimasukkan!
                  </div>

                  <div class="col-md-12">
                    <!-- Left Form -->
                    <div class="col-md-5">
                      <!-- select -->
                      <div class="form-group peralatan col-md-12">
                        <label>Peralatan</label>
                        <select id="peralatan" name="peralatan" class="form-control select2" style="width: 100%;">
                          <?php foreach ($peralatan_view as $peralatan_item) { ?>
                          <option value="<?php echo $peralatan_item['kd_peralatan']; ?>" ><?php echo $peralatan_item['kd_peralatan']." || ".$peralatan_item['merk']." || ".$peralatan_item['kategori']; ?></option>
                          <?php } ?>
                        </select>
                        <label for="cek" id="peralatan_cek" hidden><i class="fa fa-times-circle-o"></i> Alat ini sudah dimasukkan.</label>
                      </div>

                      <!--button-->
                      <div class="form-group col-md-12 col-md-12">
                        <div class="text-center">
                          <button style="margin-right: 10px; display: none;" id="batal_edit" name="button" type="submit" class="btn btn-danger" value="batal"><i class="fa fa-remove"></i> Batal</button>
                          <button style="display: none;" id="tombol_edit" name="button" type="submit" class="btn btn-warning" style="margin-right: 10px;" value="tombol_edit"><i class="fa fa-edit"></i> Edit</button>
                          <button id="tambah" name="button" type="submit" class="btn btn-success" style="margin-right: 10px;" value="tambah"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                      </div>

                      <!-- checkbox -->
                      <div class="form-group tgl col-md-12">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="show_alat_sewa" id="show_alat_sewa" value="1" <?php if (count($_SESSION['proses_alat_sewa']) != 0) { echo "checked"; } ?>/> Tambahkan Alat Sewa ?
                          </label>
                        </div>
                      </div>

                    </div>

                    <!-- Right Form -->
                    <div class="col-md-7">
                      <!-- Table -->
                      <div class="col-md-12">
                        <div class="box-body table-responsive no-padding">
                          <div class="result">
                            <table id="tabel" class="table table-hover">
                              <tr>
                                <th>Peralatan</th>
                                <th style='text-align: center;'  class='col-md-1'>Action</th>
                              </tr>
                              <?php
                              if (count($_SESSION['proses_peralatan']) != 0) {
                                $proses = $_SESSION['proses_peralatan'];
                                foreach ($proses as $key => $value) {
                                  echo "
                                        <tr>
                                          <td>".$value['kd_peralatan']."</span></td>
                                          <td style='text-align: center;'>
                                            <div class='btn-group-vertical'>
                                              <button data-id='".$key."' class='btn btn-sm btn-flat btn-warning' id='edit'><i class='fa fa-edit'></i></button>
                                              <button data-id='".$key."' class='btn btn-sm btn-flat btn-danger' id='hapus'><i class='fa fa-trash-o'></i></button>
                                            </div>
                                          </td>
                                        </tr>
                                        ";
                                  }
                                }
                                else {
                                  echo "<td colspan='2' style='text-align:center;'>Belum ada Data</td>";
                                }
                                ?>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

                    <!-- SEWA ALAT -->
                    <div class="sewa_alat" class="col-md-12" <?php if (count($_SESSION['proses_alat_sewa']) == 0) { echo "hidden"; } ?>>
                      <!-- Left Form -->
                      <div class="col-md-5">
                        <!-- input -->
                        <div class="form-group nama_alat col-md-12">
                          <label>Nama Alat</label>
                          <input id="nama_alat" type="text" name="nama_alat" class="form-control" placeholder="...">
                          <label class="vali" for="nama_alat" id="nama_alat_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
                          <label class="cek" for="cek" id="nama_alat_cek" hidden><i class="fa fa-times-circle-o"></i> Alat ini sudah dimasukkan.</label>
                          <label class="error" for="error" id="nama_alat_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        </div>

                        <!-- input -->
                        <div class="form-group jumlah col-md-12">
                          <label>Jumlah</label>
                          <input id="jumlah" type="text" name="jumlah" class="form-control" placeholder="...">
                          <label class="vali" for="jumlah" id="jumlah_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                          <label class="error" for="jumlah" id="jumlah_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        </div>

                        <!-- input -->
                        <div class="form-group harga col-md-12">
                          <label>Harga Total</label>
                          <input id="harga" type="text" name="harga" class="form-control" placeholder="...">
                          <label class="vali" for="harga" id="harga_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                          <label class="error" for="harga" id="harga_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        </div>

                        <!-- select -->
                        <div class="form-group vendor col-md-12">
                          <label>Vendor</label>
                          <select id="vendor" name="vendor" class="form-control select2" style="width: 100%;">
                            <?php foreach ($vendor_view as $vendor_item) { ?>
                              <option value="<?php echo $vendor_item['kd_vendor']; ?>" ><?php echo $vendor_item['nama']; ?></option>
                            <?php } ?>
                          </select>
                          <label for="cek" id="vendor_cek" hidden><i class="fa fa-times-circle-o"></i> Alat ini sudah dimasukkan.</label>
                        </div>

                        <!--button-->
                        <div class="form-group col-md-12 col-md-12">
                          <div class="text-center">
                            <button style="margin-right: 10px; display: none;" id="batal_edit_sewa" name="button" type="submit" class="btn btn-danger" value="batal"><i class="fa fa-remove"></i> Batal</button>
                            <button style="display: none;" id="tombol_edit_sewa" name="button" type="submit" class="btn btn-warning" style="margin-right: 10px;" value="tombol_edit"><i class="fa fa-edit"></i> Edit</button>
                            <button id="tambah_sewa" name="button" type="submit" class="btn btn-success" style="margin-right: 10px;" value="tambah"><i class="fa fa-plus"></i> Tambah</button>
                          </div>
                        </div>

                      </div>

                      <!-- Right Form -->
                      <div class="col-md-7">
                        <!-- Table -->
                        <div class="col-md-12">
                          <div class="box-body table-responsive no-padding">
                            <div class="result_sewa">
                              <table id="tabel" class="table table-hover">
                                <tr>
                                  <th class="text-center">Nama Alat</th>
                                  <th class="text-center">Jumlah</th>
                                  <th class="text-center">Harga Total</th>
                                  <th class="text-center">Vendor</th>
                                  <th style='text-align: center;'  class='col-md-1'>Action</th>
                                </tr>
                                <?php
                                if (count($_SESSION['proses_alat_sewa']) != 0) {
                                  $proses = $_SESSION['proses_alat_sewa'];
                                  foreach ($proses as $key => $value) {
                                  echo "
                                    <tr>
                                      <td class='text-center'>".$value['nama']."</span></td>
                                      <td class='text-center'>".$value['jumlah']."</span></td>
                                      <td class='text-center'>Rp ".number_format($value['harga'], 0, ',' , '.' )."</span></td>
                                      <td class='text-center'>".$v[$value['kd_vendor']]."</span></td>
                                      <td class='text-center'>
                                        <div class='btn-group-vertical'>
                                          <button data-id=".$key." class='btn btn-sm btn-flat btn-warning' id='edit_sewa'><i class='fa fa-edit'></i></button>
                                          <button data-id=".$key." class='btn btn-sm btn-flat btn-danger' id='hapus_sewa'><i class='fa fa-trash-o'></i></button>
                                        </div>
                                      </td>
                                    </tr>
                                  ";
                                  }
                                }
                                else {
                                  echo "<td colspan='5' style='text-align:center;'>Belum ada Data</td>";
                                }
                                ?>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    <!--button-->
                    <div class="col-md-12" style="margin-top: 30px;">
                      <div class="text-center">
                        <button style="margin-right: 10px;" id="batal" name="button" type="submit" class="btn btn-danger" value="batal"><i class="fa fa-remove"></i> Batal</button>
                        <button id="pilih" name="button" type="submit" class="btn btn-success" value="pilih" ><i class="fa fa-save"></i> Simpan</button>
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
