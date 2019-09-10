<table id="tabel" class="table table-bordered table-striped">
  <thead>
  <tr>
    <!-- <th class="col-md-1">Kode</th> -->
    <th>Pekejaan</th>
    <th>Area</th>
    <th>Gaji</th>
    <th>Persentase Gaji Magang</th>
    <th class="col-md-1">Status</th>
    <th>Action</th>
  </tr>
  </thead>

  <tbody>
    <?php foreach ($gaji_view as $gaji_item) { ?>
    <tr>
    <!-- <td><?php// echo $gaji_item['kd_gaji']; ?></td> -->
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-gaji"
      data-1="<?php echo $gaji_item['kd_gaji']; ?>"
      data-2="<?php echo "Rp ".number_format($gaji_item['gaji'], 0, ',' , '.' ); ?>"
      data-3="<?php echo $gaji_item['gaji_magang']." %"; ?>"
      data-4="<?php echo $gaji_item['pekerjaan']; ?>"
      data-5="<?php echo $gaji_item['area']; ?>"
      data-6="<?php echo $gaji_item['status']; ?>"
      data-7="<?php echo $gaji_item['tambah']; ?>"
      data-8="<?php echo $gaji_item['waktu_tambah']; ?>"
      data-9="<?php echo $gaji_item['ubah']; ?>"
      data-10="<?php echo $gaji_item['waktu_ubah']; ?>"
      ><?php echo $gaji_item['pekerjaan']; ?></a></td>

    <td><?php echo $gaji_item['area']; ?></td>
    <td><?php echo "Rp ".number_format($gaji_item['gaji'], 0, ',' , '.' ); ?></td>
    <td><?php echo $gaji_item['gaji_magang']." %"; ?></td>
    <td><?php echo $gaji_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('gaji/ubah/'.$gaji_item['kd_gaji']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='gaji' data-controller='gaji' data-kode="<?php echo $gaji_item['kd_gaji']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>
  <?php } ?>
  </tbody>
  <tfoot>
  <tr>
    <!-- <th>Kode</th> -->
    <th>Pekejaan</th>
    <th>Area</th>
    <th>Gaji</th>
    <th>Persentase Gaji Magang</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </tfoot>
</table>
