<div class="modal fade" id="modal-pemesanan" >
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" style="text-align: center; color: #f39c12;"><i class="fa fa-info-circle"></i> <b>Detail pemesanan</b></h2>
      </div>
      <div class="modal-body">
        <p><b>Kode </b> <span id="1"></span></p>
        <p><b>Tipe Pesanan </b> <span id="2"></span></p>
        <p><b>Tanggal Mulai </b> <span id="3"></span></p>
        <p><b>Tanggal Selesai </b> <span id="4"></span></p>
        <p><b>Klien </b> <span id="5"></span></p>
        <p><b>Status </b> <span id="6"></span></p>
        <p><b>Ditambahkan Oleh </b> <span id="7"></span></p>
        <p><b>Watktu Penambahan </b> <span id="8"></span></p>
        <p><b>Diubah Oleh </b> <span id="9"></span></p>
        <p><b>Watktu Pengubahan </b> <span id="10"></span></p>


      </div>
      <div class="modal-footer" >
        <?php if ($_SESSION['akses'] == 'superadmin'): ?>
          <a id="rab" href="#" class="btn btn-warning pull-left">RAB</a>
        <?php endif; ?>
        <a id="pekerjaan_saya" href="#" class="btn btn-warning pull-left">Pekerjaan Saya</a>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
