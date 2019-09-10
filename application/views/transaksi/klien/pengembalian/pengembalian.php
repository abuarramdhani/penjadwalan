3<!-- Content Wrapper. Contains page content -->
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
                        <th>Kode Pemesanan</th>
                        <th>Klien</th>
                        <th>Tanggal Pengembalian</th>
                      </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($pengembalian_view as $pengembalian_item) { ?>
                        <tr>
                        <td><?php echo $pengembalian_item['kd_pengembalian_klien']; ?></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#modal-pengembalian_klien"
                          data-1="<?php echo  $pengembalian_item['kd_pengembalian_klien'];?>"
                          data-2="<?php echo $pengembalian_item['kd_pemesanan']; ?>"
                          data-3="<?php echo $pengembalian_item['klien']; ?>"
                          data-4="<?php echo $tgl; ?>"
                          data-5="<?php echo $pengembalian_item['tambah']; ?>"
                          data-6="<?php echo $pengembalian_item['waktu_tambah']; ?>"
                          ><?php echo $pengembalian_item['kd_pemesanan']; ?></a></td>

                        <td><?php echo $pengembalian_item['klien']; ?></td>
                        <td><?php echo $tgl; ?></td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Kode</th>
                        <th>Kode Pemesanan</th>
                        <th>Klien</th>
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
</section>
</div>
<!-- /.content-wrapper -->
