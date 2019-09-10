<script type="text/javascript">
$(document).ready(function(){

  $('.select2').select2();

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

  $('#uang_makan').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^0-9]/g, function(str) {
          $(".form-group.uang_makan.col-md-12").attr("class", "form-group uang_makan has-error col-md-12");
          $("label#uang_makan_error").hide();
          $("label#uang_makan_vali").show();
          return "";
    } ) );
  });

  $('#uang_makan').keydown(function() {
        $(".form-group.uang_makan.col-md-12.has-error").attr("class", "form-group uang_makan col-md-12");
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
  });



});
</script>
