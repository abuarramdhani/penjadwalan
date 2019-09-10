<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Periksa Ketersediaan
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Periksa Ketersediaan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row" style="margin:30px 0px;">
      <!--periksa ketersediaan-->
      <div class="col-md-12">
            <!-- Date -->
              <!-- Date and time range -->
              <div class="form-group col-md-9">
                <div class="col-md-3 col-xs-12">
                <h4 class="box-title">Pilih tanggal:</h4>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input name="tgl" type="text" class="form-control pull-left" id="reservation" readonly="readonly" style="background: white;">
              </div>
            </div>
            <!--button-->
            <div class="col-lg-2">
              <button id="cek" type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-search"></i> Periksa</button>
            </div>
                <!-- /.input group -->
              </div>
        </div>
        </div>

      <div class="row">
        <div class="text-center">
          <h4>Ketersediaan <tgl></tgl></h4>
        </div>
      </div>
<br><br>

    <div class="row result_kategori">

    </div>

    <!-- tabel peralatan  -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
              <div class="box-header">
              <!-- /.form group -->
              <h3 class="box-title">Peralatan</h3>

              </div>
          <!-- /.box-header -->
              <div class="box-body result">
                <table id="tabel" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                    <th>Merk</th>
                    <th>Kategori</th>
                  </tr>
                  </thead>

                  <tbody>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                    <th>Merk</th>
                    <th>Kategori</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
          <!-- /.box-body -->
        <!-- /.tabel peralatan  -->

    <!-- tabel pegawai  -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
              <div class="box-header">
              <!-- /.form group -->
              <h3 class="box-title">Pegawai</h3>

              </div>
          <!-- /.box-header -->
              <div class="box-body result2">
                <table id="tabel1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Status Pegawai</th>
                    <th class="col-md-1">Status</th>
                  </tr>
                  </thead>

                  <tbody>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Status Pegawai</th>
                    <th>Status</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
          <!-- /.box-body -->
        <!-- /.tabel pegawai  -->




<!-- /.content-wrapper -->
</section>
