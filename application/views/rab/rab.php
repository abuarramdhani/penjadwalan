<?php
if ($_SESSION['akses'] == "user") {
  header('location:'.site_url('pemesanan'));
}
  $pengeluaran_total = $pengeluaran_gaji+$pengeluaran_konsumsi+$pengeluaran_transportasi+$pengeluaran_sewa_alat+$pengeluaran_akomodasi+$pengeluaran_komunikasi+$pengeluaran_cetak+$pengeluaran_habis_pakai+$pengeluaran_marketing+$pengeluaran_lain;

    foreach ($pekerjaan as $pekerjaan_item) {
      $p[$pekerjaan_item['kd_pekerjaan']] = $pekerjaan_item['nama'];
    }
 ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rencana Anggaran Biaya
        <small><?php echo $pemesanan_view['nama_event']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Rencana Anggaran Biaya</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> RK Studio <a style="margin-bottom: 10px;" href="<?php echo site_url('pemesanan/ubah/'.$_SESSION['kd_pemesanan'].'?back=rab');?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Ubah</a>
            <small class="pull-right">Date: 2/10/2018</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <?php
      // ubah format tanggal
      $tgl1 = $pemesanan_view['tgl_mulai'];
      $tgl1 = explode("-",$tgl1);
      $d1 = $tgl1['0'];
      $m1 = $tgl1['1'];
      $y1 = $tgl1['2'];
      $tanggal1 = array($y1, $m1, $d1);
      $tgl_mulai = implode("/", $tanggal1);

      $tgl2 = $pemesanan_view['tgl_selesai'];
      $tgl2 = explode("-",$tgl2);
      $d2 = $tgl2['0'];
      $m2 = $tgl2['1'];
      $y2 = $tgl2['2'];
      $tanggal2 = array($y2, $m2, $d2);
      $tgl_selesai = implode("/", $tanggal2);

      $tgl = array($tgl_mulai, $tgl_selesai);
      $tgl = implode(" - ", $tgl);
      ?>
      <div class="row invoice-info">
        <div class="col-xs-12 col-md-8 invoice-col" style="margin-bottom: 20px;">
          <detail>
            <table class="table table-hover">
              <tr>
                <td class="col-xs-6">Pemegang Uang RAB</td>
                <td class="col-xs-6">
                  <strong class="pemegang_rab"><span class="label label-success pemegang_rab_text"><?php echo $pemesanan_view['pemegang_rab']; ?></span></strong>
                  <div class="form-group col-md-10 pemegang_rab_select" style="margin-bottom: 0px;" hidden>
                      <select class="form-control" style="bottom: 0px;" id="pemegang_rab">
                        <?php
                          foreach ($sdm_view as $value) {
                            echo "<option value='".$value['username']."'>".$value['username']."</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-1 pemegang_rab_select" style="bottom: 0px; height: 0px;" hidden>
                      <i style="width: 10%; color: #dd4b39; margin: 0px; height: 100%; vertical-align: middle;" class="fa fa-times-circle batal"></i>
                    </div>
                </td>
              </tr>
              <tr>
                <td class="col-xs-6">Jumlah RAB</td>
                <td class="col-xs-6 result_jumlah_rab">
                  <input class="form-control" id="jumlah_rab" type="hidden" name="jumlah_rab" value="<?php echo $pemesanan_view['jumlah_rab']; ?>">
                  <label style="color: #dd4b39;" class="error" for="jumlah_rab" id="jumlah_rab_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                  <label style="color: #dd4b39;" class="vali" for="jumlah_rab" id="jumlah_rab_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                  <strong class="jumlah_rab"><span class="label label-success jumlah_rab_text">Rp <?php echo number_format($pemesanan_view['jumlah_rab'], 0, ',' , '.' ); ?></span></strong>
                </td>
              </tr>
              <style media="screen">
                .batal:hover, .pemegang_rab:hover, .jumlah_rab:hover, diskon:hover{
                  cursor: pointer;
                }
              </style>
              <tr>
                <td class="col-xs-6">Lokasi Event</td>
                <td class="col-xs-6"><strong><?php echo $pemesanan_view['lokasi']; ?></strong></td>
              </tr>
              <tr>
                <td class="col-xs-6">Kota</td>
                <td class="col-xs-6"><strong><?php echo $pemesanan_view['kota']; ?></strong></td>
              </tr>
              <tr>
                <td class="col-xs-6">Client</td>
                <td class="col-xs-6"><strong><?php echo $pemesanan_view['klien']; ?></strong></td>
              </tr>
              <tr>
                <td class="col-xs-6">Company</td>
                <td class="col-xs-6"><strong><?php echo $pemesanan_view['company']; ?></strong></td>
              </tr>
              <tr>
                <td class="col-xs-6">Nama Event</td>
                <td class="col-xs-6"><strong><?php echo $pemesanan_view['nama_event']; ?></strong></td>
              </tr>
              <tr>
                <td class="col-xs-6">Tanggal</td>
                <td class="col-xs-6"><strong><?php echo $tgl; ?></strong></td>
              </tr>
            </table>
        </div>


        <div class="col-xs-12 col-md-4 invoice-col">
          <detail>
            <table class="table table-hover text-center" style="border: 4px solid #333;">
              <tr>
                <th>Keterangan</th>
              </tr>
              <tr>
                <td><span class="label label-success">Klik untuk mengubah</span></td>
              </tr>
                <!-- <tr>
                  <td><span class="label label-warning">Diisi oleh Wawan</span></td>
                </tr> -->
            </table>
        </div>
        <!-- /.col -->
      </div>
      <br><br>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12 table-responsive">
          <h3 style="display: inline;"> Pekerjaan</h3> <a style="margin-bottom: 10px;" href="<?php echo site_url('pemesanan/ubah_detail/'.$_SESSION['kd_pemesanan'].'?back=rab'); ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Ubah</a>
          <table class="table table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Jenis Pekerjaan</th>
              <th>Keterangan</th>
              <th>Tanggal</th>
              <th>Harga Jual</th>
            </tr>
            </thead>
            <tbody>
              <?php
              $total_harga_jual = 0;
              if (count($detail_pemesanan_view) > 0) {
              $no = 0;
                foreach ($detail_pemesanan_view as $value) {
                $no = $no + 1;
                $total_harga_jual = $total_harga_jual + $value['harga_jual'];
                ?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $value['nama']; ?></td>
                <td><?php echo $value['keterangan']; ?></td>
                <td><?php echo $value['tgl']; ?></td>
                <td>Rp <?php echo number_format($value['harga_jual'], 0, ',' , '.' ); ?></td>
                <tr>
              <?php
                  }
                }
                else {
               ?>
            <tr>
              <td colspan="5" style="text-align: center;">Tidak ada data</td>
            </tr>
            <?php
                }
             ?>

            </tbody>
            <tfooter>
              <tr>
                <td colspan="4" style="text-align: right;">Jika ada diskon</td>
                <th>
                  <input class="form-control" data-mask-as-number-min="0" data-mask-as-number-max="<?php echo $total_harga_jual ?>" id="diskon" type="hidden" name="diskon" value="<?php echo $pemesanan_view['diskon']; ?>">
                  <label style="color: #dd4b39;" class="vali" for="diskon" id="diskon_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                  <diskon><span class="label label-success diskon_text">Rp <?php echo number_format($pemesanan_view['diskon'], 0, ',' , '.' ); ?></span></diskon>
                </th>
              </tr>
              <?php
              $total_harga_jual = $total_harga_jual - $pemesanan_view['diskon'];
              ?>
              <tr>
                <td colspan="4" style="text-align: right;">Total</td>
                <th class="total_harga_jual">Rp <?php echo number_format($total_harga_jual, 0, ',' , '.' ); ?>
                </th>
              </tr>
          </tfooter>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



      <div class="row">
        <div class="col-md-12 table-responsive">
          <h3 style="display: inline;">SDM</h3> <a style="margin-bottom: 10px;" href="<?php echo site_url('proses_pemesanan/pilih_sdm/'.$_SESSION['kd_pemesanan'].'?back=rab');?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Ubah</a>
          <table class="table table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama SDM</th>
              <th>Tanggal</th>
              <th>Pekerjaan 1</th>
              <th>Pekerjaan 2</th>
              <th>Pekerjaan 3</th>
              <th>Uang Makan</th>
              <th>Uang Gaji</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              <?php
              $subtotal_gaji = 0;
              $total_gaji = 0;
              if (count($sdm_event_view) > 0) {
              $no = 0;
                foreach ($sdm_event_view as $value) {
                  $tgl1 = $value['tgl'];
                  $tgl1 = explode("-",$tgl1);
                  $d1 = $tgl1['0'];
                  $m1 = $tgl1['1'];
                  $y1 = $tgl1['2'];
                  $tanggal1 = array($y1, $m1, $d1);
                  $tanggal = implode("-", $tanggal1);

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

                $no = $no + 1;
                $total_gaji = $total_gaji + ($value['uang_makan'] + $value['gaji']);
                $subtotal_gaji = $value['uang_makan'] + $value['gaji'];
                ?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $tanggal; ?></td>
                <td><?php echo $pekerjaan1; ?></td>
                <td><?php echo $pekerjaan2; ?></td>
                <td><?php echo $pekerjaan3; ?></td>
                <td>Rp <?php echo number_format($value['uang_makan'], 0, ',' , '.' ); ?></td>
                <td>Rp <?php echo number_format($value['gaji'], 0, ',' , '.' ); ?></td>
                <td>Rp <?php echo number_format($subtotal_gaji, 0, ',' , '.' ); ?></td>
                <tr>
              <?php
                  }
                }
                else {
               ?>
            <tr>
              <td colspan="9" style="text-align: center;">Tidak ada data</td>
            </tr>
            <?php
                }
             ?>

            </tbody>
            <tfooter>
            <tr>
              <td colspan="8" style="text-align: right;">Total</td>
              <th>Rp <?php echo number_format($total_gaji, 0, ',' , '.' ); ?>
              </th>
            </tr>
          </tfooter>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12 table-responsive">
          <h3 style="display: inline; ">Sewa Alat Di Vendor Lain</h3> <a style="margin-bottom: 10px;" href="<?php echo site_url('proses_pemesanan/pilih_peralatan/'.$_SESSION['kd_pemesanan'].'?back=rab&pemesanan=Alat & Jasa');?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Ubah</a>
          <table class="table table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Alat</th>
              <th class="text-center">Jumlah</th>
              <th class="text-center">Vendor</th>
              <th>Harga</th>
            </tr>
            </thead>
            <tbody>
              <?php
              $total_harga_sewa = 0;
              if (count($alat_sewa_event_view) > 0) {
              $no = 0;
                foreach ($alat_sewa_event_view as $value) {
                $no = $no + 1;
                $total_harga_sewa = $total_harga_sewa + $value['harga'];
                ?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $value['nama']; ?></td>
                <td class="text-center"><?php echo $value['jumlah']; ?></td>
                <td class="text-center"><?php echo $value['vendor']; ?></td>
                <td>Rp <?php echo number_format($value['harga'], 0, ',' , '.' ); ?></td>
                <tr>
              <?php
                  }
                }
                else {
               ?>
            <tr>
              <td colspan="5" style="text-align: center;">Tidak ada data</td>
            </tr>
            <?php
                }
             ?>
            </tbody>
            <tfooter>
            <tr>
              <td colspan="4" style="text-align: right;">Total</td>
              <th>Rp <?php echo number_format($total_harga_sewa, 0, ',' , '.' ); ?>
              </th>
            </tr>
          </tfooter>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12 table-responsive">
          <h3 style="display: inline;">Pengeluaran Lainnya</h3> <a style="margin-bottom: 10px;" href="<?php echo site_url('proses_pemesanan/pilih_pengeluaran/'.$_SESSION['kd_pemesanan'].'?back=rab');?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Ubah</a>
          <table class="table table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Pengeluaran</th>
              <th>Keterangan</th>
              <th>Harga</th>
            </tr>
            </thead>
            <?php
            $total_pengeluaran = 0;
            if (count($pengeluaran_event_view) > 0) {
            $no = 0;
              foreach ($pengeluaran_event_view as $value) {
              $no = $no + 1;
              $total_pengeluaran = $total_pengeluaran + $value['harga'];
              ?>
              <tr>
              <td><?php echo $no ?></td>
              <td><?php echo $value['nama']; ?></td>
              <td><?php echo $value['keterangan']; ?></td>
              <td>Rp <?php echo number_format($value['harga'], 0, ',' , '.' ); ?></td>
              <tr>
            <?php
                }
              }
              else {
             ?>
          <tr>
            <td colspan="4" style="text-align: center;">Tidak ada data</td>
          </tr>
          <?php
              }
           ?>
            </tbody>
            <tfooter>
            <tr>
              <td colspan="3" style="text-align: right;">Total</td>
              <th>Rp <?php echo number_format($total_pengeluaran, 0, ',' , '.' ); ?>
              </th>
            </tr>
          </tfooter>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="col-md-12">
          <div class="box box-warning box-solid collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Fee Penjualan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: none;">
              <div class="form-group">
                  <label>%Fee Penjualan</label>
                  <select class="form-control" id="persen_fee">
                    <option value="">Pilih</option>
                    <option value="5" <?php if ($fee == '5') { echo "selected"; } ?>>5%</option>
                    <option value="8" <?php if ($fee == '8') { echo "selected"; } ?>>8%</option>
                    <option value="10" <?php if ($fee == '10') { echo "selected"; } ?>>10%</option>
                  </select>
                </div>
                <div class="form-group">
                    <label>Nama Fee Penjualan</label>
                    <select style="width: 100%;" class="form-control select2" id="nama_fee">
                      <option value="">Pilih</option>
                      <?php foreach ($pegawai_view as $value) { ?>
                      <option value="<?php echo $value['username']; ?>" <?php if ($pemesanan_view['fee_penjualan'] == $value['username']) { echo "selected"; } ?> ><?php echo $value['username']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      <div class="row">
          <!-- /.col -->
        <div class="col-md-6">
          <!-- <p class="lead">Amount Due 2/22/2014</p> -->

          <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th class="col-md-6">Harga Jual</th>
                <td class="total_harga_jual">Rp <?php echo number_format($total_harga_jual, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <th>Biaya Oprasional</th>
              </tr>
              <tr>
                <td style="padding-left: 30px;">511.Biaya OPS - Gaji</td>
                <td>Rp <?php echo number_format($pengeluaran_gaji, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="padding-left: 30px;">512.Biaya OPS - Konsumsi</td>
                <td>Rp <?php echo number_format($pengeluaran_konsumsi, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="padding-left: 30px;">513.Biaya OPS - Transportasi</td>
                <td>Rp <?php echo number_format($pengeluaran_transportasi, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="padding-left: 30px;">514.Biaya OPS - Sewa Alat</td>
                <td>Rp <?php echo number_format($pengeluaran_sewa_alat, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="padding-left: 30px;">515.Biaya OPS - Akomodasi</td>
                <td>Rp <?php echo number_format($pengeluaran_akomodasi, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="padding-left: 30px;">516.Biaya OPS - Komunikasi</td>
                <td>Rp <?php echo number_format($pengeluaran_komunikasi, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="padding-left: 30px;">517.Biaya OPS - Cetak</td>
                <td>Rp <?php echo number_format($pengeluaran_cetak, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="padding-left: 30px;">518.Biaya OPS - Habis Pakai</td>
                <td>Rp <?php echo number_format($pengeluaran_habis_pakai, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="padding-left: 30px;">519.Biaya OPS - Marketing</td>
                <td>Rp <?php echo number_format($pengeluaran_marketing, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="padding-left: 30px;">529.Biaya OPS - Lain-lain</td>
                <td>Rp <?php echo number_format($pengeluaran_lain, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="text-align:center;">Total</td>
                <td style="border-top: 2px #333 solid;" class="pengeluaran_total">Rp <?php echo number_format($pengeluaran_total, 0, ',' , '.' ); ?></td>
              </tr>
              <!-- Laba Kotor -->
              <?php
                $laba_kotor = 0;
                $laba_kotor = $total_harga_jual - $pengeluaran_total;
               ?>
              <tr>
                <th>Laba Kotor</th>
                <td class="laba_kotor">Rp <?php echo number_format($laba_kotor, 0, ',' , '.' ); ?></td>
              </tr>
              <tr>
                <td style="padding-left: 30px;">520.Biaya OPS - Fee Penjualan</td>
                <td class="pengeluaran_fee_penjualan">Rp <?php echo number_format($pengeluaran_fee_penjualan, 0, ',' , '.' ); ?></td>
              </tr>
              <?php
                $laba_bersih = 0;
                $laba_bersih = $laba_kotor - $pengeluaran_fee_penjualan;
               ?>
              <tr>
                <th>Laba Bersih</th>
                <th class="laba_bersih">Rp <?php echo number_format($laba_bersih, 0, ',' , '.' ); ?>&nbsp;&nbsp;&nbsp;&nbsp;<i class="<?php if ($laba_bersih < 0) { echo 'fa fa-times'; } ?> defisit" style="color: #dd4b39;"></i></th>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-md-12  text-center">
          <a href="<?php echo site_url('rab/print/'.$_SESSION['kd_pemesanan']); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
