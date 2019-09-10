<table id="tabel" class="table table-bordered table-striped">
  <thead>
  <tr>
    <!-- <th class="col-md-1">Kode</th> -->
    <th>Nama</th>
    <th>Merk</th>
    <th>Kategori</th>
    <th class="col-md-1">Status</th>
    <th>Action</th>
  </tr>
  </thead>

  <tbody>
    <?php foreach ($tipe_view as $tipe_item) { ?>
    <tr>
    <!-- <td><?php //echo $tipe_item['kd_tipe']; ?></td> -->
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-tipe"
      data-1="<?php echo $tipe_item['kd_tipe']; ?>"
      data-2="<?php echo $tipe_item['nama']; ?>"
      data-3="<?php echo $tipe_item['merk']; ?>"
      data-4="<?php echo $tipe_item['kategori']; ?>"
      data-5="<?php echo $tipe_item['status']; ?>"
      data-6="<?php echo $tipe_item['tambah']; ?>"
      data-7="<?php echo $tipe_item['waktu_tambah']; ?>"
      data-8="<?php echo $tipe_item['ubah']; ?>"
      data-9="<?php echo $tipe_item['waktu_ubah']; ?>"
      ><?php echo $tipe_item['nama']; ?></a></td>

    <td><?php echo $tipe_item['merk']; ?></td>
    <td><?php echo $tipe_item['kategori']; ?></td>
    <td><?php echo $tipe_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('tipe/ubah/'.$tipe_item['kd_tipe']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='tipe' data-controller='tipe' data-kode="<?php echo $tipe_item['kd_tipe']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>
  <?php } ?>
  </tbody>
  <tfoot>
  <tr>
    <!-- <th>Kode</th> -->
    <th>Nama</th>
    <th>Merk</th>
    <th>Kategori</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </tfoot>
</table>
