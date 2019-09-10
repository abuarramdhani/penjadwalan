<table id="tabel" class="table table-bordered table-striped">
  <thead>
  <tr>
    <!-- <th class="col-md-1">Kode</th> -->
    <th>Nama</th>
    <th>Kategori Biaya Operasional</th>
    <th class="col-md-1">Status</th>
    <th>Action</th>
  </tr>
  </thead>

  <tbody>
    <?php foreach ($jenis_pengeluaran_view as $jenis_pengeluaran_item) { ?>
    <tr>
    <!-- <td><?php //echo $jenis_pengeluaran_item['kd_jenis_pengeluaran']; ?></td> -->
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-jenis_pengeluaran"
      data-1="<?php echo $jenis_pengeluaran_item['kd_jenis_pengeluaran']; ?>"
      data-2="<?php echo $jenis_pengeluaran_item['nama']; ?>"
      data-3="<?php echo $jenis_pengeluaran_item['kategori_biaya']; ?>"
      data-4="<?php echo $jenis_pengeluaran_item['status']; ?>"
      data-5="<?php echo $jenis_pengeluaran_item['tambah']; ?>"
      data-6="<?php echo $jenis_pengeluaran_item['waktu_tambah']; ?>"
      data-7="<?php echo $jenis_pengeluaran_item['ubah']; ?>"
      data-8="<?php echo $jenis_pengeluaran_item['waktu_ubah']; ?>"
      ><?php echo $jenis_pengeluaran_item['nama']; ?></a></td>
    <td><?php echo $jenis_pengeluaran_item['kategori_biaya']; ?></td>
    <td><?php echo $jenis_pengeluaran_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('jenis_pengeluaran/ubah/'.$jenis_pengeluaran_item['kd_jenis_pengeluaran']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='jenis pengeluaran' data-controller='jenis_pengeluaran' data-kode="<?php echo $jenis_pengeluaran_item['kd_jenis_pengeluaran']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>
  <?php } ?>
  </tbody>
  <tfoot>
  <tr>
    <!-- <th>Kode</th> -->
    <th>Nama</th>
    <th>Kategori Biaya Operasional</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </tfoot>
</table>
