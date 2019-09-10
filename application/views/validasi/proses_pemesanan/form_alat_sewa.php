<script type="text/javascript">
$(document).ready(function(){

  $('.error').hide();
  $('.vali').hide();

  $('#nama_alat').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z0-9()/\- ]/g, function(str) {
          $(".form-group.nama_alat.col-md-12").attr("class", "form-group nama_alat has-error col-md-12");
          $("label#nama_alat_error").hide();
          $("label#nama_alat_vali").show();
          return "";
    } ) );
  });

  $('#nama_alat').keydown(function() {
        $(".form-group.nama_alat.col-md-12.has-error").attr("class", "form-group nama_alat col-md-12");
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
  });

  $('#jumlah').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^0-9]/g, function(str) {
          $(".form-group.jumlah.col-md-12").attr("class", "form-group jumlah has-error col-md-12");
          $("label#jumlah_error").hide();
          $("label#jumlah_vali").show();
          return "";
    } ) );
  });

  $('#jumlah').keydown(function() {
        $(".form-group.jumlah.col-md-12.has-error").attr("class", "form-group jumlah col-md-12");
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
  });

  $('#harga').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^0-9]/g, function(str) {
          $(".form-group.harga.col-md-12").attr("class", "form-group harga has-error col-md-12");
          $("label#harga_error").hide();
          $("label#harga_vali").show();
          return "";
    } ) );
  });

  $('#harga').keydown(function() {
        $(".form-group.harga.col-md-12.has-error").attr("class", "form-group harga col-md-12");
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
  });

});
</script>
