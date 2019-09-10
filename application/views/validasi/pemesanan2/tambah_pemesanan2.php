<!-- validasi tombol tambah -->
<script type="text/javascript">
  $(document).ready(function(){
  $("#selanjutnya").click(function(){

    var tipe_pesanan = $('#tipe_pesanan').val();
    var klien = $('#klien').val();
    var tgl = $('#reservation').val();

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('transaksi_klien2/tombol_selanjutnya2') ?>',
      data: {tipe_pesanan: tipe_pesanan, klien: klien, tgl: tgl},
      cache: false,
      success: function(result){
        window.location.href = "<?php echo site_url('pemesanan2/tambah_detail') ?>";
      }
    })
  });

});
</script>
