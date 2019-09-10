<script type="text/javascript">
$(document).ready(function(){
  $('.select2').select2()
  $('.error').hide();
  $('.vali').hide();
  $('.cek').hide();

  $('#username').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z0-9_]/g, function(str) {
          $(".form-group.username").attr("class", "form-group username has-error");
          $("label#username_error").hide();
          $("label#username_vali").show();
          return "";
    } ) );
  });

  $('#username').keydown(function() {
        $(".form-group.username.has-error").attr("class", "form-group username");
        $('.error').hide();
        $('.vali').hide();
        $('.cek').hide();
        return true;
        return false;
  });

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

});
</script>
