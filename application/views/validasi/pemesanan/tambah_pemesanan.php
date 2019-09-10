<!-- validasi tombol tambah -->
<script type="text/javascript">
  $(document).ready(function(){
  $("#selanjutnya").click(function(){

    var tipe_pesanan = $('#tipe_pesanan').val();
    var klien = $('#klien').val();
    var tgl = $('#reservation').val();
    var kota = $('#kota').val();
    var nama_event = $('#nama_event').val();
    var lokasi = $('#lokasi').val();

    if (nama_event == "") {
      $('.form-group.nama_event.col-md-12').attr('class', 'form-group nama_event has-error col-md-12')
      $('#nama_event_error').show();
      $('input#nama_event').focus();
    }

    if (lokasi == "") {
      $('.form-group.lokasi.col-md-12').attr('class', 'form-group lokasi has-error col-md-12')
      $('#lokasi_error').show();
      $('input#lokasi').focus();
    }

    if (nama_event == "" && lokasi == "") {
      $('input#nama_event').focus();
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('transaksi_klien/tombol_selanjutnya') ?>',
      data: {tipe_pesanan: tipe_pesanan, klien: klien, tgl: tgl, kota: kota, nama_event: nama_event, lokasi: lokasi},
      cache: false,
      success: function(result){
        if (nama_event != "" && lokasi != "") {
          window.location.href = "<?php echo site_url('pemesanan/tambah_detail') ?>";
        }
      }
    })
  });

});
</script>
