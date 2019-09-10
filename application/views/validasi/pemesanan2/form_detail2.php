<script type="text/javascript">
$(document).ready(function(){

  $('.error').hide();
  $('.vali').hide();

  $('#harga_jual').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^0-9]/g, function(str) {
          $(".form-group.harga_jual.col-md-12").attr("class", "form-group harga_jual has-error col-md-12");
          $("label#harga_jual_error").hide();
          $("label#harga_jual_vali").show();
          return "";
    } ) );
  });

  $('#harga_jual').keydown(function() {
        $(".form-group.harga_jual.col-md-12.has-error").attr("class", "form-group harga_jual col-md-12");
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
  });

  $('#keterangan').keydown(function() {
    $(".form-group.keterangan.has-error.col-md-12").attr("class", "form-group keterangan col-md-12");
    $('.error').hide();
    $('.vali').hide();
  });
});
</script>
