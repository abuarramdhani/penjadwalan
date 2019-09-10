<script>
$(document).ready(function(){

$('#modal-lupa_password').on('show.bs.modal', function (event) {

$('#new_username').val("");

$('#new_username').keypress(function(event) {
  var charCode = (event.which) ? event.which : event.keyCode
  if ((charCode >= 48 && charCode <= 57) || charCode == 32 || (charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122))
  {
    $(".form-group.new_username.has-error").attr("class", "form-group new_username");
    $("label#new_username_error").hide();
    $("label#new_username_cek").hide();
    $("label#new_username_vali").hide();
    return true;
    return false;
  }
  else if (charCode == 13) {
    $('#kirim').click();
  }
  else {
    $(".form-group.new_username").attr("class", "form-group new_username has-error");
    $("label#new_username_error").hide();
    $("label#new_username_cek").hide();
    $("label#new_username_vali").show();
    return false;
  }
});

$('#kirim').click(function(){
  var new_username = $('#new_username').val();

  if (new_username == "") {
    $('.form-group.new_username').attr('class', 'form-group new_username has-error')
    $('#new_username_vali').hide();
    $('#new_username_cek').hide();
    $('#new_username_error').show();
    $('input#new_username').focus();
  }
  else{
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url("Login/lupa_password") ?>',
      dataType: 'JSON',
      data: {new_username: new_username},
      cache: false,
      beforeSend: function(){
        $('.overlay').show();
      },
      success: function(result){
        if(result){
          $.ajax({
            url: "<?php echo site_url('Login/kirim_email') ?>",
            async: false
          })
          $('.overlay').hide();
          $('#modal-lupa_password').modal('hide');
          $('#modal-info').modal('show');
        }
        else {
          $('.overlay').hide();
          $('.form-group.new_username').attr('class', 'form-group new_username has-error')
          $('#new_username_vali').hide();
          $('#new_username_cek').show();
          $('#new_username_error').hide();
          $('input#new_username').focus();
        }
      }
    });
  }

  });

});

});
</script>
