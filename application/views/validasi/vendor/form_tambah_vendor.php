<script type="text/javascript">
$(document).ready(function(){
  $('.select2').select2()
  $('.error').hide();
  $('.vali').hide();
  $('.cek').hide();

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

  $('#hp').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^0-9+]/g, function(str) {
          $(".form-group.hp.col-md-12").attr("class", "form-group hp has-error col-md-12");
          $("label#hp_error").hide();
          $("label#hp_vali").show();
          return "";
    } ) );
  });

  $('#hp').keydown(function() {
        $(".form-group.hp.col-md-12.has-error").attr("class", "form-group hp col-md-12");
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
  });

  $('#alamat').keydown(function() {
      $(".form-group.alamat.has-error.col-md-12").attr("class", "form-group alamat col-md-12");
      $("label#alamat_error").hide();
      $("label#alamat_cek").hide();
      return true;
      return false;
  });

  $('#email').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z@0-9. ]/g, function(str) {
          $(".form-group.email.col-md-12").attr("class", "form-group email has-error col-md-12");
          $("label#email_error").hide();
          $("label#email_vali").show();
          return "";
    } ) );
  });

  $('#email').keydown(function() {
        $(".form-group.email.col-md-12.has-error").attr("class", "form-group email col-md-12");
        $('.error').hide();
        $('.vali').hide();
        $('.cek').hide();
        return true;
        return false;
  });

  $('#email').change(function(){
    var email = $('#email').val();

    if (email.indexOf("@") < 0 || email.lastIndexOf(".") < 0 || email.lastIndexOf('@') > email.lastIndexOf('.')) {
      $(".form-group.email.col-md-12").attr("class", "form-group email has-error col-md-12");
      $("label#email_cek2").show();

      if(email == ""){
        $("input#email").attr("style", "background: white; color: black;");
        $(".form-group.email.has-error.col-md-12").attr("class", "form-group email col-md-12");
        $('label#email_cek').hide();
        $('label#email_cek2').hide();
        $('label#email_vali').hide();
      }
    }
  });

  $('#email').keyup(function(){
    var email = $('#email').val();

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Vendor/cek_email') ?>',
      dataType: 'JSON',
      data: {email: email},
      cache: false,
      success: function(result){
        if (result) {
          $(".form-group.email.col-md-12").attr("class", "form-group email has-error col-md-12");
          $('label#email_cek').show();
          $('label#email_cek2').hide();
          $('label#email_vali').hide();
          $("input#email").focus();
        }
        else {
          $('label#email_cek').hide();
        }
      }
    })
  });
});
</script>
