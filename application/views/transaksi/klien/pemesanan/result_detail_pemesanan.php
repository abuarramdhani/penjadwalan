<!-- Table -->
  <table id="tabel" class="table table-hover">
    <tr>
      <th>Jenis Pesanan</th>
      <th>Harga Jual</th>
      <th>Tanggal Pemakaian</th>
      <th>Keterangan</th>
      <th style='text-align: center;'>Hapus</th>
    </tr>
    <?php
    if (count($_SESSION['pemesanan']) != 0) {
      foreach ($jenis_pesanan_view2 as $jenis_pesanan_item2) {
        $jp[$jenis_pesanan_item2['kd_jenis_pesanan']] = $jenis_pesanan_item2['nama'];
      }
    $pemesanan = $_SESSION['pemesanan'];
      foreach ($pemesanan as $key => $value) {
        echo "
        <tr>
          <td>".$jp[$value['kd_jenis_pesanan']]."</td>
          <td>Rp  ".number_format($value['harga_jual'], 0, ',' , '.' )."</td>
          <td>".$value['tgl']."</span></td>
          <td>".$value['keterangan']."</span></td>
          <td style='text-align: center;' class='col-md-2'>
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
      echo "<td colspan='5' style='text-align:center;'>Belum ada Data</td>";
    }
    ?>
  </table>
