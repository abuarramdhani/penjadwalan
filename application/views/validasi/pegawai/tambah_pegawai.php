<script type="text/javascript">
  $(document).ready(function(){
  $("#simpan").click(function(){

    var username = $('#username').val();
    var nama = $('#nama').val();
    var hp = $('#hp').val();
    var alamat = $('#alamat').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var npwp = $('#npwp').val();
    var jabatan = $('#jabatan').val();
    var mulai_kerja = $('#datepicker2').val();
    var status_user = $('input[name = status_user]:checked').val();
    var status = $('input[name = status]:checked').val();

    if (mulai_kerja == "") {
      $('.form-group.mulai_kerja.col-md-12').attr('class', 'form-group mulai_kerja has-error col-md-12')
      $('.vali').hide();
      $('#mulai_kerja_error').show();
      $('input#mulai_kerja').focus();
    }
    if (hp == "") {
      $('.form-group.hp.col-md-12').attr('class', 'form-group hp has-error col-md-12')
      $('.vali').hide();
      $('#hp_error').show();
      $('input#hp').focus();
    }
    if (alamat == "") {
      $('.form-group.alamat.col-md-12').attr('class', 'form-group alamat has-error col-md-12')
      $('.vali').hide();
      $('#alamat_error').show();
      $('textarea#alamat').focus();
    }
    if (email == "") {
      $('.form-group.email.col-md-12').attr('class', 'form-group email has-error col-md-12')
      $('.vali').hide();
      $('#email_error').show();
      $('input#email').focus();
    }
    else {
      if (email.indexOf("@") < 0 || email.lastIndexOf(".") < 0 || email.lastIndexOf('@') > email.lastIndexOf('.')) {
        $(".form-group.email.col-md-12").attr("class", "form-group email has-error col-md-12");
        $("input#email").attr("style", "background: red; color: white;");
        $("input#email").focus();
        $("label#email_cek2").show();
      }
    }
    if (nama == "") {
      $('.form-group.nama.col-md-12').attr('class', 'form-group nama has-error col-md-12')
      $('.vali').hide();
      $('#nama_error').show();
      $('input#nama').focus();
    }
    if (password == "") {
      $('.form-group.password.col-md-12').attr('class', 'form-group password has-error col-md-12')
      $('.vali').hide();
      $('#password_error').show();
      $('input#password').focus();
    }
    if (username == "") {
      $('.form-group.username.col-md-12').attr('class', 'form-group username has-error col-md-12')
      $('.vali').hide();
      $('#username_error').show();
      $('input#username').focus();
    }

    if (npwp == "") {
      npwp = "-";
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Pegawai/cek') ?>',
      dataType: 'JSON',
      data: {username: username, email: email},
      cache: false,
      success: function(result){
        if (result == "A") {
          $(".form-group.username.col-md-12").attr("class", "form-group username has-error col-md-12");
          $(".form-group.email.col-md-12").attr("class", "form-group email has-error col-md-12");
          $("input#username").attr("style", "background: red; color: white;");
          $("input#email").attr("style", "background: red; color: white;");
          $('label#username_cek').show();
          $('label#email_cek').show();
          $('label#username_vali').hide();
          $('label#email_vali').hide();
          $("input#username").focus();
        }
        else if (result == "B") {
          $(".form-group.username.col-md-12").attr("class", "form-group username has-error col-md-12");
          $("input#username").attr("style", "background: red; color: white;");
          $('label#username_cek').show();
          $('label#username_vali').hide();
          $("input#username").focus();
          $('label#email_cek').hide();
        }
        else if (result == "C") {
          $(".form-group.email.col-md-12").attr("class", "form-group email has-error col-md-12");
          $("input#email").attr("style", "background: red; color: white;");
          $('label#email_cek').show();
          $('label#email_vali').hide();
          $("input#email").focus();
          $('label#username_cek').hide();
        }
        else if (result == "D") {
          if (email.indexOf("@") > 0 && email.lastIndexOf(".") > 0 && email.lastIndexOf('@') < email.lastIndexOf('.')) {
            $.ajax({
              type: 'POST',
              url: '<?php echo site_url('Pegawai/tombol_simpan') ?>',
              data: {username: username, password: password, nama: nama, hp: hp, alamat: alamat, email: email, npwp: npwp, jabatan: jabatan, mulai_kerja: mulai_kerja, status_user:status_user, status: status},
              cache: false,
              success: function(result){
                if (username != "" && password != "" && nama != '' && hp != '' && email != "" && alamat != '' && mulai_kerja != "") {
                  window.location.href = "<?php echo site_url('pegawai/pegawai?notif=Data klien berhasil disimpan&alert=success&logo_notif=check') ?>";
                }
              }
            })
          }
        }
      }
    });

  });
});
</script>
