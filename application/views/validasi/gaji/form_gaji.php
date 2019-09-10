<script type="text/javascript">
$(document).ready(function(){

  $('.select2').select2();
  $('.maskedTextField').maskAsNumber();

  $('.error').hide();
  $('.vali').hide();

  $('#gaji').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^0-9]/g, function(str) {
          $(".form-group.gaji.col-md-12").attr("class", "form-group gaji has-error col-md-12");
          $("label#gaji_error").hide();
          $("label#gaji_vali").show();
          return "";
    } ) );
  });

  $('#gaji').keydown(function() {
        $(".form-group.gaji.col-md-12.has-error").attr("class", "form-group gaji col-md-12");
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
  });

  $('#magang').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^0-9]/g, function(str) {
          $(".form-group.magang.col-md-12").attr("class", "form-group magang has-error col-md-12");
          $("label#magang_error").hide();
          $("label#magang_vali").show();
          return "";
    } ) );
  });

  $('#magang').keydown(function() {
        $(".form-group.magang.col-md-12.has-error").attr("class", "form-group magang col-md-12");
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
  });

});
</script>
