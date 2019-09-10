<script>
$(document).ready(function(){

$('#modal-password').on('show.bs.modal', function (event) {

$('#old_password').val("");
$('#new_password').val("");

var button = $(event.relatedTarget) // Tombol dimana modal di tampilkan

// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
var kode = button.data('kode')

var modal = $(this)

// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .

$('#old_password').keypress(function(event) {
  var charCode = (event.which) ? event.which : event.keyCode
  if ((charCode >= 48 && charCode <= 57) || charCode == 32 || (charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122))
  {
    $(".form-group.old_password.has-error").attr("class", "form-group old_password");
    $("label#old_password_error").hide();
    $("label#old_password_vali").hide();
    $("label#old_password_cek").hide();
    return true;
    return false;
  }
  else {
    $(".form-group.old_password").attr("class", "form-group old_password has-error");
    $("label#old_password_error").hide();
    $("label#old_password_cek").hide();
    $("label#old_password_vali").show();
    return false;
  }
});

$('#new_password').keypress(function(event) {
  var charCode = (event.which) ? event.which : event.keyCode
  if ((charCode >= 48 && charCode <= 57) || charCode == 32 || (charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122))
  {
    $(".form-group.new_password.has-error").attr("class", "form-group new_password");
    $("label#new_password_error").hide();
    $("label#new_password_vali").hide();
    return true;
    return false;
  }
  else {
    $(".form-group.new_password").attr("class", "form-group new_password has-error");
    $("label#new_password_error").hide();
    $("label#new_password_vali").show();
    return false;
  }
});

$('.lihat').click(function(){
  if ($('#old_password').attr('type') == 'password') {
    $('#old_password').attr('type', 'text');
    $('.lihat').attr('class', 'lihat fa fa-lock');
  }
  else {
    $('#old_password').attr('type', 'password');
    $('.lihat').attr('class', 'lihat fa fa-unlock-alt');
  }
});

$('.lihat1').click(function(){
  if ($('#new_password').attr('type') == 'password') {
    $('#new_password').attr('type', 'text');
    $('.lihat1').attr('class', 'lihat1 fa fa-lock');
  }
  else {
    $('#new_password').attr('type', 'password');
    $('.lihat1').attr('class', 'lihat1 fa fa-unlock-alt');
  }
});

$('#change').click(function(){
  var old_password = $('#old_password').val();
  var new_password = $('#new_password').val();

  if (old_password == "" || new_password == "") {
    if (new_password == "") {
      $('.form-group.new_password').attr('class', 'form-group new_password has-error')
      $('#new_password_vali').hide();
      $('#new_password_error').show();
      $('input#new_password').focus();
    }
    if (old_password == "") {
      $('.form-group.old_password').attr('class', 'form-group old_password has-error')
      $('#old_password_vali').hide();
      $('#old_password_error').show();
      $('#old_password_cek').hide();
      $('input#old_password').focus();
    }
  }
  else{
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Pegawai/password/') ?>'+kode,
      dataType: 'JSON',
      data: {old_password: old_password, new_password: new_password},
      cache: false,
      success: function(result){
        if (result) {
          $('#modal-password').modal('hide');
          $('teks').text('Password berhasil diubah');
          $('#alert').attr('class', 'alert alert-success');
          $('#logo').attr('class', 'fa fa-check');

          setTimeout(function(){ $("#notif").fadeIn('slow');}, 500);
          setTimeout(function(){ $("#notif").fadeOut('slow');}, 3000);
          }
          else {
            $('.form-group.old_password').attr('class', 'form-group old_password has-error')
            $('#old_password_vali').hide();
            $('#old_password_error').hide();
            $('#old_password_cek').show();
            $('input#old_password').focus();
          }

      }
    });
  }

  });



});

});
</script>
