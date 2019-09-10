<table id="tabel" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th class="col-md-1">Kode</th>
    <th>Vendor</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th class="col-md-1">Status</th>
    <th>Action</th>
    <th>Peminjaman</th>
  </tr>
  </thead>

  <tbody>
    <?php foreach ($peminjaman_view as $peminjaman_item) { ?>
    <tr>
    <td><?php echo $peminjaman_item['kd_peminjaman']; ?></td>
    <?php
    //ubah format tanggal
    $tgl1 = $peminjaman_item['tgl_pinjam'];
    $tgl1 = explode("-",$tgl1);
    $d1 = $tgl1['0'];
    $m1 = $tgl1['1'];
    $y1 = $tgl1['2'];
    $tanggal1 = array($y1, $m1, $d1);
    $tgl_pinjam = implode("-", $tanggal1);
    //ubah format tanggal
    $tgl2 = $peminjaman_item['tgl_kembali'];
    $tgl2 = explode("-",$tgl2);
    $d2 = $tgl2['0'];
    $m2 = $tgl2['1'];
    $y2 = $tgl2['2'];
    $tanggal2 = array($y2, $m2, $d2);
    $tgl_kembali = implode("-", $tanggal2);
    ?>
     <!--trnsfer dta ke modal-->
    <td><a href="<?php echo site_url('peminjaman/detail/'.$peminjaman_item['kd_peminjaman']) ?>" ><?php echo $peminjaman_item['vendor']; ?></a></td>

    <td><?php echo $tgl_pinjam; ?></td>
    <td><?php echo $tgl_kembali; ?></td>
    <td><?php echo $peminjaman_item['status']; ?></td>
    <td style="width: 70px;" class="text-center">
      <div class="btn-group-vertical">
        <div class="btn-group">
          <button type="button" class="btn btn-flat btn-sm btn-warning dropdown-toggle <?php if($peminjaman_item['status'] == 'dikembalikan' || $peminjaman_item['status'] == 'dibatalkan'){echo 'disabled';} ?>" data-toggle="dropdown"> Ubah
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('peminjaman/ubah/'.$peminjaman_item['kd_peminjaman']); ?>">Ubah Data Peminjaman</a></li>
            <li><a href="<?php echo site_url('peminjaman/ubah_detail/'.$peminjaman_item['kd_peminjaman']); ?>">Ubah Detail Peminjaman</a></li>
          </ul>
        </div>
          <a href="#" data-toggle="modal" data-target="#modal-hapus" data-kode="<?php echo $peminjaman_item['kd_peminjaman'];?>" data-controller="transaksi_vendor" data-form="peminjaman" class="btn btn-sm btn-flat btn-danger <?php if($peminjaman_item['status'] == 'dipinjam'){echo 'disabled';} ?>"><i class="fa fa-trash-o"></i> Hapus</a>
        </div>
      </td>
      <td style="width: 70px;" class="text-center">
        <div class="btn-group-vertical">
          <button id="isi" value="<?php echo $peminjaman_item['kd_peminjaman']; ?>"  data-toggle="modal" data-target="#modal-konfirmasi" data-kode="<?php echo $peminjaman_item['kd_peminjaman']; ?>" data-controller="transaksi_vendor" data-form="pengembalian" class="btn btn-sm btn-flat btn-primary <?php if($peminjaman_item['status'] == 'dikembalikan' || $peminjaman_item['status'] == 'dibatalkan'){echo 'disabled';} ?>"><i class="fa fa-check"></i> Pengembalian</button>
          <a href="#" data-toggle="modal" data-target="#modal-batalkan" data-kode="<?php echo $peminjaman_item['kd_peminjaman']; ?>" data-controller="transaksi_vendor" data-form="peminjaman" class="btn btn-sm btn-flat btn-danger <?php if($peminjaman_item['status'] == 'dikembalikan' || $peminjaman_item['status'] == 'dibatalkan'){echo 'disabled';} ?>"><i class="fa fa-times"></i> Pembatalan</a>
        </div>
      </td>
  </tr>
  <?php } ?>
  </tbody>
  <tfoot>
  <tr>
    <th>Kode</th>
    <th>Vendor</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
    <th>Action</th>
    <th>Peminjaman</th>
  </tr>
  </tfoot>
</table>
