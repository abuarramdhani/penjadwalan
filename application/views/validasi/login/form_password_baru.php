<script type="text/javascript">
$(document).ready(function(){
  $('.select2').select2()
  $('.error').hide();
  $('.vali').hide();
  $('.cek').hide();

  $('#password').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z0-9 ]/g, function(str) {
          $(".form-group.password").attr("class", "form-group password has-error");
          $("label#password_error").hide();
          $("label#password_vali").show();
          return "";
    } ) );
  });

  $('#password').keydown(function() {
        $(".form-group.password.has-error").attr("class", "form-group password");
        $('.error').hide();
        $('.vali').hide();
        $('.cek').hide();
        return true;
        return false;
  });

  $('#password1').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z0-9 ]/g, function(str) {
          $(".form-group.password1").attr("class", "form-group password1 has-error");
          $("label#password1_error").hide();
          $("label#password1_vali").show();
          return "";
    } ) );
  });

  $('#password1').keydown(function() {
        $(".form-group.password1.has-error").attr("class", "form-group password1");
        $('.error').hide();
        $('.vali').hide();
        $('.cek').hide();
        return true;
        return false;
  });

  $('#password').keyup(function(event) {
    var password = $('#password').val();
    var password1 = $('#password1').val();

    if (password != password1) {
      $(".form-group.password1").attr("class", "form-group password1 has-error");
      $("label#password1_error").hide();
      $("label#password1_cek").show();
      $("label#password1_cek1").hide();
    }
    else {
      $(".form-group.password1").attr("class", "form-group password1 has-success");
      $("input#password1").attr("style", "background: white; color: black;");
      $("label#password1_error").hide();
      $("label#password1_vali").hide();
      $("label#password1_cek").hide();
      $("label#password1_cek1").show();
    }
  });

  $('#password1').keyup(function(event) {
    var password = $('#password').val();
    var password1 = $('#password1').val();

    if (password != password1) {
      $(".form-group.password1").attr("class", "form-group password1 has-error");
      $("label#password1_error").hide();
      $("label#password1_cek").show();
      $("label#password1_cek1").hide();
    }
    else {
      $(".form-group.password1").attr("class", "form-group password1 has-success");
      $("input#password1").attr("style", "background: white; color: black;");
      $("label#password1_error").hide();
      $("label#password1_vali").hide();
      $("label#password1_cek").hide();
      $("label#password1_cek1").show();
    }
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

  $('.show1').click(function(){
    if ($('#password1').attr('type') == 'password') {
      $('#password1').attr('type', 'text');
      $('.show1').attr('class', 'show1 fa fa-lock');
    }
    else {
      $('#password1').attr('type', 'password');
      $('.show1').attr('class', 'show1 fa fa-unlock-alt');
    }
  });

});
</script>
