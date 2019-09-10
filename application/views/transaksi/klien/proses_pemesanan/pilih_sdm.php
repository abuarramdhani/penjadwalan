<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <?php
  // $driver = array();
  //
  // $b = $_SESSION['proses_sdm'];
  // $a = count($b);
  // $proses = $_SESSION['proses_sdm'];
  // foreach ($proses as $key => $value) {
  //   $cek = array_search('2', $value);
  //   if (strlen($cek) != 0) {
  //     $driver[] = array(
  //       'kunci' => $key,
  //       'kd_pemesanan' => $value['kd_pemesanan'],
  //       'username' => $value['username'],
  //       'pekerjaan1' => $value['pekerjaan1'],
  //       'pekerjaan2' => $value['pekerjaan2'],
  //       'pekerjaan3' => $value['pekerjaan3'],
  //       'gaji' => $value['gaji'],
  //       'uang_makan' => $value['uang_makan'],
  //       'tgl' => $value['tgl'],
  //       'cek' => $value['cek']
  //     );
  //   }
  // }
  //
  // foreach ($driver as $key => $value) {
  //   unset($_SESSION['proses_sdm'][$value['kunci']]);
  // }





   ?>


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SDM Event <small>Proses Pemesanan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li >Proses Pemesanan</li>
      <li class="active">Pilih Data</li>
    </ol>
  </section>
<?php
foreach ($pekerjaan_view2 as $pekerjaan_item2) {
  $p[$pekerjaan_item2['kd_pekerjaan']] = $pekerjaan_item2['nama'];
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


                  <!-- Left Form -->
                    <div class="col-md-6">
                      <!-- select -->
                      <div class="form-group username col-md-12">
                        <label>SDM</label>
                        <select id="username" name="username" class="form-control select2" style="width: 100%;">
                          <?php foreach ($sdm_view as $sdm_item) { ?>
                          <option value="<?php echo $sdm_item['username']." || ".$sdm_item['status_pegawai']; ?>" ><?php echo $sdm_item['username']." - ".$sdm_item['status_pegawai']; ?></option>
                         <?php } ?>
                        </select>
                        <label for="cek" id="username_cek" hidden><i class="fa fa-times-circle-o"></i> Tidak boleh menginputkan SDM dengan tanggal yang sama lebih dari sekali.</label>
                      </div>

                      <!-- select -->
                      <div class="form-group pekerjaan1 col-md-12">
                        <label>Pekerjaan 1</label>
                        <select id="pekerjaan1" name="pekerjaan1" class="form-control select2" style="width: 100%;">
                          <option value="- || 0 || 0">Pilih Pekerjaan 1</option>
                          <?php foreach ($pekerjaan_view as $pekerjaan_item) { ?>
                          <?php
                          $gaji = $pekerjaan_item['gaji'];
                          $magang = $pekerjaan_item['gaji_magang'];
                          $m = $gaji*$magang/100;

                          $ribuan = substr($m, -3);
                          if ($ribuan != "000") {
                            $gaji_magang = $m + (1000-$ribuan);
                          }
                          else {
                            $gaji_magang = $m;
                          }
                           ?>
                          <option value="<?php echo $pekerjaan_item['kd_pekerjaan']." || ".$gaji." || ".$gaji_magang; ?>" ><?php echo $pekerjaan_item['nama']; ?></option>
                         <?php } ?>
                        </select>
                        <label for="error" id="pekerjaan1_error" hidden><i class="fa fa-times-circle-o"></i> Minimal pilih satu pekerjaan.</label>
                        <label for="cek" id="pekerjaan1_cek" hidden><i class="fa fa-times-circle-o"></i> Tidak boleh ada pekerjaan yang sama dalam satu hari.</label>
                      </div>

                      <!-- select -->
                      <div class="form-group pekerjaan2 col-md-12">
                        <label>Pekerjaan 2</label>
                        <select id="pekerjaan2" name="pekerjaan2" class="form-control select2" style="width: 100%;">
                          <option value="- || 0 || 0">Pilih Pekerjaan 2</option>
                          <?php foreach ($pekerjaan_view as $pekerjaan_item) { ?>
                          <?php
                          $gaji = $pekerjaan_item['gaji'];
                          $magang = $pekerjaan_item['gaji_magang'];
                          $m = $gaji*$magang/100;

                          $ribuan = substr($m, -3);
                          if ($ribuan != "000") {
                            $gaji_magang = $m + (1000-$ribuan);
                          }
                          else {
                            $gaji_magang = $m;
                          }
                           ?>
                          <option value="<?php echo $pekerjaan_item['kd_pekerjaan']." || ".$gaji." || ".$gaji_magang; ?>" ><?php echo $pekerjaan_item['nama']; ?></option>
                         <?php } ?>
                        </select>
                        <label for="error" id="pekerjaan2_error" hidden><i class="fa fa-times-circle-o"></i> Minimal pilih satu pekerjaan.</label>
                        <label for="cek" id="pekerjaan2_cek" hidden><i class="fa fa-times-circle-o"></i> Tidak boleh ada pekerjaan yang sama dalam satu hari.</label>
                      </div>

                      <!-- select -->
                      <div class="form-group pekerjaan3 col-md-12">
                        <label>Pekerjaan 3</label>
                        <select id="pekerjaan3" name="pekerjaan3" class="form-control select2" style="width: 100%;">
                          <option value="- || 0 || 0">Pilih Pekerjaan 3</option>
                          <?php foreach ($pekerjaan_view as $pekerjaan_item) { ?>
                          <?php
                          $gaji = $pekerjaan_item['gaji'];
                          $magang = $pekerjaan_item['gaji_magang'];
                          $m = $gaji*$magang/100;

                          $ribuan = substr($m, -3);
                          if ($ribuan != "000") {
                            $gaji_magang = $m + (1000-$ribuan);
                          }
                          else {
                            $gaji_magang = $m;
                          }
                           ?>
                          <option value="<?php echo $pekerjaan_item['kd_pekerjaan']." || ".$gaji." || ".$gaji_magang; ?>" ><?php echo $pekerjaan_item['nama']; ?></option>
                         <?php } ?>
                        </select>
                        <label for="error" id="pekerjaan3_error" hidden><i class="fa fa-times-circle-o"></i> Minimal pilih satu pekerjaan.</label>
                        <label for="cek" id="pekerjaan3_cek" hidden><i class="fa fa-times-circle-o"></i> Tidak boleh ada pekerjaan yang sama dalam satu hari.</label>
                      </div>

                      <!-- text input -->
                      <div class="form-group gaji col-md-12">
                        <label>Gaji</label>
                        <input id="gaji" name="gaji" type="text" value="0" class="form-control angkaSaja" placeholder="...">
                        <label class="error" for="gaji" id="gaji_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        <label class="vali" for="gaji" id="gaji_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                      </div>

                      <!-- text input -->
                      <div class="form-group uang_makan col-md-12">
                        <label>Uang Makan</label>
                        <input id="uang_makan" name="uang_makan" type="text" class="form-control angkaSaja" placeholder="..." disabled>
                        <label class="error" for="uang_makan" id="uang_makan_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                        <label class="vali" for="uang_makan" id="uang_makan_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                      </div>

                    </div>
                  <!-- Right Form -->
                    <div class="col-md-6">
                      <!-- checkbox -->
                      <div class="form-group col-md-12 tgl">
                        <label>Tanggal Pekerjaan</label>
                      </div>
                      <div class="form-group tgl col-md-12">
                          <?php
                          $tgl = $tanggal;
                           for ($i=1; $i <= $indeks; $i++) {?>
                            <div class="col-md-12 col-md-12">
                              <div class="radio">
                                <label>
                                  <input id="tgl" type="radio" name="tgl" value="<?php echo $tgl; ?>" >
                                  <?php echo $tgl." <b>(Hari ".$i.")</b>"; ?>
                                </label>
                              </div>
                            </div>
                            <?php $tgl = date('d-m-Y', strtotime('+'.$i.' days', strtotime($tanggal))); //operasi penjumlahan tanggal ?>
                          <?php } ?>
                          <label class="error" for="tgl" id="tgl_error" hidden><i class="fa fa-times-circle-o"></i> Pilih salah satu.</label>
                      </div>
                    </div>
                    <!--button-->
                    <div class="form-group col-md-12 col-md-12">
                      <div class="text-center">
                        <button style="margin-right: 10px; display: none;" id="batal_edit" name="button" type="submit" class="btn btn-danger" value="batal"><i class="fa fa-remove"></i> Batal</button>
                        <button style="display: none;" id="tombol_edit" name="button" type="submit" class="btn btn-warning" style="margin-right: 10px;" value="tombol_edit"><i class="fa fa-edit"></i> Edit</button>
                        <button id="tambah" name="button" type="submit" class="btn btn-success" style="margin-right: 10px;" value="tambah"><i class="fa fa-plus"></i> Tambah</button>
                      </div>
                    </div>
                    <!-- Table -->
                    <div class="col-md-12">
                    <div class="box-body table-responsive no-padding">
                      <div class="result">
                        <table id="tabel" class="table table-hover">
                          <tr>
                            <th class='rab rabh text-center'>Pemegang Uang RAB</th>
                            <th>SDM</th>
                            <th>Pekerjaan 1</th>
                            <th>Pekerjaan 2</th>
                            <th>Pekerjaan 3</th>
                            <th>Gaji</th>
                            <th>Uang Makan</th>
                            <th>Tanggal</th>
                            <th style='text-align: center;'  class='col-md-1'>Action</th>
                          </tr>
                          <?php
                          if (count($_SESSION['proses_sdm']) != 0) {
                          $proses = $_SESSION['proses_sdm'];
                            foreach ($proses as $key => $value) {
                              if ($value['pekerjaan1'] == "-") {
                                $pekerjaan1 = "-";
                              }
                              else {
                                $pekerjaan1 = $p[$value['pekerjaan1']];
                              }
                              if ($value['pekerjaan2'] == "-") {
                                $pekerjaan2 = "-";
                              }
                              else {
                                $pekerjaan2 = $p[$value['pekerjaan2']];
                              }
                              if ($value['pekerjaan3'] == "-") {
                                $pekerjaan3 = "-";
                              }
                              else {
                                $pekerjaan3 = $p[$value['pekerjaan3']];
                              }
                              echo "
                              <tr>
                                <td class='rab rabd text-center'><input id='rab' type='radio' name='rab' value=".$value['username']."></td>
                                <td>".$value['username']."</span></td>
                                <td>".$pekerjaan1."</span></td>
                                <td>".$pekerjaan2."</span></td>
                                <td>".$pekerjaan3."</span></td>
                                <td>Rp ".number_format($value['gaji'], 0, ',' , '.' )."</span></td>
                                <td>Rp ".number_format($value['uang_makan'], 0, ',' , '.' )."</span></td>
                                <td>".$value['tgl']."</span></td>
                                <td style='text-align: center;'>
                                  <div class='btn-group-vertical'>
                                    <button data-id='".$key."' data-tes='".$value['cek']."' class='btn btn-sm btn-flat btn-warning' id='edit'><i class='fa fa-edit'></i></button>
                                    <button data-id='".$key."' class='btn btn-sm btn-flat btn-danger' id='hapus'><i class='fa fa-trash-o'></i></button>
                                  </div>
                                </td>
                              </tr>
                              ";
                            }
                          }
                          else {
                            echo "<td colspan='8' style='text-align:center;'>Belum ada Data</td>";
                          }
                          ?>
                        </table>
                        <label class="error" style="color: #d73925;" for="error" id="rab_error" hidden><i class="fa fa-times-circle-o"></i> Pilih salah satu pemegang RAB.</label>
                      </div>
                      </div>

                      <!--button-->
                        <div class="box-footer text-center">
                          <div class="col-md-12" style="margin-top: 30px;">
                          <button id="batal" style="margin-right: 5px;" name="button" type="submit" class="btn btn-danger" value="batal"><i class="fa fa-remove"></i> Batal</button>
                          <button id="pilih" name="button" type="submit" class="btn btn-success" value="pilih" ><i class="fa fa-save"></i> Simpan</button>
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
