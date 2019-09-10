<?php
if (isset($_SESSION['kd_pemesanan']) == FALSE) {
  redirect('pemesanan/tambah');
}
 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Tambah Data
       <small>Detail Pemesanan</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
       <li >Pemesanan</li>
       <li class="active">Tambah Data</li>
     </ol>
   </section>
 <?php
 foreach ($jenis_pesanan_view2 as $jenis_pesanan_item2) {
   $jp[$jenis_pesanan_item2['kd_jenis_pesanan']] = $jenis_pesanan_item2['nama'];
 } ?>

   <!-- Main content -->
   <section class="content" style="margin-bottom:171px;">

     <!-- /.row -->
     <!-- Main row -->
     <div class="row">
       <!-- Left col -->

   <!-- /.content -->


   <!-- /.col -->
   <div class="col-md-12">

         <div class="row">

           <div class="col-md-12">
               <div class="box">
                 <div class="box-body">
                   <div class="alert alert-danger alert-dismissible text-center" style="display: none;">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-ban"></i> Peringatan</h4>
                     Belum ada item yang dimasukkan!
                   </div>


                   <!-- Left Form -->
                     <div class="col-md-6">
                       <!-- select -->
                       <div class="form-group col-md-12">
                         <label>Jenis Pesanan</label>
                         <select id="jenis_pesanan" name="jenis_pesanan" class="form-control select2">
                           <?php foreach ($jenis_pesanan_view as $jenis_pesanan_item) { ?>
                           <option value="<?php echo $jenis_pesanan_item['kd_jenis_pesanan']; ?>" ><?php echo $jenis_pesanan_item['nama']; ?></option>
                          <?php } ?>
                         </select>
                       </div>
                       <!-- text input -->
                       <div class="form-group harga_jual col-md-12">
                         <label>Harga Jual</label>
                         <input id="harga_jual" name="harga_jual" type="text" class="form-control angkaSaja" placeholder="..." >
                         <label class="error" for="harga_jual" id="harga_jual_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                         <label class="vali" for="harga_jual" id="harga_jual_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan angka.</label>
                       </div>
                       <!-- text area -->
                       <div class="form-group keterangan col-md-12">
                         <label>Keterangan</label>
                         <textarea id="keterangan" name="keterangan" class="form-control" rows="3" placeholder="..."></textarea>
                         <label class="error" for="keterangan" id="keterangan_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
                       </div>

                     </div>
                   <!-- Right Form -->
                     <div class="col-md-6">
                       <!-- checkbox -->
                       <div class="form-group col-md-12 tgl">
                         <label>Tanggal Pemakaian</label>
                       </div>
                       <div class="form-group tgl col-md-12">
                         <div class="checkbox">
                           <label>
                             <input type="checkbox" name="pilih_semua" id="pilih_semua" value="1" onClick="toggle(this)"/> Pilih Semua
                           </div>
                           </label>
                           <?php
                           $tgl = $tanggal;
                            for ($i=1; $i <= $indeks; $i++) {?>
                             <div class="col-md-12 col-md-12">
                               <div class="checkbox">
                                 <label>
                                   <input id="checkboxs" type="checkbox" name="tgl[]" value="<?php echo $tgl; ?>" >
                                   <?php echo $tgl." <b>(Hari ".$i.")</b>"; ?>
                                 </label>
                               </div>
                             </div>
                             <?php $tgl = date('d-m-Y', strtotime('+'.$i.' days', strtotime($tanggal))); //operasi penjumlahan tanggal ?>
                           <?php } ?>
                           <label class="error" for="tgl" id="tgl_error" hidden><i class="fa fa-times-circle-o"></i> Pilih minimal satu tanggal.</label>
                       </div>

                       <script>
                       function toggle(pilih) {
                         checkboxes = document.getElementsByName('tgl[]');
                         for(var i=0, n=checkboxes.length;i<n;i++) {
                           checkboxes[i].checked = pilih.checked;
                         }
                       }
                       </script>
                     </div>

                     <!--button-->
                     <div class="form-group col-md-12">
                       <div style="z-index: 1000;" class="text-center">
                         <button style="margin-right: 10px; display: none;" id="batal_edit" name="button" type="submit" class="btn btn-danger" value="batal"><i class="fa fa-remove"></i> Batal</button>
                         <button style="display: none;" id="tombol_edit" name="button" type="submit" class="btn btn-warning" style="margin-right: 10px;" value="tombol_edit"><i class="fa fa-edit"></i> Edit</button>
                         <button id="tambah" name="button" type="submit" class="btn btn-success" style="margin-right: 10px;" value="tambah"><i class="fa fa-plus"></i> Tambah</button>
                       </div>
                     </div>

                     <!-- Table -->
                     <div class="col-md-12">
                     <div class="box-body table-responsive no-padding">
                       <div class="result">
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
                       </div>
                       </div>

                       <!--button-->
                         <div class="box-footer text-center">
                           <button id="simpan" name="button" type="submit" class="btn btn-success" value="simpan" ><i class="fa fa-save"></i> Simpan</button>
                         </div>
                     </div>
                     <!--button-->
                       <div class="col-md-12" style="margin-top: 30px;">
                         <div class="text-center">
                           <button id="kembali" name="button" type="submit" class="btn btn-primary" style="margin-right: 10px;" value="kembali"><i class="fa fa-arrow-left"></i> Kembali</button>
                           <button id="batal" name="button" type="submit" class="btn btn-danger" value="batal"><i class="fa fa-remove"></i> Batal</button>
                         </div>
                       </div>

                   </div>


                 </div>
                 <!-- /.box-body -->

             </div>
           </div>
         </div>
       </div>
 <!-- /.content-wrapper -->
 </section>
