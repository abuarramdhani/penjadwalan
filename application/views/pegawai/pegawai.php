<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pegawai
      <small>Data Master</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Pegawai</li>
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
      <a href="<?php echo site_url('pegawai/tambah'); ?>" class="btn-block btn-primary btn-lg fa fa-plus">
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
                    <h3 class="box-title">Data Pegawai</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body result">
                    <table id="tabel" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Jabatan</th>
                        <th>Status Pegawai</th>
                        <th class="col-md-1">Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($pegawai_view as $pegawai_item) { ?>
                        <tr>
                        <?php
                        //ubah format tanggal
                        $tgl = $pegawai_item['mulai_kerja'];
                        $tgl = explode("-",$tgl);
                        $d = $tgl['0'];
                        $m = $tgl['1'];
                        $y = $tgl['2'];
                        $tanggal = array($y, $m, $d);
                        $mulai_kerja = implode("-", $tanggal);
                        ?>
                         <!--trnsfer dta ke modal-->
                        <td><a href="#" data-toggle="modal" data-target="#modal-pegawai"
                          data-1="<?php echo $pegawai_item['username']; ?>"
                          data-2="<?php echo $pegawai_item['nama']; ?>"
                          data-3="<?php echo $pegawai_item['jabatan']; ?>"
                          data-4="<?php echo $mulai_kerja; ?>"
                          data-5="<?php echo $pegawai_item['no_hp']; ?>"
                          data-6="<?php echo $pegawai_item['alamat']; ?>"
                          data-7="<?php echo $pegawai_item['email']; ?>"
                          data-8="<?php echo $pegawai_item['npwp']; ?>"
                          data-9="<?php echo $pegawai_item['status_pegawai']; ?>"
                          data-10="<?php echo $pegawai_item['status_user']; ?>"
                          data-11="<?php echo $pegawai_item['status']; ?>"
                          data-12="<?php echo $pegawai_item['tambah']; ?>"
                          data-13="<?php echo $pegawai_item['waktu_tambah']; ?>"
                          data-14="<?php echo $pegawai_item['ubah']; ?>"
                          data-15="<?php echo $pegawai_item['waktu_ubah']; ?>"
                          ><?php echo $pegawai_item['username']; ?></a></td>

                        <td><?php echo $pegawai_item['nama']; ?></td>
                        <td><?php echo $pegawai_item['no_hp']; ?></td>
                        <td><?php echo $pegawai_item['jabatan']; ?></td>
                        <td><?php echo $pegawai_item['status_pegawai']; ?></td>
                        <td><?php echo $pegawai_item['status']; ?></td>
                        <td style="width: 70px;">
                          <div class="btn-group-vertical">
                            <a href="<?php echo site_url('pegawai/ubah/'.$pegawai_item['username']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='pegawai' data-controller='pegawai' data-kode="<?php echo $pegawai_item['username']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Jabatan</th>
                        <th>Status Pegawai</th>
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
