<div class="modal fade" id="modal-konfirmasi">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="text-align: center;"><i class="fa fa-info-circle"></i> <b>Konfirmasi Pengembalian</b></h4>
      </div>
      <div class="modal-body">


          <div class="form-group">
            <label>Tanggal Pengembalian</label>

            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input id="tgl" type="date" name="tgl" class="form-control pull-right" placeholder="dd-mm-yyyyy" min="<?php echo date("Y-m-d");?>" >
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn pull-left" data-dismiss="modal">Batal</button>
        <button id="konfirmasi" type="submit" class="btn btn-info" style="margin-right: 10px;" value="konfirmasi">Konfirmasi</button>
      </div>
    
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
