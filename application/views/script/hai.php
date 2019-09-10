
<div class="box-body table-responsive no-padding">
  <table id="tabel" class="table table-hover">
    <tr>
      <th>Nama</th>
      <th>Jurusan</th>
      <th>Semester</th>
      <th style='text-align: center;'>Hapus</th>
    </tr>
    <?php
    if (isset($_SESSION['nama']) == TRUE && isset($_SESSION['jurusan']) == TRUE && isset($_SESSION['semester']) == TRUE) {?>
      <tr>
        <td><?php echo $_SESSION['nama'] ?></td>
        <td><?php echo $_SESSION['jurusan'] ?></td>
        <td><?php echo $_SESSION['semester'] ?></td>
        <td style='text-align: center;' class='col-md-1'><button data-id="nama" class='btn btn-sm btn-flat btn-danger' id="hapus"><i class='fa fa-trash-o'></i></button></td>
      </tr>
      <?php
    }
    else {
      ?>
      <tr>
        <td>Belum ada data</td>
      </tr>
      <?php
    }
    ?>
  </table>
</div>
