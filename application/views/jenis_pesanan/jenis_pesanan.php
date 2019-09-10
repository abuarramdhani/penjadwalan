<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Jenis Pesanan
      <small>Data Master</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Jenis Pesanan</li>
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
      <a href="<?php echo site_url('jenis_pesanan/tambah'); ?>" class="btn-block btn-primary btn-lg fa fa-plus">
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
                    <h3 class="box-title">Data Jenis Pesanan</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body result">
                    <table id="tabel" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <!-- <th class="col-md-1">Kode</th> -->
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($jenis_pesanan_view as $jenis_pesanan_item) { ?>
                        <tr>
                        <!-- <td><?php// echo $jenis_pesanan_item['kd_jenis_pesanan']; ?></td> -->
                         <!--trnsfer dta ke modal-->
                        <td><a href="#" data-toggle="modal" data-target="#modal-jenis_pesanan"
                          data-1="<?php echo $jenis_pesanan_item['kd_jenis_pesanan']; ?>"
                          data-2="<?php echo $jenis_pesanan_item['nama']; ?>"
                          data-3="<?php echo $jenis_pesanan_item['status']; ?>"
                          data-4="<?php echo $jenis_pesanan_item['tambah']; ?>"
                          data-5="<?php echo $jenis_pesanan_item['waktu_tambah']; ?>"
                          data-6="<?php echo $jenis_pesanan_item['ubah']; ?>"
                          data-7="<?php echo $jenis_pesanan_item['waktu_ubah']; ?>"
                          ><?php echo $jenis_pesanan_item['nama']; ?></a></td>
                        <td><?php echo $jenis_pesanan_item['status']; ?></td>
                        <td style="width: 70px;">
                          <div class="btn-group-vertical">
                            <a href="<?php echo site_url('jenis_pesanan/ubah/'.$jenis_pesanan_item['kd_jenis_pesanan']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='jenis pesanan' data-controller='jenis_pesanan' data-kode="<?php echo $jenis_pesanan_item['kd_jenis_pesanan']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <!-- <th>Kode</th> -->
                        <th>Nama</th>
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
