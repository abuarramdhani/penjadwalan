<script type="text/javascript">
  $(document).ready(function(){
  $("#simpan").click(function(){

    var username = '<?php echo $username; ?>';
    var password = $('#password').val();
    var password1 = $('#password1').val();

    if (password == "" || password1 == "") {
      if (password1 == "") {
        $('.form-group.password1').attr('class', 'form-group password1 has-error');
        $("label#password1_cek").hide();
        $("label#password1_cek1").hide();
        $('.vali').hide();
        $('#password1_error').show();
        $('input#password1').focus();
      }
      if (password == "") {
        $('.form-group.password').attr('class', 'form-group password has-error');
        $('.vali').hide();
        $('#password_error').show();
        $('input#password').focus();
      }
    }
    else if (password != password1) {
      $(".form-group.password1").attr("class", "form-group password1 has-error");
      $("input#password1").attr("style", "background: red; color: white;");
      $("label#password1_error").hide();
      $("label#password1_vali").hide();
      $("label#password1_cek").show();
      $("label#password1_cek1").hide();
    }
    else {
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('Login/simpan_password_baru') ?>',
        dataType: 'JSON',
        data: {username: username, password: password, password1: password1},
        cache: false,
        success: function(result){
          if (result) {
            window.location.href = "<?php echo site_url('dashboard?notif=Password baru berhasil disimpan&alert=success&logo_notif=check'); ?>"
          }
        }
      });
    }

  });
});
</script>
