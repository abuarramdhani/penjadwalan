<script type="text/javascript">
  $(document).ready(function(){
  $("#ubah").click(function(){

    var nama = $('#nama').val();
    var merk = $('#merk').val();
    var kategori = $('#kategori').val();
    var status = $('input[name = status]:checked').val();

    if (nama == "") {
      $('.form-group.nama.col-md-12').attr('class', 'form-group nama has-error col-md-12')
      $('.vali').hide();
      $('#nama_error').show();
      $('input#nama').focus();
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Tipe/tombol_ubah/'.$tipe_item['kd_tipe']) ?>',
      data: {nama: nama, merk: merk, kategori: kategori, status: status},
      cache: false,
      success: function(result){
        if (nama != '') {
          window.location.href = "<?php echo site_url('tipe/tipe?notif=Data tipe berhasil diubah&alert=success&logo_notif=check') ?>";
        }
      }
    })
  });

});
</script>
