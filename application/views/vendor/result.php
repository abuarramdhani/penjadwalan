<table id="tabel" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th class="col-md-1">Kode</th>
    <th>Nama</th>
    <th>No. HP</th>
    <th class="col-md-1">Status</th>
    <th>Action</th>
  </tr>
  </thead>

  <tbody>
    <?php foreach ($vendor_view as $vendor_item) { ?>
    <tr>
    <td><?php echo $vendor_item['kd_vendor']; ?></td>
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-vendor"
      data-1="<?php echo $vendor_item['kd_vendor']; ?>"
      data-2="<?php echo $vendor_item['nama']; ?>"
      data-3="<?php echo $vendor_item['no_hp']; ?>"
      data-4="<?php echo $vendor_item['alamat']; ?>"
      data-5="<?php echo $vendor_item['email']; ?>"
      data-6="<?php echo $vendor_item['status']; ?>"
      data-7="<?php echo $vendor_item['tambah']; ?>"
      data-8="<?php echo $vendor_item['waktu_tambah']; ?>"
      data-9="<?php echo $vendor_item['ubah']; ?>"
      data-10="<?php echo $vendor_item['waktu_ubah']; ?>"
      ><?php echo $vendor_item['nama']; ?></a></td>

    <td><?php echo $vendor_item['no_hp']; ?></td>
    <td><?php echo $vendor_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('vendor/ubah/'.$vendor_item['kd_vendor']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='vendor' data-controller='vendor' data-kode="<?php echo $vendor_item['kd_vendor']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>
  <?php } ?>
  </tbody>
  <tfoot>
  <tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>No. HP</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </tfoot>
</table>
