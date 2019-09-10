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
    <?php foreach ($jenis_pesanan_view as $jenis_pesanan_item) { ?>
    <tr>
    <!-- <td><?php// echo $jenis_pesanan_item['kd_jenis_pesanan']; ?></td> -->
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-jenis_pesanan"
      data-1="<?php echo $jenis_pesanan_item['kd_jenis_pesanan']; ?>"
      data-2="<?php echo $jenis_pesanan_item['nama']; ?>"
      data-3="<?php echo $jenis_pesanan_item['status']; ?>"
      data-4="<?php echo $jenis_pesanan_item['tambah']; ?>"
      data-5="<?php echo $jenis_pesanan_item['waktu_tambah']; ?>"
      data-6="<?php echo $jenis_pesanan_item['ubah']; ?>"
      data-7="<?php echo $jenis_pesanan_item['waktu_ubah']; ?>"
      ><?php echo $jenis_pesanan_item['nama']; ?></a></td>
    <td><?php echo $jenis_pesanan_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('jenis_pesanan/ubah/'.$jenis_pesanan_item['kd_jenis_pesanan']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='jenis pesanan' data-controller='jenis_pesanan' data-kode="<?php echo $jenis_pesanan_item['kd_jenis_pesanan']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
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
