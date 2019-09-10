<?php
    foreach ($pekerjaan as $pekerjaan_item) {
      $p[$pekerjaan_item['kd_pekerjaan']] = $pekerjaan_item['nama'];
    }
 ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pekerjaan Saya
        <small><?php echo $_SESSION['ses_id']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pekerjaan Saya</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">

      <?php   if (count($sdm_event_view) > 0) { ?>
      <!-- title row -->
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> RK Studio
            <small class="pull-right">Date: <?php echo date('d/m/Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
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

        <div class="col-xs-12 col-md-6 invoice-col">
          <detail>
            <table class="table table-hover">
              <tr>
                <td class="col-xs-6">Client</td>
                <td class="col-xs-6"><strong><?php echo $pemesanan_view['klien']; ?></strong></td>
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
          </detail>
        </div>
        <div class="col-xs-12 col-md-6 invoice-col" style="margin-bottom: 30px;">
          <detail>
            <table class="table table-hover">
              <tr>
                <td class="col-xs-6">Lokasi Event</td>
                <td class="col-xs-6"><strong><?php echo $pemesanan_view['lokasi']; ?></strong></td>
              </tr>
              <tr>
                <td class="col-xs-6">Kota</td>
                <td class="col-xs-6"><strong><?php echo $pemesanan_view['kota']; ?></strong></td>
              </tr>
            </table>
          </detail>
        </div>
        <!-- /.col -->
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-12 table-responsive">
          <h3>Pekerjaan Saya <span class="label label-success"><?php echo $_SESSION['ses_id'] ?></span></h3>
          <table class="table table-hover">
            <thead>
            <tr>
              <th>No</th>
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

              $no = 0;
                foreach ($sdm_event_view as $value) {

                  if ($value['pekerjaan1'] == "-" || $value['pekerjaan1'] == "") {
                    $pekerjaan1 = "-";
                  }
                  else {
                    $pekerjaan1 = $p[$value['pekerjaan1']];
                  }
                  if ($value['pekerjaan2'] == "-" || $value['pekerjaan2'] == "") {
                    $pekerjaan2 = "-";
                  }
                  else {
                    $pekerjaan2 = $p[$value['pekerjaan2']];
                  }
                  if ($value['pekerjaan3'] == "-" || $value['pekerjaan3'] == "") {
                    $pekerjaan3 = "-";
                  }
                  else {
                    $pekerjaan3 = $p[$value['pekerjaan3']];
                  }
                  if ($value['tgl'] == "") {
                    $tanggal = "-";
                  }
                  else {
                    $tgl1 = $value['tgl'];
                    $tgl1 = explode("-",$tgl1);
                    $d1 = $tgl1['0'];
                    $m1 = $tgl1['1'];
                    $y1 = $tgl1['2'];
                    $tanggal1 = array($y1, $m1, $d1);
                    $tanggal = implode("-", $tanggal1);
                  }

                $no = $no + 1;
                $total_gaji = $total_gaji + ($value['uang_makan'] + $value['gaji']);
                $subtotal_gaji = $value['uang_makan'] + $value['gaji'];
                ?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $tanggal; ?></td>
                <td><?php echo $pekerjaan1; ?></td>
                <td><?php echo $pekerjaan2; ?></td>
                <td><?php echo $pekerjaan3; ?></td>
                <?php if ($value['uang_makan'] == "0"): ?>
                  <td>-</td>
                <?php endif; ?>
                <?php if ($value['uang_makan'] != "0"): ?>
                  <td>Rp <?php echo number_format($value['uang_makan'], 2, ',' , '.' ); ?></td>
                <?php endif; ?>
                <td>Rp <?php echo number_format($value['gaji'], 2, ',' , '.' ); ?></td>
                <td>Rp <?php echo number_format($subtotal_gaji, 2, ',' , '.' ); ?></td>
                <tr>
              <?php
                  }
               ?>
            </tbody>
            <tfooter>
            <tr>
              <td colspan="7" style="text-align: right;">Total</td>
              <th>Rp <?php echo number_format($total_gaji, 2, ',' , '.' ); ?>
              </th>
            </tr>
          </tfooter>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <?php
    }
    else {
      ?>
      <div class="row">
        <div class="text-center">
          <h3>Maaf, anda tidak memiliki pekerjaan dalam event ini.</h1>
        </div>
      </div>
      <?php
    }
     ?>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
