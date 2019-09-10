<table id="tabel1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>Username</th>
    <th>Nama</th>
    <th>No. HP</th>
    <th>Email</th>
    <th>Status Pegawai</th>
    <th class="col-md-1">Status</th>
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
    <td><?php echo $pegawai_item['username']; ?></td>
    <td><?php echo $pegawai_item['nama']; ?></td>
    <td><?php echo $pegawai_item['no_hp']; ?></td>
    <td><?php echo $pegawai_item['email']; ?></td>
    <td><?php echo $pegawai_item['status_pegawai']; ?></td>
    <td><?php echo $pegawai_item['status']; ?></td>
    </tr>
    <?php } ?>
  </tbody>

  <tfoot>
  <tr>
    <th>Username</th>
    <th>Nama</th>
    <th>No. HP</th>
    <th>Email</th>
    <th>Status Pegawai</th>
    <th>Status</th>
  </tr>
  </tfoot>
</table>
