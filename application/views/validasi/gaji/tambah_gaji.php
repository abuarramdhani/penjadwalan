<script type="text/javascript">
  $(document).ready(function(){
  $("#simpan").click(function(){

    var gaji = $('#gaji').val();
    var magang = $('#magang').val();
    var pekerjaan = $('#pekerjaan').val();
    var area = $('#area').val();
    var status = $('input[name = status]:checked').val();

    if (gaji == "") {
      $('.form-group.gaji.col-md-12').attr('class', 'form-group gaji has-error col-md-12')
      $('.vali').hide();
      $('#gaji_error').show();
      $('input#gaji').focus();
    }

    if (magang == "") {
      $('.form-group.magang.col-md-12').attr('class', 'form-group magang has-error col-md-12')
      $('.vali').hide();
      $('#magang_error').show();
      $('input#magang').focus();
    }

    if (gaji == "" && magang == "") {
      $('input#gaji').focus();
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Gaji/tombol_simpan') ?>',
      data: {gaji: gaji, magang: magang, pekerjaan: pekerjaan, area: area, status: status},
      cache: false,
      success: function(result){
        if (gaji != '' && magang != '') {
          window.location.href = "<?php echo site_url('gaji/gaji?notif=Data gaji berhasil disimpan&alert=success&logo_notif=check') ?>";
        }
      }
    })
  });

});
</script>
