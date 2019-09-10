<?php
if (count($_SESSION['proses_sdm']) != 0) {
  foreach ($pekerjaan_view2 as $pekerjaan_item2) {
    $p[$pekerjaan_item2['kd_pekerjaan']] = $pekerjaan_item2['nama'];
  }
}
 ?>

 <table id="tabel" class="table table-hover">
   <tr>
     <th class='rab rabh text-center'>Pemegang Uang RAB</th>
     <th>SDM</th>
     <th>Pekerjaan 1</th>
     <th>Pekerjaan 2</th>
     <th>Pekerjaan 3</th>
     <th>Gaji</th>
     <th>Uang Makan</th>
     <th>Tanggal</th>
     <th style='text-align: center;'  class='col-md-1'>Action</th>
   </tr>
   <?php
   if (count($_SESSION['proses_sdm']) != 0) {
   $proses = $_SESSION['proses_sdm'];
     foreach ($proses as $key => $value) {
       if ($value['pekerjaan1'] == "-") {
         $pekerjaan1 = "-";
       }
       else {
         $pekerjaan1 = $p[$value['pekerjaan1']];
       }
       if ($value['pekerjaan2'] == "-") {
         $pekerjaan2 = "-";
       }
       else {
         $pekerjaan2 = $p[$value['pekerjaan2']];
       }
       if ($value['pekerjaan3'] == "-") {
         $pekerjaan3 = "-";
       }
       else {
         $pekerjaan3 = $p[$value['pekerjaan3']];
       }
       echo "
       <tr>
         <td class='rab rabd text-center'><input id='rab' type='radio' name='rab' value=".$value['username']."></td>
         <td>".$value['username']."</span></td>
         <td>".$pekerjaan1."</span></td>
         <td>".$pekerjaan2."</span></td>
         <td>".$pekerjaan3."</span></td>
         <td>Rp ".number_format($value['gaji'], 0, ',' , '.' )."</span></td>
         <td>Rp ".number_format($value['uang_makan'], 0, ',' , '.' )."</span></td>
         <td>".$value['tgl']."</span></td>
         <td style='text-align: center;'>
           <div class='btn-group-vertical'>
             <button data-id='".$key."' data-tes='".$value['cek']."' class='btn btn-sm btn-flat btn-warning' id='edit'><i class='fa fa-edit'></i></button>
             <button data-id='".$key."' class='btn btn-sm btn-flat btn-danger' id='hapus'><i class='fa fa-trash-o'></i></button>
           </div>
         </td>
       </tr>
       ";
     }
   }
   else {
     echo "<td colspan='8' style='text-align:center;'>Belum ada Data</td>";
   }
   ?>
 </table>
