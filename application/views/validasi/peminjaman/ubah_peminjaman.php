<!-- validasi tombol tambah -->
<script type="text/javascript">
  $(document).ready(function(){
  $("#ubah").click(function(){

    var vendor = $('#vendor').val();
    var tgl = $('#reservation').val();

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('transaksi_vendor/tombol_ubah/'.$peminjaman_item['kd_peminjaman']) ?>',
      data: {vendor: vendor, tgl: tgl},
      cache: false,
      success: function(result){

          window.location.href = "<?php echo site_url('peminjaman/peminjaman?notif=Data peminjaman berhasil diubah&alert=success&logo_notif=check') ?>";
      }
    })
  });

  $('#batal').click(function(){
    $.ajax({
      url: "<?php echo site_url('transaksi_vendor/kembali') ?>",
      cache: false,
      success: function(result){
        window.location.href = "<?php echo site_url('peminjaman/peminjaman') ?>";
      }
    })
  });

});
</script>
