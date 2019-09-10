<!DOCTYPE html>
<html>
<head>
  <title>RK Studio | Rencana Anggaran Biaya</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
  <style type="text/css" media="print">
    @page { size: landscape; }
  </style>


    <?php
      $pengeluaran_total = $pengeluaran_gaji+$pengeluaran_konsumsi+$pengeluaran_transportasi+$pengeluaran_sewa_alat+$pengeluaran_akomodasi+$pengeluaran_komunikasi+$pengeluaran_cetak+$pengeluaran_habis_pakai+$pengeluaran_marketing+$pengeluaran_lain;

        foreach ($pekerjaan as $pekerjaan_item) {
          $p[$pekerjaan_item['kd_pekerjaan']] = $pekerjaan_item['nama'];
        }
     ?>


  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> RK Studio
          <small class="pull-right"><?php echo date('d/m/Y'); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>

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
      <div class="col-xs-3">
        Pemegang Uang RAB <br>
        Jumlah RAB <br>
        Lokasi Event <br>
        Kota <br>
      </div>

      <div class="col-xs-3">
        <strong class="pemegang_rab"><span class="pemegang_rab_text"><?php echo $pemesanan_view['pemegang_rab']; ?></span></strong><br>
        <strong class="jumlah_rab"><span class="jumlah_rab_text">Rp <?php echo number_format($pemesanan_view['jumlah_rab'], 0, ',' , '.' ); ?></span></strong><br>
        <strong><?php echo $pemesanan_view['lokasi']; ?></strong><br>
        <strong><?php echo $pemesanan_view['kota']; ?></strong><br>
      </div>


      <div class="col-xs-3">
        Client <br>
        Company <br>
        Nama Event <br>
        Tanggal <br>
      </div>
      <!-- /.col -->
      <div class="col-xs-3">
        <strong><?php echo $pemesanan_view['klien']; ?></strong><br>
        <strong><?php echo $pemesanan_view['company']; ?></strong><br>
        <strong><?php echo $pemesanan_view['nama_event']; ?></strong><br>
        <strong><?php echo $tgl; ?></strong><br>
      </div>
    </div>
    <!-- /.row -->
    <br>

    <div class="row">
      <div class="col-xs-12 table-responsive">
        <h3>Pekerjaan</h3>
        <table class="table table-striped">
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
              <td colspan="4" style="text-align: right;">Diskon</td>
              <th>
                <input class="form-control" data-mask-as-number-min="0" data-mask-as-number-max="<?php echo $total_harga_jual ?>" id="diskon" type="hidden" name="diskon" value="<?php echo $pemesanan_view['diskon']; ?>">
                <label style="color: #dd4b39;" class="vali" for="diskon" id="diskon_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                <diskon><span class="diskon_text">Rp <?php echo number_format($pemesanan_view['diskon'], 0, ',' , '.' ); ?></span></diskon>
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
      <div class="col-xs-12 table-responsive">
        <h3>SDM</h3>
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama SDM</th>
            <th>Tanggal</th>
            <th>Pekerjaan1</th>
            <th>Pekerjaan2</th>
            <th>Pekerjaan3</th>
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
      <div class="col-xs-12 table-responsive">
        <h3>Sewa Alat Di Vendor Lain</h3>
        <table class="table table-striped">
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
      <div class="col-xs-12 table-responsive">
        <h3>Pengeluaran Lainnya</h3>
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Pengeluaran</th>
            <th>Keterangan</th>
            <th>Harga</th>
          </tr>
          </thead>
          <tbody>
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

    <div class="row">
        <!-- /.col -->
      <div class=" col-xs-6">
        <!-- <p class="lead">Amount Due 2/22/2014</p> -->

        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
              <th class=" col-xs-6">Harga Jual</th>
              <td class="total_harga_jual">Rp <?php echo number_format($total_harga_jual, 0, ',' , '.' ); ?></td>
            </tr>
            <tr>
              <th>Biaya Oprasional</th>
              <td></td>
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
      <div class=" col-xs-4">
        <h3 style="display: inline; margin-left: 20px;">Fee Penjualan</h3>
        <div class=" col-xs-12 table-responsive">
          <table class="table table-striped">
            <tr>
              <td>%Fee Penjualan</td>
              <th><?php echo $fee.'%'; ?></th>
            </tr>
            <tr>
              <td>Nama Fee Penjualan</td>
              <th><?php echo $pemesanan_view['fee_penjualan']; ?></th>
            </tr>
          </table>
        </div>
        <!-- /.col -->
      </div>
    </div>
    <!-- /.row -->


    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class=" col-xs-12  text-center">
        <a href="#" onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
      </div>
    </div>

  </section>
  <!-- /.content -->

  <div class="clearfix"></div>
  </div>

<script>
		window.print();
	</script>
</body>
</html>
