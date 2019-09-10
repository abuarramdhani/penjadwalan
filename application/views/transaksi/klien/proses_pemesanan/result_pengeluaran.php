<?php
if (count($_SESSION['proses_pengeluaran']) != 0) {
  foreach ($jenis_pengeluaran_view2 as $jenis_pengeluaran_item2) {
    $jp[$jenis_pengeluaran_item2['kd_jenis_pengeluaran']] = $jenis_pengeluaran_item2['nama'];
  }
}
 ?>

<table id="tabel" class="table table-hover">
  <tr>
    <th>Jenis Pengeluaran</th>
    <th>Harga</th>
    <th>Keterangan</th>
    <th style='text-align: center;'  class='col-md-1'>Action</th>
  </tr>
  <?php
  if (count($_SESSION['proses_pengeluaran']) != 0) {
  $proses = $_SESSION['proses_pengeluaran'];
    foreach ($proses as $key => $value) {
      echo "
      <tr>
        <td>".$jp[$value['kd_jenis_pengeluaran']]."</span></td>
        <td>Rp  ".number_format($value['harga'], 0, ',' , '.' )."</td>
        <td>".$value['keterangan']."</span></td>
        <td style='text-align: center;'>
          <div class='btn-group-vertical'>
            <button data-id=".$key." class='btn btn-sm btn-flat btn-warning' id='edit'><i class='fa fa-edit'></i></button>
            <button data-id=".$key." class='btn btn-sm btn-flat btn-danger' id='hapus'><i class='fa fa-trash-o'></i></button>
          </div>
        </td>
      </tr>
      ";
    }
  }
  else {
    echo "<td colspan='4' style='text-align:center;'>Belum ada Data</td>";
  }
  ?>
</table>
