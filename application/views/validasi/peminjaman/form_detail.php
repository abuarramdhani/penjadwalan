<script type="text/javascript">
$(document).ready(function(){
  $('.error').hide();
  $('.vali').hide();

  $('#nama_alat').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if ((charCode >= 48 && charCode <= 57) || charCode == 46 || charCode == 32 || (charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122) || charCode == 8)
    {
      $(".form-group.nama_alat.col-md-12.has-error").attr("class", "form-group nama_alat col-md-12");
      $('.error').hide();
      $('.vali').hide();
      return true;
      return false;
    }
    else {
      $(".form-group.nama_alat.col-md-12").attr("class", "form-group nama_alat has-error col-md-12");
      $("label#nama_alat_error").hide();
      $("label#nama_alat_vali").show();
      return false;
    }
  });

  $('#harga_sewa').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if (charCode >= 48 && charCode <= 57 || charCode == 8)
    {
      $(".form-group.harga_sewa.col-md-12.has-error").attr("class", "form-group harga_sewa col-md-12");
      $('.error').hide();
      $('.vali').hide();
      return true;
      return false;
    }
    else {
      $(".form-group.harga_sewa.col-md-12").attr("class", "form-group harga_sewa has-error col-md-12");
      $("label#harga_sewa_error").hide();
      $("label#harga_sewa_vali").show();
      return false;
    }
  });

  $('#jumlah').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if (charCode >= 48 && charCode <= 57 || charCode == 8)
    {
      $(".form-group.jumlah.col-md-12.has-error").attr("class", "form-group jumlah col-md-12");
      $('.error').hide();
      $('.vali').hide();
      return true;
      return false;
    }
    else {
      $(".form-group.jumlah.col-md-12").attr("class", "form-group jumlah has-error col-md-12");
      $("label#jumlah_error").hide();
      $("label#jumlah_vali").show();
      return false;
    }
  });

});
</script>
