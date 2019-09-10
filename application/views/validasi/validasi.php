<script type="text/javascript">
$(document).ready(function(){
  $('.error').hide();
  $('.vali').hide();

  $('.angkaSaja').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if (charCode >= 48 && charCode <= 57)
    {
      $(".form-group.semester.has-error").attr("class", "form-group semester");
      $('.error').hide();
      $('.vali').hide();
      return true;
      return false;
    }
    else {
      $(".form-group.semester").attr("class", "form-group semester has-error");
      $("label#semester_error").hide();
      $("label#semester_vali").show();
      return false;
    }
  });
  $('.hurufAngka').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if ((charCode >= 48 && charCode <= 57) || charCode == 46 || charCode == 32 || (charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122))
    {
      $(".form-group.nama.has-error").attr("class", "form-group nama");
      $('.error').hide();
      $('.vali').hide();
      return true;
      return false;
    }
    else {
      $(".form-group.nama").attr("class", "form-group nama has-error");
      $("label#nama_error").hide();
      $("label#nama_vali").show();
      return false;
    }
  });

  $('.hurufSpesial').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if ((charCode >= 58 && charCode <= 127)||(charCode >= 32 && charCode <= 47))
    {
      $(".form-group.jurusan.has-error").attr("class", "form-group jurusan");
      $('.error').hide();
      $('.vali').hide();
      return true;
      return false;
    }
    else {
      $(".form-group.jurusan").attr("class", "form-group jurusan has-error");
      $("label#jurusan_error").hide();
      $("label#jurusan_vali").show();
      return false;
    }
  });
  $('.hurufSaja').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if ((charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122) || charCode == 32 || charCode == 46)
    {
      $(".form-group.semester.has-error").attr("class", "form-group semester");
      $('.error').hide();
      $('.vali').hide();
      return true;
      return false;
    }
    else {
      $(".form-group.semester").attr("class", "form-group semester has-error");
      $("label#semester_error").hide();
      $("label#semester_vali").show();
      return false;
    }
  });
  $('.email').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if ((charCode >= 64 && charCode <= 90)||(charCode >= 97 && charCode <= 122)|| charCode == 46 ||(charCode >= 48 && charCode <= 57)|| charCode == 95)
    {
      $(".form-group.nama.has-error").attr("class", "form-group nama");
      $('.error').hide();
      $('.vali').hide();
      return true;
      return false;
    }
    else {
      $(".form-group.nama").attr("class", "form-group nama has-error");
      $("label#semester_error").hide();
      $("label#semester_vali").show();
      return false;
    }
  });
  });
  </script>
