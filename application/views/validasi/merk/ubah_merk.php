<script type="text/javascript">
  $(document).ready(function(){
  $("#ubah").click(function(){

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
      url: '<?php echo site_url('Merk/tombol_ubah/'.$merk_item['kd_merk']) ?>',
      data: {nama: nama, status: status},
      cache: false,
      success: function(result){
        if (nama != '') {
          window.location.href = "<?php echo site_url('merk/merk?notif=Data merk berhasil diubah&alert=success&logo_notif=check') ?>";
        }
      }
    })
  });

});
</script>
