<script type="text/javascript">
$(document).ready(function(){

  $('.select2').select2();

  $('.error').hide();
  $('.vali').hide();

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
