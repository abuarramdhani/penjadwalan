<div class="modal modal-default fade" id="modal-lupa_password">
  <div class="modal-dialog modal-sm">
    <div class="box">
      <!-- /.box-body -->
      <!-- Loading (remove the following to stop the loading)-->
      <div class="overlay" hidden>
        <i class="fa fa-refresh fa-spin"></i>
      </div>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" style="text-align: center; color: #f39c12;"><i class="fa fa-question-circle"></i> <b>Lupa Password</b></h2>
      </div>
      <div class="modal-body" style="background: white;">
            <!-- end loading -->
        <div class="alert alert-success">
          <h4><i class="icon fa fa-info-circle"></i>Info</h4>
          <p>Harap tayakan ke admin apabila anda lupa username anda</p>
        </div>
        <div class="form-group new_username">
          <label>Username</label>
          <input id="new_username" type="text" class="form-control" name="new_username" placeholder="Masukkan username anda">
          <label class="error" for="new_username" id="new_username_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
          <label class="vali" for="new_username" id="new_username_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
          <label class="cek" for="new_username" id="new_username_cek" hidden><i class="fa fa-times-circle-o"></i> Username tidak terdaftar.</label>
        </div>
      </div>

      <style media="screen">
      #new_username_cek{
        font-size: 12px;
      }
      </style>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <button id="kirim" type="submit" class="btn btn-warning" style="margin-right: 10px;" value="kirim">Kirim</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
