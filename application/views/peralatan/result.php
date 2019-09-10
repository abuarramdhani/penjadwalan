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
