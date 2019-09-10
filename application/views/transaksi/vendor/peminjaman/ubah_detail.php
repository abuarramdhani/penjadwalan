<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Data <br><br>
      <small>Detail Peminjaman</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li >Peminjaman</li>
      <li class="active">Ubah Data</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-bottom:171px;">

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
  <!-- /.col -->
  <div class="col-md-12">

        <div class="row">

          <div class="col-xs-12">
              <!-- /.box-header -->
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="alert alert-danger alert-dismissible text-center" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Peringatan</h4>
                    Belum ada item yang dimasukkan!
                  </div>

                  <!-- Left Form -->
                    <div class="col-md-5">
                      <!-- text input -->
                      <div class="form-group nama_alat col-md-12">
                        <label>Nama Alat</label>
                        <input id="nama_alat" name="nama_alat" type="text" class="form-control" placeholder="...">
                        <label class="error" for="nama_alat" id="nama_alat_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        <label class="vali" for="nama_alat" id="nama_alat_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya bisa memasukkan <b>huruf</b> dan <b>angka</b>. </label>
                      </div>
                      <!-- text input -->
                      <div class="form-group jumlah col-md-12">
                        <label>Jumlah</label>
                        <input id="jumlah" name="jumlah" type="text" class="form-control" placeholder="...">
                        <label class="error" for="jumlah" id="jumlah_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        <label class="vali" for="jumlah" id="jumlah_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya bisa memasukkan <b>angka</b>.</label>
                      </div>
                      <!-- text input -->
                      <div class="form-group harga_sewa col-md-12">
                        <label>Harga Sewa Satuan</label>
                        <input id="harga_sewa" name="harga_sewa" type="text" class="form-control" placeholder="...">
                        <label class="error" for="harga_sewa" id="harga_sewa_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        <label class="vali" for="harga_sewa" id="harga_sewa_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya bisa memasukkan <b>angka</b>.</label>
                      </div>
                      <!--button-->
                      <div class="text-center" style="margin-bottom: 20px;">
                        <button style="margin-right: 10px; display: none;" id="batal_edit" name="button" type="submit" class="btn btn-danger" value="batal"><i class="fa fa-remove"></i> Batal</button>
                        <button style="display: none;" id="tombol_edit" name="button" type="submit" class="btn btn-warning" style="margin-right: 10px;" value="tombol_edit"><i class="fa fa-edit"></i> Edit</button>
                        <button id="tambah" name="button" type="submit" class="btn btn-success" style="margin-right: 10px;" value="tambah"><i class="fa fa-plus"></i> Tambah</button>
                      </div>
                    </div>
                  <!-- Right Form -->
                    <div class="col-md-7">
                      <!-- Table -->
                      <div class="box-body no-padding table-responsive result">
                        <table class="table table-striped">
                          <tr>
                            <th>Nama Alat</th>
                            <th class="col-md-1">Jumlah</th>
                            <th>Harga Sewa Satuan</th>
                            <th>Harga Total</th>
                            <th class="col-md-1" style='text-align: center;'>Hapus</th>
                          </tr>
                          <?php
                          if (count($_SESSION['peminjaman']) != 0) {
                          $peminjaman = $_SESSION['peminjaman'];
                            foreach ($peminjaman as $key => $value) {
                              $total = $value['jumlah']*$value['harga_sewa'];
                              echo "
                              <tr>
                                <td>".$value['nama_alat']."</td>
                                <td style='text-align:center;'><span class='badge bg-blue '>".$value['jumlah']."</span></td>
                                <td>Rp  ".number_format($value['harga_sewa'], 0, ',' , '.' )."</td>
                                <td>Rp  ".number_format($total, 0, ',' , '.' )."</td>
                                <td class='col-md-1' style='text-align: center;' class='col-md-3'>
                                  <div class='btn btn-group-vertical'>
                                    <button data-id=".$value['nama_alat']." class='btn btn-sm btn-flat btn-warning' id='edit'><i class='fa fa-edit'></i></button>
                                    <button data-id=".$value['nama_alat']." class='btn btn-sm btn-flat btn-danger' id='hapus'><i class='fa fa-trash-o'></i></button>
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

                      <!--button-->
                       <div class="box-footer text-center">
                          <button id="ubah" name="button" type="submit" class="btn btn-success" value="ubah"><i class="fa fa-save"></i> Ubah</button>
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
