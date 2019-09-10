<!-- validasi tombol tambah -->
<script type="text/javascript">
  $(document).ready(function(){
  $("#ubah").click(function(){

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

    var back = '<?php echo $_GET['back']; ?>';

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('transaksi_klien/tombol_ubah/'.$pemesanan_item['kd_pemesanan']) ?>',
      data: {tipe_pesanan: tipe_pesanan, klien: klien, tgl: tgl, kota: kota, nama_event: nama_event, lokasi: lokasi},
      cache: false,
      success: function(result){
        if (nama_event != "" && lokasi != "") {
          if (back == 'rab') {
            window.location.href = "<?php echo site_url('rab/'.$pemesanan_item['kd_pemesanan'].'?notif=Data pemesanan berhasil diubah&alert=success&logo_notif=check') ?>";
          }
          else {
            window.location.href = "<?php echo site_url('pemesanan/pemesanan?notif=Data pemesanan berhasil diubah&alert=success&logo_notif=check') ?>";
          }
        }
      }
    })
  });

  $('#batal').click(function(){
    var back = '<?php echo $_GET['back']; ?>';
    $.ajax({
      url: "<?php echo site_url('transaksi_klien/kembali') ?>",
      cache: false,
      success: function(result){
        if (back == 'rab') {
          window.location.href = "<?php echo site_url('rab/'.$pemesanan_item['kd_pemesanan']) ?>";
        }
        else {
          window.location.href = "<?php echo site_url('pemesanan/pemesanan') ?>";
        }
      }
    })
  });

});
</script>
