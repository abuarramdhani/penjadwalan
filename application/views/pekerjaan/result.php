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
    <?php foreach ($pekerjaan_view as $pekerjaan_item) { ?>
    <tr>
    <!-- <td><?php// echo $pekerjaan_item['kd_pekerjaan']; ?></td> -->
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-pekerjaan"
      data-1="<?php echo $pekerjaan_item['kd_pekerjaan']; ?>"
      data-2="<?php echo $pekerjaan_item['nama']; ?>"
      data-3="<?php echo $pekerjaan_item['status']; ?>"
      data-4="<?php echo $pekerjaan_item['tambah']; ?>"
      data-5="<?php echo $pekerjaan_item['waktu_tambah']; ?>"
      data-6="<?php echo $pekerjaan_item['ubah']; ?>"
      data-7="<?php echo $pekerjaan_item['waktu_ubah']; ?>"
      ><?php echo $pekerjaan_item['nama']; ?></a></td>
    <td><?php echo $pekerjaan_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('pekerjaan/ubah/'.$pekerjaan_item['kd_pekerjaan']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='pekerjaan' data-controller='pekerjaan' data-kode="<?php echo $pekerjaan_item['kd_pekerjaan']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
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
