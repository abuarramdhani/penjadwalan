<script type="text/javascript">
$(document).ready(function(){
  $('.select2').select2()
  $('.error').hide();
  $('.vali').hide();
  $('.cek').hide();

  var cek_username = "<?php echo $pegawai_item['username']; ?>";
  var cek_email = "<?php echo $pegawai_item['email']; ?>";

  $('#username').focus();

  $('#username').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z0-9_]/g, function(str) {
          $(".form-group.username.col-md-12").attr("class", "form-group username has-error col-md-12");
          $("label#username_error").hide();
          $("label#username_vali").show();
          return "";
    } ) );
  });

  $('#username').keydown(function() {
        $(".form-group.username.col-md-12.has-error").attr("class", "form-group username col-md-12");
        $('.error').hide();
        $('.vali').hide();
        $('.cek').hide();
        return true;
        return false;
  });

  $('#username').keyup(function(){
    var username = $('#username').val();

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Pegawai/cek3') ?>',
      dataType: 'JSON',
      data: {username: username, cek_username: cek_username},
      cache: false,
      success: function(result){
        if (result == "B") {
          $(".form-group.username.col-md-12").attr("class", "form-group username has-error col-md-12");
          $('label#username_cek').show();
          $('label#username_vali').hide();
          $('label#username_error').hide();
          $("input#username").focus();
        }
        else if (result == "D") {
          $('label#username_cek').hide();
        }
      }
    })
  });

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
    $th.val( $th.val().replace(/[^a-zA-Z0-9@.]/g, function(str) {
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
      cek_email = "error";
    }
  });

  $('#email').keyup(function(){
    var email = $('#email').val();

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Pegawai/cek3') ?>',
      dataType: 'JSON',
      data: {email: email, cek_email: cek_email},
      cache: false,
      success: function(result){
        if (result == "C") {
          $(".form-group.email.col-md-12").attr("class", "form-group email has-error col-md-12");
          $('label#email_cek').show();
          $('label#email_cek2').hide();
          $('label#email_vali').hide();
          $("input#email").focus();
        }
        else if (result == "D") {
          $('label#email_cek').hide();
        }
      }
    })
  });

  $('#password').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z0-9 ]/g, function(str) {
          $(".form-group.password.col-md-12").attr("class", "form-group password has-error col-md-12");
          $("label#password_error").hide();
          $("label#password_vali").show();
          return "";
    } ) );
  });

  $('#password').keydown(function() {
        $(".form-group.password.col-md-12.has-error").attr("class", "form-group password col-md-12");
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
  });

  $('.show').click(function(){
    if ($('#password').attr('type') == 'password') {
      $('#password').attr('type', 'text');
      $('.show').attr('class', 'show fa fa-lock');
    }
    else {
      $('#password').attr('type', 'password');
      $('.show').attr('class', 'show fa fa-unlock-alt');
    }
  });

  $('#npwp').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^0-9]/g, function(str) {
          $(".form-group.npwp.col-md-12").attr("class", "form-group npwp has-error col-md-12");
          $("label#npwp_error").hide();
          $("label#npwp_vali").show();
          return "";
    } ) );
  });

  $('#npwp').keydown(function() {
        $(".form-group.npwp.col-md-12.has-error").attr("class", "form-group npwp col-md-12");
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
  });

  $('#datepicker2').change(function(){
    $(".form-group.mulai_kerja.has-error.col-md-12").attr("class", "form-group mulai_kerja col-md-12");
    $("label#mulai_kerja_error").hide();
  });

});
</script>
