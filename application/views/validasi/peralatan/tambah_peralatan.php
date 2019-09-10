<script type="text/javascript">
  $(document).ready(function(){
  $("#simpan").click(function(){

    var kode1 = $('#kode').val();
    kode1 = kode1.toUpperCase();
    var teks = $('#tipe :selected').text();
    var split = teks.split(" || ");

    var kode2 = split[1];

    var kode = kode1+'-'+kode2;
    var tipe = $('#tipe').val();
    var kategori = $('#kategori').val();
    var status = $('input[name = status]:checked').val();

    if (kode1 == "") {
      $('.form-group.kode.col-md-12').attr('class', 'form-group kode has-error col-md-12')
      $('.vali').hide();
      $('#kode_error').show();
      $('input#kode').focus();
    }
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Peralatan/cek_kode') ?>',
      dataType: 'JSON',
      data: {kode: kode},
      cache: false,
      success: function(result){
        if (result) {
          $(".form-group.kode.col-md-12").attr("class", "form-group kode has-error col-md-12");
          $("input#kode").attr("style", "text-transform:uppercase; float: left; width: 50%; margin: 0px; background: red; color: white;");
          $('label#kode_cek').show();
          $('label#kode_error').hide();
          $('label#kode_vali').hide();
          $("input#kode").focus();
        }
        else {
          $.ajax({
            type: 'POST',
            url: '<?php echo site_url('Peralatan/tombol_simpan') ?>',
            data: {kode1: kode1, kode: kode, tipe: tipe, status: status},
            cache: false,
            success: function(result){
              if (kode1 != '') {
                window.location.href = "<?php echo site_url('peralatan/peralatan?notif=Data peralatan berhasil disimpan&alert=success&logo_notif=check') ?>";
              }
            }
          })
        }
      }
    })


  });

});
</script>
