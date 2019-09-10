<?php
if (count($_SESSION['proses_alat_sewa']) != 0) {
  foreach ($vendor_view as $vendor_item) {
    $v[$vendor_item['kd_vendor']] = $vendor_item['nama'];
  }
}
 ?>
<table id="tabel" class="table table-hover">
  <tr>
    <th class="text-center">Nama Alat</th>
    <th class="text-center">Jumlah</th>
    <th class="text-center">Harga Total</th>
    <th class="text-center">Vendor</th>
    <th style='text-align: center;'  class='col-md-1'>Action</th>
  </tr>
  <?php
  if (count($_SESSION['proses_alat_sewa']) != 0) {
    $proses = $_SESSION['proses_alat_sewa'];
    foreach ($proses as $key => $value) {
    echo "
      <tr>
        <td class='text-center'>".$value['nama']."</span></td>
        <td class='text-center'>".$value['jumlah']."</span></td>
        <td class='text-center'>Rp ".number_format($value['harga'], 0, ',' , '.' )."</span></td>
        <td class='text-center'>".$v[$value['kd_vendor']]."</span></td>
        <td class='text-center'>
          <div class='btn-group-vertical'>
            <button data-id=".$key." class='btn btn-sm btn-flat btn-warning' id='edit_sewa'><i class='fa fa-edit'></i></button>
            <button data-id=".$key." class='btn btn-sm btn-flat btn-danger' id='hapus_sewa'><i class='fa fa-trash-o'></i></button>
          </div>
        </td>
      </tr>
    ";
    }
  }
  else {
    echo "<td colspan='5' style='text-align:center;'>Belum ada Data</td>";
  }
  ?>
  </table>
