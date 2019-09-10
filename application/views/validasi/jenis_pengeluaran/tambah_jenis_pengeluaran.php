<script type="text/javascript">
  $(document).ready(function(){
  $("#simpan").click(function(){

    var kategori_biaya = $('#kategori_biaya').val();
    var nama = $('#nama').val();
    var status = $('input[name = status]:checked').val();

    if (nama == "") {
      $('.form-group.nama.col-md-12').attr('class', 'form-group nama has-error col-md-12')
      $('.vali').hide();
      $('#nama_error').show();
      $('input#nama').focus();
    }

    if (nama != '') {
          $.ajax({
            type: 'POST',
            url: '<?php echo site_url('Jenis_pengeluaran/tombol_simpan') ?>',
            data: {kategori_biaya: kategori_biaya, nama: nama, status: status},
            cache: false,
            success: function(result){
                window.location.href = "<?php echo site_url('jenis_pengeluaran/jenis_pengeluaran?notif=Data Jenis pengeluaran berhasil disimpan&alert=success&logo_notif=check') ?>";
            }
          });
        }
      });
});
</script>
