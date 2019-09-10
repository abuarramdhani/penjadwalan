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
    <?php foreach ($jabatan_view as $jabatan_item) { ?>
    <tr>
    <!-- <td><?php //echo $jabatan_item['kd_jabatan']; ?></td> -->
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-jabatan"
      data-1="<?php echo $jabatan_item['kd_jabatan']; ?>"
      data-2="<?php echo $jabatan_item['nama']; ?>"
      data-3="<?php echo $jabatan_item['status']; ?>"
      data-4="<?php echo $jabatan_item['tambah']; ?>"
      data-5="<?php echo $jabatan_item['waktu_tambah']; ?>"
      data-6="<?php echo $jabatan_item['ubah']; ?>"
      data-7="<?php echo $jabatan_item['waktu_ubah']; ?>"
      ><?php echo $jabatan_item['nama']; ?></a></td>
    <td><?php echo $jabatan_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('jabatan/ubah/'.$jabatan_item['kd_jabatan']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='jabatan' data-controller='jabatan' data-kode="<?php echo $jabatan_item['kd_jabatan']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
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
