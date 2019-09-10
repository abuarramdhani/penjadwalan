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
    <!-- <td><?php// echo $area_item['kd_area']; ?></td> -->
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-area"
      data-1="<?php echo $area_item['kd_area']; ?>"
      data-2="<?php echo $area_item['nama']; ?>"
      data-3="<?php echo $area_item['uang_makan']; ?>"
      data-4="<?php echo $area_item['status']; ?>"
      data-5="<?php echo $area_item['tambah']; ?>"
      data-6="<?php echo $area_item['waktu_tambah']; ?>"
      data-7="<?php echo $area_item['ubah']; ?>"
      data-8="<?php echo $area_item['waktu_ubah']; ?>"
      ><?php echo $area_item['nama']; ?></a></td>

    <td><?php echo $area_item['uang_makan']; ?></td>
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
