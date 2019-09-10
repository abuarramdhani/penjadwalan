<div class="modal modal-default fade" id="modal-password">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" style="text-align: center; color: #f39c12;"><i class="fa fa-lock"></i> <b>Ubah Password</b></h2>
      </div>
      <div class="modal-body" style="background: white;">
          <div class="form-group old_password">
            <label>Password Lama</label>
            <input id="old_password" type="password" class="form-control" name="old_password" placeholder="...">
            <i class="lihat fa fa-unlock-alt"></i>
            <label class="error" for="old_password" id="old_password_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
            <label class="vali" for="old_password" id="old_password_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
            <label class="cek" for="old_password" id="old_password_cek" hidden><i class="fa fa-times-circle-o"></i> Password salah.</label>
          </div>
          <div class="form-group new_password">
            <label>Password Baru</label>
            <input id="new_password" type="password" class="form-control" name="new_password" placeholder="...">
            <i class="lihat1 fa fa-unlock-alt"></i>
            <label class="error" for="new_password" id="new_password_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
            <label class="vali" for="new_password" id="new_password_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
          </div>
      </div>

      <style media="screen">
      .lihat, .lihat1 {
        color: black;
        float: right;
        margin-right: 10px;
        margin-top: -22px;
        position: relative;
        z-index: 2;
      }

      .lihat:hover, .lihat1:hover{
        cursor: pointer;
      }

      #new_password, #old_password{
        padding-right: 40px;
      }

      #new_password_error, #new_password_vali, #old_password_error, #old_password_vali, #old_password_cek{
        font-size: 12px;
      }
      </style>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <button id="change" type="submit" class="btn btn-warning" style="margin-right: 10px;" value="ubah">Ubah</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
