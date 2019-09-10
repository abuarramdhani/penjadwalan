<table id="tabel" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>Tipe</th>
    <th>Jumlah</th>
    <th>Merk</th>
    <th>Kategori</th>
  </tr>
  </thead>

  <tbody>
    <?php foreach ($peralatan_view as $peralatan_item) { ?>
    <tr>
    <td><?php echo $peralatan_item['tipe']; ?></td>
    <td><?php echo $peralatan_item['jumlah']; ?></td>
    <td><?php echo $peralatan_item['merk']; ?></td>
    <td><?php echo $peralatan_item['kategori']; ?></td>
    </tr>
    <?php } ?>
  </tbody>

  <tfoot>
  <tr>
    <th>Tipe</th>
    <th>Jumlah</th>
    <th>Merk</th>
    <th>Kategori</th>
  </tr>
  </tfoot>
</table>
