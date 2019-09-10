<script type="text/javascript">
  $(document).ready(function(){
  $("#simpan").click(function(){

    var nama = $('#nama').val();
    var area = $('#area').val();
    var status = $('input[name = status]:checked').val();

    if (nama == "") {
      $('.form-group.nama.col-md-12').attr('class', 'form-group nama has-error col-md-12')
      $('.vali').hide();
      $('#nama_error').show();
      $('input#nama').focus();
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Kota/tombol_simpan') ?>',
      data: {nama: nama, area: area, status: status},
      cache: false,
      success: function(result){
        if (nama != '') {
          window.location.href = "<?php echo site_url('kota/kota?notif=Data kota berhasil disimpan&alert=success&logo_notif=check') ?>";
        }
      }
    })
  });

});
</script>
