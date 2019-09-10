<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>

    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <!-- small box -->
        <a href="<?php echo site_url('ketersediaan'); ?>">
        <div class="small-box bg-green">
          <div class="inner">
            <h2 style="margin-top: 0px;">Periksa Ketersediaan</h2>

            <p>SDM dan Peralatan</p>
          </div>
          <div class="icon" style="margin-bottom: 10px;">
            <i class="ion ion-calendar"></i>
          </div>
        </div>
      </a>
      </div>
      <!-- ./col -->
      <div class="col-md-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo site_url('pemesanan/tambah'); ?>">
        <div class="small-box bg-red">
          <div class="inner">
            <h2 style="margin-top: 0px;">Input Pesanan</h2>

            <p>Event Baru</p>
          </div>
          <div class="icon">
            <i class="ion ion-plus"></i>
          </div>
        </div>
      </a>
      </div>
      <div class="col-md-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo site_url('pemesanan2/tambah'); ?>">
        <div class="small-box bg-blue">
          <div class="inner">
            <h2 style="margin-top: 0px;">Input Pesanan</h2>

            <p>Rental Alat</p>
          </div>
          <div class="icon">
            <i class="ion ion-plus"></i>
          </div>
        </div>
      </a>
      </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->

  <!-- /.content -->

  <!-- /.col -->
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body no-padding">
        <!-- THE CALENDAR -->
        <div id="calendar"></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /. box -->
  </div>
</div>
<!-- /.content-wrapper -->
</section>
