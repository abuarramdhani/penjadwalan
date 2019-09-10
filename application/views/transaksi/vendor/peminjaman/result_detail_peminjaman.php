<table class="table table-striped">
  <tr>
    <th>Nama Alat</th>
    <th class="col-md-1">Jumlah</th>
    <th>Harga Sewa Satuan</th>
    <th>Harga Total</th>
    <th class="col-md-1" style='text-align: center;'>Hapus</th>
  </tr>
  <?php
  if (count($_SESSION['peminjaman']) != 0) {
  $peminjaman = $_SESSION['peminjaman'];
    foreach ($peminjaman as $key => $value) {
      $total = $value['jumlah']*$value['harga_sewa'];
      echo "
      <tr>
        <td>".$value['nama_alat']."</td>
        <td style='text-align:center;'><span class='badge bg-blue '>".$value['jumlah']."</span></td>
        <td>Rp  ".number_format($value['harga_sewa'], 0, ',' , '.' )."</td>
        <td>Rp  ".number_format($total, 0, ',' , '.' )."</td>
        <td class='col-md-1' style='text-align: center;' class='col-md-3'>
          <div class='btn btn-group-vertical'>
            <button data-id=".$value['nama_alat']." class='btn btn-sm btn-flat btn-warning' id='edit'><i class='fa fa-edit'></i></button>
            <button data-id=".$value['nama_alat']." class='btn btn-sm btn-flat btn-danger' id='hapus'><i class='fa fa-trash-o'></i></button>
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
