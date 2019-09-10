<script type="text/javascript">
$(document).ready(function(){
  $('.error').hide();
  $('.vali').hide();
  $('.cek').hide();

  $('#kode').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if (charCode >= 48 && charCode <= 57)
    {
      $(".form-group.kode.col-md-12.has-error").attr("class", "form-group kode col-md-12");
      $("input#kode").attr("style", "background: white; color: black;");
      $('.error').hide();
      $('.vali').hide();
      $('.cek').hide();
      return true;
      return false;
    }
    else {
      $(".form-group.kode.col-md-12").attr("class", "form-group kode has-error col-md-12");
      $("label#kode_error").hide();
      $("label#kode_vali").show();
      $("label#kode_cek").hide();
      return false;
    }
  });

  $('#kode').keyup(function() {
    var kode = $(this).val();
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Jenis_pengeluaran/cek_kode') ?>',
      dataType: 'JSON',
      data: {kode: kode},
      cache: false,
      success: function(result){
        if (result) {
          $(".form-group.kode.col-md-12").attr("class", "form-group kode has-error col-md-12");
          $('label#kode_cek').show();
        }
        else {
          $('label#kode_cek').hide();
        }
      }
    })
  });

  $('#nama').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if ((charCode >= 65 && charCode <= 127)||(charCode >= 32 && charCode <= 47))
    {
      $(".form-group.nama.col-md-12.has-error").attr("class", "form-group nama col-md-12");
      $('.error').hide();
      $('.vali').hide();
      return true;
      return false;
    }
    else {
      $(".form-group.nama.col-md-12").attr("class", "form-group nama has-error col-md-12");
      $("label#nama_error").hide();
      $("label#nama_vali").show();
      return false;
    }
  });

});
</script>
