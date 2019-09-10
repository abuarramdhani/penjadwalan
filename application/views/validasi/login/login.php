<script type="text/javascript">
  $(document).ready(function(){
  $("#login").click(function(){

    var username = $('#username').val();
    var password = $('#password').val();
    var remember = $('#remember:checked').val();;



    if (username == "" || password == "") {
      if (password == "") {
        $('.form-group.password').attr('class', 'form-group password has-error')
        $('.vali').hide();
        $('#password_error').show();
        $('input#password').focus();
      }
      if (username == "") {
        $('.form-group.username').attr('class', 'form-group username has-error')
        $('.vali').hide();
        $('#username_error').show();
        $('input#username').focus();
      }
    }
    else {
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('Login/login_action') ?>',
        dataType: 'JSON',
        data: {username: username, password: password, remember: remember},
        cache: false,
        success: function(result){
          if (result) {
            window.location.href = "<?php echo site_url('dashboard'); ?>"
          }
          else {
            $('teks').text('Username & Password tidak cocok');
            $('.logo-notif-login').attr("class", "logo-notif-login fa fa-ban");
            $('.alert').attr("class", "alert alert-danger");
          }
        }
      });
    }

  });
});
</script>
