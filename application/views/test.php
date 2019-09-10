
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Test
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Test</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row" style="margin:30px 0px;">

      <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
      <?php echo form_open('pemesanan/tambah_detail') ?>
        <!-- text input -->
        <div class="form-group nama">
          <label>Nama</label>
          <input id="nama" name="nama" type="text" class="form-control hurufAngka" placeholder="..." >
          <label class="error" for="nama" id="nama_error" hidden><i class="fa fa-times-circle-o"></i> This field is required.</label>
          <label class="vali" for="nama" id="nama_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
        </div>
        <!-- text input -->
        <div class="form-group jurusan">
          <label>Jurusan</label>
          <input id="jurusan" name="jurusan" type="text" class="form-control hurufSpesial" placeholder="...">
          <label class="error" for="jurusan" id="jurusan_error" hidden><i class="fa fa-times-circle-o"></i> This field is required.</label>
          <label class="vali" for="jurusan" id="jurusan_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan karakter.</label>
        </div>
        <!-- text input -->
        <div class="form-group semester">
          <label>Semester</label>
          <input id="semester" name="semester" type="text" class="form-control angkaSaja" placeholder="...">
          <label class="error" for="semester" id="semester_error" hidden><i class="fa fa-times-circle-o"></i> This field is required.</label>
          <label class="vali" for="semester" id="semester_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf.</label>
        </div>

      </form>
        <!--button-->
        <div class="form-group ">
          <div class="text-center">
            <button id="tambah" data-id="nama" name="button" type="submit" class="btn btn-success" style="margin-right: 10px;" value="tambah"><i class="fa fa-plus"></i> Tambah</button>
          </div>
        </div>

      <div class="result">
      <div class="box-body table-responsive no-padding">
        <table id="tabel" class="table table-hover">
          <tr>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Semester</th>
            <th style='text-align: center;'>Hapus</th>
          </tr>
          <tr>
            <td>Belum ada data</td>
          </tr>
        </table>
      </div>
      </div>

      </div>
      </div>
      </div>


</section>
