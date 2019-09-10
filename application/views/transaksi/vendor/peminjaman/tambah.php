<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data
      <small>Peminjaman</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li >Peminjaman</li>
      <li class="active">Tambah Data</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-bottom:171px;">

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

                <!-- /.box-header -->
                <div class="box-body">

                  <!-- Left Form -->
                    <div class="col-md-6">
                      <!-- select -->
                      <div class="form-group col-md-12">
                        <label>Vendor</label>
                        <select id="vendor" name="vendor" class="form-control">
                          <?php foreach ($vendor_view as $vendor_item) { ?>
                          <option value="<?php echo $vendor_item['kd_vendor']; ?>" ><?php echo $vendor_item['nama']; ?></option>
                         <?php } ?>
                        </select>
                      </div>
                    </div>

                  <!-- Right Form -->
                    <div class="col-md-6">
                      <!-- Date -->
                      <div class="form-group col-md-12">
                        <label>Tanggal</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                            <input name="tgl" type="text" class="form-control pull-left" id="reservation" readonly="readonly" style="background: white;">
                        </div>
                        <!-- /.input group -->
                      </div>

                    </div>
                    <!--button-->
                    <div class="col-md-12">
                      <div class="col-md-12">
                        <div class="text-center">
                          <a style="margin-right: 10px;" href="<?php echo site_url('peminjaman/peminjaman'); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                          <button id="selanjutnya" name="button" type="submit" class="btn btn-primary"  value="selanjunya">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->

            </div>
          </div>
        </div>
      </div>
<!-- /.content-wrapper -->
</section>
