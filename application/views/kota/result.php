<table id="tabel" class="table table-bordered table-striped">
  <thead>
  <tr>
    <!-- <th class="col-md-1">Kode</th> -->
    <th>Nama</th>
    <th>Area</th>
    <th class="col-md-1">Status</th>
    <th>Action</th>
  </tr>
  </thead>

  <tbody>
    <?php foreach ($kota_view as $kota_item) { ?>
    <tr>
    <!-- <td><?php// echo $kota_item['kd_kota']; ?></td> -->
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-kota"
      data-1="<?php echo $kota_item['kd_kota']; ?>"
      data-2="<?php echo $kota_item['nama']; ?>"
      data-3="<?php echo $kota_item['area']; ?>"
      data-4="<?php echo $kota_item['status']; ?>"
      data-5="<?php echo $kota_item['tambah']; ?>"
      data-6="<?php echo $kota_item['waktu_tambah']; ?>"
      data-7="<?php echo $kota_item['ubah']; ?>"
      data-8="<?php echo $kota_item['waktu_ubah']; ?>"
      ><?php echo $kota_item['nama']; ?></a></td>

    <td><?php echo $kota_item['area']; ?></td>
    <td><?php echo $kota_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('kota/ubah/'.$kota_item['kd_kota']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='kota' data-controller='kota' data-kode="<?php echo $kota_item['kd_kota']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>
  <?php } ?>
  </tbody>
  <tfoot>
  <tr>
    <!-- <th>Kode</th> -->
    <th>Nama</th>
    <th>Area</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </tfoot>
</table>
