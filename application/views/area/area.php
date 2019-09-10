<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->

  <!-- /.content -->
  <!-- button periksa ketersediaan -->
    <div class="btn ">
      <a href="<?php echo site_url('area/tambah'); ?>" class="btn-block btn-primary btn-lg fa fa-plus">
         <b>Tambah Data</b>
       </a>
    </div>

  <!-- /.col -->
  <div class="col-md-12">

        <div class="row">
          <div class="col-xs-12">


              <!-- /.box-header -->
              <div class="box">
              <div class="box-body table-responsive no-padding">
                  <div class="box-header">
                    <h3 class="box-title">Data Area</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body result">
                    <table id="tabel" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <!-- <th class="col-md-1">Kode</th> -->
                        <th>Nama</th>
                        <th>Uang Makan</th>
                        <th class="col-md-1">Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($area_view as $area_item) { ?>
                        <tr>
                        <!-- <td><?php //echo $area_item['kd_area']; ?></td> -->
                         <!--trnsfer dta ke modal-->
                        <td><a href="#" data-toggle="modal" data-target="#modal-area"
                          data-1="<?php echo $area_item['kd_area']; ?>"
                          data-2="<?php echo $area_item['nama']; ?>"
                          data-3="<?php echo "Rp ".number_format($area_item['uang_makan'], 0, ',' , '.' ); ?>"
                          data-4="<?php echo $area_item['status']; ?>"
                          data-5="<?php echo $area_item['tambah']; ?>"
                          data-6="<?php echo $area_item['waktu_tambah']; ?>"
                          data-7="<?php echo $area_item['ubah']; ?>"
                          data-8="<?php echo $area_item['waktu_ubah']; ?>"
                          ><?php echo $area_item['nama']; ?></a></td>

                        <td><?php echo "Rp ".number_format($area_item['uang_makan'], 0, ',' , '.' ); ?></td>
                        <td><?php echo $area_item['status']; ?></td>
                        <td style="width: 70px;">
                          <div class="btn-group-vertical">
                            <a href="<?php echo site_url('area/ubah/'.$area_item['kd_area']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='area' data-controller='area' data-kode="<?php echo $area_item['kd_area']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <!-- <th>Kode</th> -->
                        <th>Nama</th>
                        <th>Uang Makan</th>
                        <th>Status</th>
                        <th>Action</th>
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
<!-- /.content-wrapper -->
</section>
