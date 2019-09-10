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
      <li class="active">Tipe</li>
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
      <a href="<?php echo site_url('tipe/tambah'); ?>" class="btn-block btn-primary btn-lg fa fa-plus">
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
                    <h3 class="box-title">Data Tipe</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body result">
                    <table id="tabel" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <!-- <th class="col-md-1">Kode</th> -->
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Kategori</th>
                        <th class="col-md-1">Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($tipe_view as $tipe_item) { ?>
                        <tr>
                        <!-- <td><?php //echo $tipe_item['kd_tipe']; ?></td> -->
                         <!--trnsfer dta ke modal-->
                        <td><a href="#" data-toggle="modal" data-target="#modal-tipe"
                          data-1="<?php echo $tipe_item['kd_tipe']; ?>"
                          data-2="<?php echo $tipe_item['nama']; ?>"
                          data-3="<?php echo $tipe_item['merk']; ?>"
                          data-4="<?php echo $tipe_item['kategori']; ?>"
                          data-5="<?php echo $tipe_item['status']; ?>"
                          data-6="<?php echo $tipe_item['tambah']; ?>"
                          data-7="<?php echo $tipe_item['waktu_tambah']; ?>"
                          data-8="<?php echo $tipe_item['ubah']; ?>"
                          data-9="<?php echo $tipe_item['waktu_ubah']; ?>"
                          ><?php echo $tipe_item['nama']; ?></a></td>

                        <td><?php echo $tipe_item['merk']; ?></td>
                        <td><?php echo $tipe_item['kategori']; ?></td>
                        <td><?php echo $tipe_item['status']; ?></td>
                        <td style="width: 70px;">
                          <div class="btn-group-vertical">
                            <a href="<?php echo site_url('tipe/ubah/'.$tipe_item['kd_tipe']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='tipe' data-controller='tipe' data-kode="<?php echo $tipe_item['kd_tipe']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <!-- <th>Kode</th> -->
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Kategori</th>
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
