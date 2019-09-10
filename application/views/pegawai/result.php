<table id="tabel" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>Username</th>
    <th>Nama</th>
    <th>No. HP</th>
    <th>Jabatan</th>
    <th>Status Pegawai</th>
    <th class="col-md-1">Status</th>
    <th>Action</th>
  </tr>
  </thead>

  <tbody>
    <?php foreach ($pegawai_view as $pegawai_item) { ?>
    <tr>
    <?php
    //ubah format tanggal
    $tgl = $pegawai_item['mulai_kerja'];
    $tgl = explode("-",$tgl);
    $d = $tgl['0'];
    $m = $tgl['1'];
    $y = $tgl['2'];
    $tanggal = array($y, $m, $d);
    $mulai_kerja = implode("-", $tanggal);
    ?>
     <!--trnsfer dta ke modal-->
    <td><a href="#" data-toggle="modal" data-target="#modal-pegawai"
      data-1="<?php echo $pegawai_item['username']; ?>"
      data-2="<?php echo $pegawai_item['nama']; ?>"
      data-3="<?php echo $pegawai_item['jabatan']; ?>"
      data-4="<?php echo $mulai_kerja; ?>"
      data-5="<?php echo $pegawai_item['no_hp']; ?>"
      data-6="<?php echo $pegawai_item['alamat']; ?>"
      data-7="<?php echo $pegawai_item['email']; ?>"
      data-8="<?php echo $pegawai_item['npwp']; ?>"
      data-9="<?php echo $pegawai_item['status_pegawai']; ?>"
      data-10="<?php echo $pegawai_item['status_user']; ?>"
      data-11="<?php echo $pegawai_item['status']; ?>"
      data-12="<?php echo $pegawai_item['tambah']; ?>"
      data-13="<?php echo $pegawai_item['waktu_tambah']; ?>"
      data-14="<?php echo $pegawai_item['ubah']; ?>"
      data-15="<?php echo $pegawai_item['waktu_ubah']; ?>"
      ><?php echo $pegawai_item['username']; ?></a></td>

    <td><?php echo $pegawai_item['nama']; ?></td>
    <td><?php echo $pegawai_item['no_hp']; ?></td>
    <td><?php echo $pegawai_item['jabatan']; ?></td>
    <td><?php echo $pegawai_item['status_pegawai']; ?></td>
    <td><?php echo $pegawai_item['status']; ?></td>
    <td style="width: 70px;">
      <div class="btn-group-vertical">
        <a href="<?php echo site_url('pegawai/ubah/'.$pegawai_item['username']); ?>" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a href="#" data-toggle="modal" data-target="#modal-hapus" data-form='pegawai' data-controller='pegawai' data-kode="<?php echo $pegawai_item['username']; ?>" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>
  <?php } ?>
  </tbody>
  <tfoot>
  <tr>
    <th>Username</th>
    <th>Nama</th>
    <th>No. HP</th>
    <th>Jabatan</th>
    <th>Status Pegawai</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </tfoot>
</table>
