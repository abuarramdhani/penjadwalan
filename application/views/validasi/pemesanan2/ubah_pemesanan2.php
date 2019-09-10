<!-- validasi tombol tambah -->
<script type="text/javascript">
  $(document).ready(function(){

    $('#batal').click(function(){
      var back = '<?php echo $_GET['back']; ?>'
      $.ajax({
        url: "<?php echo site_url('transaksi_klien2/kembali2') ?>",
        cache: false,
        success: function(result){
          if (back == 'rab2') {
            window.location.href = "<?php echo site_url('rab2/'.$pemesanan_item['kd_pemesanan']); ?>";
          }
          else {
          window.location.href = "<?php echo site_url('pemesanan/pemesanan') ?>";
          }
        }
      })
    });

  $("#ubah").click(function(){
    var back = '<?php echo $_GET['back']; ?>'
    var tipe_pesanan = $('#tipe_pesanan').val();
    var klien = $('#klien').val();
    var tgl = $('#reservation').val();

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('transaksi_klien2/tombol_ubah2/'.$pemesanan_item['kd_pemesanan']) ?>',
      data: {tipe_pesanan: tipe_pesanan, klien: klien, tgl: tgl},
      cache: false,
      success: function(result){
        if (back == 'rab2') {
          window.location.href = "<?php echo site_url('rab2/'.$pemesanan_item['kd_pemesanan'].'?notif=Data pemesanan berhasil diubah&alert=success&logo_notif=check'); ?>";
        }
        else {
          window.location.href = '<?php echo site_url('pemesanan/pemesanan?notif=Data pemesanan berhasil diubah&alert=success&logo_notif=check') ?>';
        }
      }
    })
  });

});
</script>
