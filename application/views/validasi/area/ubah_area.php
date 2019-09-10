<script type="text/javascript">
  $(document).ready(function(){
  $("#ubah").click(function(){

    var nama = $('#nama').val();
    var uang_makan = $('#uang_makan').val();
    var status = $('input[name = status]:checked').val();

    if (nama == "") {
      $('.form-group.nama.col-md-12').attr('class', 'form-group nama has-error col-md-12')
      $('.vali').hide();
      $('#nama_error').show();
      $('input#nama').focus();
    }

    if (uang_makan == "") {
      $('.form-group.uang_makan.col-md-12').attr('class', 'form-group uang_makan has-error col-md-12')
      $('.vali').hide();
      $('#uang_makan_error').show();
      $('input#uang_makan').focus();
    }

    if (nama == "" && uang_makan == "") {
      $('input#nama').focus();
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Area/tombol_ubah/'.$area_item['kd_area']) ?>',
      data: {nama: nama, uang_makan: uang_makan, status: status},
      cache: false,
      success: function(result){
        if (nama != '' && uang_makan != '' && status != '') {
          window.location.href = "<?php echo site_url('area/area?notif=Data area berhasil diubah&alert=success&logo_notif=check') ?>";
        }
      }
    })
  });

});
</script>
