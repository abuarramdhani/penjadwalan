<?php
//notif
if (isset($_GET['notif_pengembalian']) && $_GET['notif_pengembalian'] <> "" && isset($_GET['alert_pengembalian']) && $_GET['alert_pengembalian'] <> "" && isset($_GET['logo_notif_pengembalian']) && $_GET['logo_notif_pengembalian'] <> "") {
  $notif = $_GET['notif_pengembalian'];
  $alert = $_GET['alert_pengembalian'];
  $logo  = $_GET['logo_notif_pengembalian'];
  echo "
  <div id='notif' class='col-xs-12'>
    <div class='alert alert-".$alert."'>
    <p style='text-align: center;'><i class='fa fa-".$logo."'></i> ".$notif."</p>
    </div>
  </div>

  ";
}
?>
<style media="screen">
  #notif{
    display: none;
    z-index: 100000;
    margin-top: 4%;
    position: fixed;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengembalian
      <small>Data Master</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Pengembalian</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
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
              <div class="box-body table-responsive no-padding">
                  <div class="box-header">
                    <h3 class="box-title">Data Pengembalian</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="tabel" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Kode Peminjaman</th>
                        <th>Vendor</th>
                        <th>Tanggal Pengembalian</th>
                      </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($pengembalian_view as $pengembalian_item) { ?>
                        <tr>
                        <td><?php echo $pengembalian_item['kd_pengembalian_vendor']; ?></td>
                        <?php
                        //ubah format tanggal
                        $tgl1 = $pengembalian_item['tgl'];
                        $tgl1 = explode("-",$tgl1);
                        $d1 = $tgl1['0'];
                        $m1 = $tgl1['1'];
                        $y1 = $tgl1['2'];
                        $tanggal1 = array($y1, $m1, $d1);
                        $tgl = implode("-", $tanggal1);
                        ?>
                         <!--trnsfer dta ke modal-->
                        <td><a href="#" data-toggle="modal" data-target="#modal-pengembalian_vendor"
                          data-1="<?php echo  $pengembalian_item['kd_pengembalian_vendor'];?>"
                          data-2="<?php echo $pengembalian_item['kd_peminjaman']; ?>"
                          data-3="<?php echo $pengembalian_item['vendor']; ?>"
                          data-4="<?php echo $tgl; ?>"
                          ><?php echo $pengembalian_item['kd_peminjaman']; ?></a></td>

                        <td><?php echo $pengembalian_item['vendor']; ?></td>
                        <td><?php echo $tgl; ?></td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Kode</th>
                        <th>Kode Peminjaman</th>
                        <th>Vendor</th>
                        <th>Tanggal Pengembalian</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- /.content-wrapper -->
</section>
