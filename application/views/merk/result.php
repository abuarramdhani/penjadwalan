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
    <?php foreach ($merk_view as $merk_item) { ?>
    <tr>
    <!-- <td><?php// echo $merk_item['kd_merk']; ?></td> -->
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-merk"
      data-1="<?php echo $merk_item['kd_merk']; ?>"
      data-2="<?php echo $merk_item['nama']; ?>"
      data-3="<?php echo $merk_item['status']; ?>"
      data-4="<?php echo $merk_item['tambah']; ?>"
      data-5="<?php echo $merk_item['waktu_tambah']; ?>"
      data-6="<?php echo $merk_item['ubah']; ?>"
      data-7="<?php echo $merk_item['waktu_ubah']; ?>"
      ><?php echo $merk_item['nama']; ?></a></td>
    <td><?php echo $merk_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('merk/ubah/'.$merk_item['kd_merk']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='merk' data-controller='merk' data-kode="<?php echo $merk_item['kd_merk']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
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
