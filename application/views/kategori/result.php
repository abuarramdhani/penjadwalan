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
    <?php foreach ($kategori_view as $kategori_item) { ?>
    <tr>
    <!-- <td><?php //echo $kategori_item['kd_kategori']; ?></td> -->
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-kategori"
      data-1="<?php echo $kategori_item['kd_kategori']; ?>"
      data-2="<?php echo $kategori_item['nama']; ?>"
      data-3="<?php echo $kategori_item['status']; ?>"
      data-4="<?php echo $kategori_item['tambah']; ?>"
      data-5="<?php echo $kategori_item['waktu_tambah']; ?>"
      data-6="<?php echo $kategori_item['ubah']; ?>"
      data-7="<?php echo $kategori_item['waktu_ubah']; ?>"
      ><?php echo $kategori_item['nama']; ?></a></td>
    <td><?php echo $kategori_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('kategori/ubah/'.$kategori_item['kd_kategori']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='kategori' data-controller='kategori' data-kode="<?php echo $kategori_item['kd_kategori']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
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
