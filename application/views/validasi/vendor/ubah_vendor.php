<script type="text/javascript">
  $(document).ready(function(){
  $("#ubah").click(function(){

    var nama = $('#nama').val();
    var hp = $('#hp').val();
    var alamat = $('#alamat').val();
    var email = $('#email').val();
    var status = $('input[name = status]:checked').val();

    if (nama == "") {
      $('.form-group.nama.col-md-12').attr('class', 'form-group nama has-error col-md-12')
      $('.vali').hide();
      $('#nama_error').show();
      $('input#nama').focus();
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

    if (nama == "" && hp == "" && alamat == "") {
      $('#nama').focus();
    }

    if (nama == "" && hp != "" && alamat == "") {
      $('#nama').focus();
    }

    if (nama == "" && hp == "" && alamat != "") {
      $('#nama').focus();
    }

    if (nama != "" && hp == "" && alamat == "") {
      $('#hp').focus();
    }

    else if(email == "")
    {
      email = "-";

      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('Vendor/tombol_ubah/'.$vendor_item['kd_vendor']) ?>',
        data: {nama: nama, hp: hp, alamat: alamat, email: email, status: status},
        cache: false,
        success: function(result){
          if (nama != '' && hp != '' && alamat != '') {
            window.location.href = "<?php echo site_url('vendor/vendor?notif=Data vendor berhasil diubah&alert=success&logo_notif=check') ?>";
          }
        }
      })
    }

  else if (email.indexOf("@") < 0 || email.lastIndexOf(".") < 0 || email.lastIndexOf('@') > email.lastIndexOf('.')) {
    $(".form-group.email.col-md-12").attr("class", "form-group email has-error col-md-12");
    $("input#email").attr("style", "background: red; color: white;");
    $("input#email").focus();
    $("label#email_cek2").show();
  }
  else {
    var cek = '<?php echo $vendor_item['email'] ?>';

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Vendor/cek_email2') ?>',
      dataType: 'JSON',
      data: {cek: cek, email: email},
      cache: false,
      success: function(result){
        if (result) {
          $(".form-group.email.col-md-12").attr("class", "form-group email has-error col-md-12");
          $("input#email").attr("style", "background: red; color: white;");
          $('label#email_cek').show();
          $('label#email_vali').hide();
          $("input#email").focus();
        }
        else {
          $.ajax({
            type: 'POST',
            url: '<?php echo site_url('Vendor/tombol_ubah/'.$vendor_item['kd_vendor']) ?>',
            data: {nama: nama, hp: hp, alamat: alamat, email: email, status: status},
            cache: false,
            success: function(result){
              if (nama != '' && hp != '' && alamat != '') {
                window.location.href = "<?php echo site_url('vendor/vendor?notif=Data vendor berhasil diubah&alert=success&logo_notif=check') ?>";
              }
            }
          })
        }
      }
    })
  }

  });

});
</script>
