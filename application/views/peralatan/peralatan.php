<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Peralatan
      <small>Data Master</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Peralatan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
  <!-- button -->
    <div class="btn ">
      <a href="<?php echo site_url('peralatan/tambah'); ?>" class="btn-block btn-primary btn-lg fa fa-plus">
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
                    <h3 class="box-title">Data Peralatan</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body result">
                    <table id="tabel" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Merk</th>
                        <th>Kategori</th>
                        <th>Tipe</th>
                        <th class="col-md-1">Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($peralatan_view as $peralatan_item) { ?>
                        <tr>
                         <!--trnsfer dta ke modal-->
                        <td><a href="#" data-toggle="modal" data-target="#modal-peralatan"
                          data-1="<?php echo $peralatan_item['kd_peralatan']; ?>"
                          data-2="<?php echo $peralatan_item['merk']; ?>"
                          data-3="<?php echo $peralatan_item['kategori']; ?>"
                          data-4="<?php echo $peralatan_item['tipe']; ?>"
                          data-5="<?php echo $peralatan_item['status']; ?>"
                          data-6="<?php echo $peralatan_item['tambah']; ?>"
                          data-7="<?php echo $peralatan_item['waktu_tambah']; ?>"
                          data-8="<?php echo $peralatan_item['ubah']; ?>"
                          data-9="<?php echo $peralatan_item['waktu_ubah']; ?>"
                          ><?php echo $peralatan_item['kd_peralatan']; ?></a></td>

                        <td><?php echo $peralatan_item['merk']; ?></td>
                        <td><?php echo $peralatan_item['kategori']; ?></td>
                        <td><?php echo $peralatan_item['tipe']; ?></td>
                        <td><?php echo $peralatan_item['status']; ?></td>
                        <td style="width: 70px;">
                          <div class="btn-group-vertical">
                            <a href="<?php echo site_url('peralatan/ubah/'.$peralatan_item['kd_peralatan']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='peralatan' data-controller='peralatan' data-kode="<?php echo $peralatan_item['kd_peralatan']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Kode</th>
                        <th>Merk</th>
                        <th>Kategori</th>
                        <th>Tipe</th>
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
