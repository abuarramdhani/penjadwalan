<script type="text/javascript">
  $(document).ready(function(){
  $("#simpan").click(function(){

    var nama = $('#nama').val();
    var status = $('input[name = status]:checked').val();

    if (nama == "") {
      $('.form-group.nama.col-md-12').attr('class', 'form-group nama has-error col-md-12')
      $('.vali').hide();
      $('#nama_error').show();
      $('input#nama').focus();
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Kategori/tombol_simpan') ?>',
      data: {nama: nama, status: status},
      cache: false,
      success: function(result){
        if (nama != '') {
          window.location.href = "<?php echo site_url('kategori/kategori?notif=Data kategori berhasil disimpan&alert=success&logo_notif=check') ?>";
        }
      }
    })
  });

});
</script>
