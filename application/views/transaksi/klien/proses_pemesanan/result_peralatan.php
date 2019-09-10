<table id="tabel" class="table table-hover">
  <tr>
    <th>Peralatan</th>
    <th style='text-align: center;'  class='col-md-1'>Action</th>
  </tr>
  <?php
  if (count($_SESSION['proses_peralatan']) != 0) {
    $proses = $_SESSION['proses_peralatan'];
    foreach ($proses as $key => $value) {
      echo "
            <tr>
              <td>".$value['kd_peralatan']."</span></td>
              <td style='text-align: center;'>
                <div class='btn-group-vertical'>
                  <button data-id='".$key."' class='btn btn-sm btn-flat btn-warning' id='edit'><i class='fa fa-edit'></i></button>
                  <button data-id='".$key."' class='btn btn-sm btn-flat btn-danger' id='hapus'><i class='fa fa-trash-o'></i></button>
                </div>
              </td>
            </tr>
            ";
      }
    }
    else {
      echo "<td colspan='2' style='text-align:center;'>Belum ada Data</td>";
    }
    ?>
  </table>
