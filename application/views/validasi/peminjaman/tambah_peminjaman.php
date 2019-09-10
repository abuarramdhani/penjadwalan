<!-- validasi tombol tambah -->
<script type="text/javascript">
  $(document).ready(function(){
  $("#selanjutnya").click(function(){

    var vendor = $('#vendor').val();
    var tgl = $('#reservation').val();

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('transaksi_vendor/tombol_selanjutnya') ?>',
      data: {vendor: vendor, tgl: tgl},
      cache: false,
      success: function(result){
          window.location.href = "<?php echo site_url('peminjaman/tambah_detail') ?>";
      }
    })
  });

});
</script>
