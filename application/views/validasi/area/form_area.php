<script type="text/javascript">
$(document).ready(function(){
  $('.error').hide();
  $('.vali').hide();
  $('#nama').focus();

  $('#nama').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z ]/g, function(str) {
          $(".form-group.nama.col-md-12").attr("class", "form-group nama has-error col-md-12");
          $("label#nama_error").hide();
          $("label#nama_vali").show();
          return "";
    } ) );
  });

  $('#nama').keydown(function() {
      $(".form-group.nama.col-md-12.has-error").attr("class", "form-group nama col-md-12");
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
