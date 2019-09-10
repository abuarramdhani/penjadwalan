<!-- validasi tombol pilih -->
<script type="text/javascript">
  $(document).ready(function(){

    var rab_set = '<?php echo $_SESSION['rab']; ?>';
    $('input[value = '+ rab_set +']').prop('checked', true);

    var uang_makan = '<?php echo $pemesanan['uang_makan']; ?>';
    $('#uang_makan').val(uang_makan);

    $('#username').change(function(){
      $('.form-group.username.has-error.col-md-12').attr('class', 'form-group username col-md-12')
      $('#username_cek').hide();

      var sdm = $('#username').val();

      var split_sdm = sdm.split(" || ");
      var username = split_sdm[0];
      var status_pegawai = split_sdm[1];

      var p1 = $('#pekerjaan1').val();
      var split_pekerjaan1 = p1.split(" || ");
      var pekerjaan1 = split_pekerjaan1[0];
      var gaji1 = split_pekerjaan1[1];
      var magang1 = split_pekerjaan1[2];

      var p2 = $('#pekerjaan2').val();
      var split_pekerjaan2 = p2.split(" || ");
      var pekerjaan2 = split_pekerjaan2[0];
      var gaji2 = split_pekerjaan2[1];
      var magang2 = split_pekerjaan2[2];

      var p3 = $('#pekerjaan3').val();
      var split_pekerjaan3 = p3.split(" || ");
      var pekerjaan3 = split_pekerjaan3[0];
      var gaji3 = split_pekerjaan3[1];
      var magang3 = split_pekerjaan3[2];

      var d = 1;
      var gaji = 0;

      // if (pekerjaan1 == '-1') {
      //   $.ajax({
      //     type: "POST",
      //     url: '<?php// echo site_url("Proses_pemesanan/gaji_driver") ?>',
      //     cache: false,
      //     success: function(result){
      //       d = result;
      //       if (status_pegawai == 'tetap') {
      //         gaji = parseInt(gaji1/d)+parseInt(gaji2)+parseInt(gaji3);
      //       }
      //       else {
      //         gaji = parseInt(magang1/d)+parseInt(magang2)+parseInt(magang3);
      //       }
      //       $('#gaji').val(gaji);
      //     }
      //   });
      // }
      //
      // else if (pekerjaan2 == '-1') {
      //   $.ajax({
      //     type: "POST",
      //     url: '<?php// echo site_url("Proses_pemesanan/gaji_driver") ?>',
      //     cache: false,
      //     success: function(result){
      //       d = result;
      //       if (status_pegawai == 'tetap') {
      //         gaji = parseInt(gaji1)+parseInt(gaji2/d)+parseInt(gaji3);
      //       }
      //       else {
      //         gaji = parseInt(magang1)+parseInt(magang2/d)+parseInt(magang3);
      //       }
      //       $('#gaji').val(gaji);
      //     }
      //   });
      // }
      //
      // else if (pekerjaan3 == '-1') {
      //   $.ajax({
      //     type: "POST",
      //     url: '<?php// echo site_url("Proses_pemesanan/gaji_driver") ?>',
      //     cache: false,
      //     success: function(result){
      //       d = result;
      //       if (status_pegawai == 'tetap') {
      //         gaji = parseInt(gaji1)+parseInt(gaji2)+parseInt(gaji3/d);
      //       }
      //       else {
      //         gaji = parseInt(magang1)+parseInt(magang2)+parseInt(magang3/d);
      //       }
      //       $('#gaji').val(gaji);
      //     }
      //   });
      // }

      // else {
        if (status_pegawai == 'tetap') {
          gaji = parseInt(gaji1)+parseInt(gaji2)+parseInt(gaji3);
        }
        else {
          gaji = parseInt(magang1)+parseInt(magang2)+parseInt(magang3);
        }
        $('#gaji').val(gaji);
      // }

    });

    $('#pekerjaan1').change(function(){
      $('.form-group.pekerjaan1.has-error.col-md-12').attr('class', 'form-group pekerjaan1 col-md-12')
      $('#pekerjaan1_cek').hide();
      $('#pekerjaan1_error').hide();
      $('.form-group.pekerjaan2.has-error.col-md-12').attr('class', 'form-group pekerjaan2 col-md-12')
      $('#pekerjaan2_cek').hide();
      $('#pekerjaan2_error').hide();
      $('.form-group.pekerjaan3.has-error.col-md-12').attr('class', 'form-group pekerjaan3 col-md-12')
      $('#pekerjaan3_cek').hide();
      $('#pekerjaan3_error').hide();

      var sdm = $('#username').val();

      var split_sdm = sdm.split(" || ");
      var username = split_sdm[0];
      var status_pegawai = split_sdm[1];

      var p1 = $('#pekerjaan1').val();
      var split_pekerjaan1 = p1.split(" || ");
      var pekerjaan1 = split_pekerjaan1[0];
      var gaji1 = split_pekerjaan1[1];
      var magang1 = split_pekerjaan1[2];

      var p2 = $('#pekerjaan2').val();
      var split_pekerjaan2 = p2.split(" || ");
      var pekerjaan2 = split_pekerjaan2[0];
      var gaji2 = split_pekerjaan2[1];
      var magang2 = split_pekerjaan2[2];

      var p3 = $('#pekerjaan3').val();
      var split_pekerjaan3 = p3.split(" || ");
      var pekerjaan3 = split_pekerjaan3[0];
      var gaji3 = split_pekerjaan3[1];
      var magang3 = split_pekerjaan3[2];

      var d = 1;
      var gaji = 0;

      // if (pekerjaan1 == '-1') {
      //   $.ajax({
      //     type: "POST",
      //     url: '<?php// echo site_url("Proses_pemesanan/gaji_driver") ?>',
      //     cache: false,
      //     success: function(result){
      //       d = result;
      //       if (status_pegawai == 'tetap') {
      //         gaji = parseInt(gaji1/d)+parseInt(gaji2)+parseInt(gaji3);
      //       }
      //       else {
      //         gaji = parseInt(magang1/d)+parseInt(magang2)+parseInt(magang3);
      //       }
      //       $('#gaji').val(gaji);
      //     }
      //   });
      // }
      //
      // else {
        if (status_pegawai == 'tetap') {
          gaji = parseInt(gaji1)+parseInt(gaji2)+parseInt(gaji3);
        }
        else {
          gaji = parseInt(magang1)+parseInt(magang2)+parseInt(magang3);
        }
        $('#gaji').val(gaji);
      // }

    });

    $('#pekerjaan2').change(function(){
      $('.form-group.pekerjaan1.has-error.col-md-12').attr('class', 'form-group pekerjaan1 col-md-12')
      $('#pekerjaan1_cek').hide();  $('#pekerjaan1_error').hide();
      $('.form-group.pekerjaan2.has-error.col-md-12').attr('class', 'form-group pekerjaan2 col-md-12')
      $('#pekerjaan2_cek').hide();
      $('#pekerjaan2_error').hide();
      $('.form-group.pekerjaan3.has-error.col-md-12').attr('class', 'form-group pekerjaan3 col-md-12')
      $('#pekerjaan3_cek').hide();
      $('#pekerjaan3_error').hide();

      var sdm = $('#username').val();

      var split_sdm = sdm.split(" || ");
      var username = split_sdm[0];
      var status_pegawai = split_sdm[1];

      var p1 = $('#pekerjaan1').val();
      var split_pekerjaan1 = p1.split(" || ");
      var pekerjaan1 = split_pekerjaan1[0];
      var gaji1 = split_pekerjaan1[1];
      var magang1 = split_pekerjaan1[2];

      var p2 = $('#pekerjaan2').val();
      var split_pekerjaan2 = p2.split(" || ");
      var pekerjaan2 = split_pekerjaan2[0];
      var gaji2 = split_pekerjaan2[1];
      var magang2 = split_pekerjaan2[2];

      var p3 = $('#pekerjaan3').val();
      var split_pekerjaan3 = p3.split(" || ");
      var pekerjaan3 = split_pekerjaan3[0];
      var gaji3 = split_pekerjaan3[1];
      var magang3 = split_pekerjaan3[2];

      var d = 1;
      var gaji = 0;

      // if (pekerjaan2 == '-1') {
      //   $.ajax({
      //     type: "POST",
      //     url: '<?php// echo site_url("Proses_pemesanan/gaji_driver") ?>',
      //     cache: false,
      //     success: function(result){
      //       d = result;
      //       if (status_pegawai == 'tetap') {
      //         gaji = parseInt(gaji1)+parseInt(gaji2/d)+parseInt(gaji3);
      //       }
      //       else {
      //         gaji = parseInt(magang1)+parseInt(magang2/d)+parseInt(magang3);
      //       }
      //       $('#gaji').val(gaji);
      //     }
      //   });
      // }
      //
      // else {
        if (status_pegawai == 'tetap') {
          gaji = parseInt(gaji1)+parseInt(gaji2)+parseInt(gaji3);
        }
        else {
          gaji = parseInt(magang1)+parseInt(magang2)+parseInt(magang3);
        }
        $('#gaji').val(gaji);
      // }

    });

    $('#pekerjaan3').change(function(){
      $('.form-group.pekerjaan1.has-error.col-md-12').attr('class', 'form-group pekerjaan1 col-md-12')
      $('#pekerjaan1_cek').hide();
      $('#pekerjaan1_error').hide();
      $('.form-group.pekerjaan2.has-error.col-md-12').attr('class', 'form-group pekerjaan2 col-md-12')
      $('#pekerjaan2_cek').hide();
      $('#pekerjaan2_error').hide();
      $('.form-group.pekerjaan3.has-error.col-md-12').attr('class', 'form-group pekerjaan3 col-md-12')
      $('#pekerjaan3_cek').hide();
      $('#pekerjaan3_error').hide();

      var sdm = $('#username').val();

      var split_sdm = sdm.split(" || ");
      var username = split_sdm[0];
      var status_pegawai = split_sdm[1];

      var p1 = $('#pekerjaan1').val();
      var split_pekerjaan1 = p1.split(" || ");
      var pekerjaan1 = split_pekerjaan1[0];
      var gaji1 = split_pekerjaan1[1];
      var magang1 = split_pekerjaan1[2];

      var p2 = $('#pekerjaan2').val();
      var split_pekerjaan2 = p2.split(" || ");
      var pekerjaan2 = split_pekerjaan2[0];
      var gaji2 = split_pekerjaan2[1];
      var magang2 = split_pekerjaan2[2];

      var p3 = $('#pekerjaan3').val();
      var split_pekerjaan3 = p3.split(" || ");
      var pekerjaan3 = split_pekerjaan3[0];
      var gaji3 = split_pekerjaan3[1];
      var magang3 = split_pekerjaan3[2];

      var d = 1;
      var gaji = 0;

      // if (pekerjaan3 == '-1') {
      //   $.ajax({
      //     type: "POST",
      //     url: '<?php// echo site_url("Proses_pemesanan/gaji_driver") ?>',
      //     cache: false,
      //     success: function(result){
      //       d = result;
      //       if (status_pegawai == 'tetap') {
      //         gaji = parseInt(gaji1)+parseInt(gaji2)+parseInt(gaji3/d);
      //       }
      //       else {
      //         gaji = parseInt(magang1)+parseInt(magang2)+parseInt(magang3/d);
      //       }
      //       $('#gaji').val(gaji);
      //     }
      //   });
      // }
      //
      // else {
        if (status_pegawai == 'tetap') {
          gaji = parseInt(gaji1)+parseInt(gaji2)+parseInt(gaji3);
        }
        else {
          gaji = parseInt(magang1)+parseInt(magang2)+parseInt(magang3);
        }
        $('#gaji').val(gaji);
      // }

    });

    $("input#tgl").change(function(){
      $('.form-group.tgl.has-error.col-md-12').attr('class', 'form-group tgl col-md-12')
      $('#tgl_cek').hide();
      $('#tgl_error').hide();
    });

    $("#tambah, #tombol_edit").click(function(){
      $('.error').hide();
      $('.vali').hide();

      $('.alert').hide();

      });

    $("#tambah").click(function(){
      var sdm = $('#username').val();
      var split_sdm = sdm.split(" || ");
      var username = split_sdm[0];

      var p1 = $('#pekerjaan1').val();
      var split_pekerjaan1 = p1.split(" || ");
      var pekerjaan1 = split_pekerjaan1[0];

      var p2 = $('#pekerjaan2').val();
      var split_pekerjaan2 = p2.split(" || ");
      var pekerjaan2 = split_pekerjaan2[0];

      var p3 = $('#pekerjaan3').val();
      var split_pekerjaan3 = p3.split(" || ");
      var pekerjaan3 = split_pekerjaan3[0];

      var gaji = $('#gaji').val();
      var uang_makan = $('#uang_makan').val();
      var tgl = $('input#tgl:checked').val();
      var cek = username+' '+tgl;

      //  || pekerjaan1 == pekerjaan3 || pekerjaan2 == pekerjaan3 ||

      if (pekerjaan1 == "-" && pekerjaan2 == "-" && pekerjaan3 == "-" || !jQuery("input#tgl").is(":checked")) {
        if (pekerjaan1 == "-" && pekerjaan2 == "-" && pekerjaan3 == "-") {
          $(".form-group.pekerjaan1.col-md-12").attr("class", "form-group pekerjaan1 has-error col-md-12");
          $("label#pekerjaan1_error").show();
          $(".form-group.pekerjaan2.col-md-12").attr("class", "form-group pekerjaan2 has-error col-md-12");
          $("label#pekerjaan2_error").show();
          $(".form-group.pekerjaan3.col-md-12").attr("class", "form-group pekerjaan3 has-error col-md-12");
          $("label#pekerjaan3_error").show();
        }
        if (!jQuery("input#tgl").is(":checked")) {
          $(".form-group.tgl.col-md-12").attr("class", "form-group tgl has-error col-md-12");
          $("label#tgl_error").show();
        }
        $('html, body').animate({
          scrollTop: $('.content-wrapper').offset().top }, 500);
      }
      else {
      $.ajax({
        type: 'POST',
        url: "<?php echo site_url('proses_pemesanan/cek_sdm'); ?>",
        dataType: "JSON",
        data: {username: username, tgl: tgl},
        cache: false,
        success: function(result) {
          if (result > 0) {
            $('.form-group.username.col-md-12').attr('class', 'form-group username has-error col-md-12')
            $('.form-group.tgl.col-md-12').attr('class', 'form-group tgl has-error col-md-12')
            $('#username_cek').show();
            $('html, body').animate({
              scrollTop: $('.content-wrapper').offset().top }, 500);
          }
          else {
            if (pekerjaan1 != "-" && pekerjaan2 != "-" && pekerjaan3 != "-") {
              if (pekerjaan1 == pekerjaan2) {
                $(".form-group.pekerjaan1.col-md-12").attr("class", "form-group pekerjaan1 has-error col-md-12");
                $("label#pekerjaan1_cek").show();
                $(".form-group.pekerjaan2.col-md-12").attr("class", "form-group pekerjaan2 has-error col-md-12");
                $("label#pekerjaan2_cek").show();
                $('html, body').animate({
                  scrollTop: $('.content-wrapper').offset().top }, 500);
              }
              else if (pekerjaan1 == pekerjaan3) {
                $(".form-group.pekerjaan1.col-md-12").attr("class", "form-group pekerjaan1 has-error col-md-12");
                $("label#pekerjaan1_cek").show();
                $(".form-group.pekerjaan3.col-md-12").attr("class", "form-group pekerjaan3 has-error col-md-12");
                $("label#pekerjaan3_cek").show();
                $('html, body').animate({
                  scrollTop: $('.content-wrapper').offset().top }, 500);
              }
              else if (pekerjaan2 == pekerjaan3) {
                $(".form-group.pekerjaan2.col-md-12").attr("class", "form-group pekerjaan2 has-error col-md-12");
                $("label#pekerjaan2_cek").show();
                $(".form-group.pekerjaan3.col-md-12").attr("class", "form-group pekerjaan3 has-error col-md-12");
                $("label#pekerjaan3_cek").show();
                $('html, body').animate({
                  scrollTop: $('.content-wrapper').offset().top }, 500);
                }
              else {
                pilih(cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl);
              }
            }
            else if (pekerjaan1 != "-" && pekerjaan2 != "-") {
              if (pekerjaan1 == pekerjaan2) {
                $(".form-group.pekerjaan1.col-md-12").attr("class", "form-group pekerjaan1 has-error col-md-12");
                $("label#pekerjaan1_cek").show();
                $(".form-group.pekerjaan2.col-md-12").attr("class", "form-group pekerjaan2 has-error col-md-12");
                $("label#pekerjaan2_cek").show();
                $('html, body').animate({
                  scrollTop: $('.content-wrapper').offset().top }, 500);
              }
              else {
                pilih(cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl);
              }
            }
            else if (pekerjaan1 != "-" && pekerjaan3 != "-") {
              if (pekerjaan1 == pekerjaan3) {
                $(".form-group.pekerjaan1.col-md-12").attr("class", "form-group pekerjaan1 has-error col-md-12");
                $("label#pekerjaan1_cek").show();
                $(".form-group.pekerjaan3.col-md-12").attr("class", "form-group pekerjaan3 has-error col-md-12");
                $("label#pekerjaan3_cek").show();
                $('html, body').animate({
                  scrollTop: $('.content-wrapper').offset().top }, 500);
              }
              else {
                pilih(cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl);
              }
            }
            else if (pekerjaan2 != "-" && pekerjaan3 != "-") {
              if (pekerjaan2 == pekerjaan3) {
                $(".form-group.pekerjaan2.col-md-12").attr("class", "form-group pekerjaan2 has-error col-md-12");
                $("label#pekerjaan2_cek").show();
                $(".form-group.pekerjaan3.col-md-12").attr("class", "form-group pekerjaan3 has-error col-md-12");
                $("label#pekerjaan3_cek").show();
                $('html, body').animate({
                  scrollTop: $('.content-wrapper').offset().top }, 500);
                }
                else {
                  pilih(cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl);
                }
            }
            else{
              pilih(cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl);
             }
          }
        }
        });
      }
    });

    function pilih(cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl){
      $.ajax({
        type: 'POST',
        url: "<?php echo site_url('proses_pemesanan/tombol_tambah_sdm'); ?>",
        data: {cek: cek, username: username, pekerjaan1: pekerjaan1, pekerjaan2: pekerjaan2, pekerjaan3: pekerjaan3, gaji: gaji, uang_makan: uang_makan, tgl: tgl},
        cache: false,
        success: function(result) {
          $('.result').html(result);
          $('select#username').prop('selectedIndex', 0);
          $('select#username').trigger('change');
          $('select#pekerjaan1').prop('selectedIndex', 0);
          $('select#pekerjaan1').trigger('change');
          $('select#pekerjaan2').prop('selectedIndex', 0);
          $('select#pekerjaan2').trigger('change');
          $('select#pekerjaan3').prop('selectedIndex', 0);
          $('select#pekerjaan3').trigger('change');
          $('input#gaji').val(0);
          $('input#tgl').prop("checked", false);
          $('input[value = <?php echo $_SESSION['rab'] ?>]').prop('checked', true);

          var uang_makan = '<?php echo $pemesanan['uang_makan']; ?>';
          $('#uang_makan').val(uang_makan);
        }
      });
    }

    $('#batal').click(function(){
      var back = '<?php echo $_GET['back']; ?>';
      $.ajax({
        url: "<?php echo site_url('proses_pemesanan/kembali_sdm') ?>",
        cache: false,
        success: function(result){
          if (back == 'rab') {
            window.location.href = "<?php echo site_url('rab/'.$_SESSION['kd_pemesanan']) ?>";
          }
          else {
            window.location.href = "<?php echo site_url('pemesanan/pemesanan') ?>";
          }
        }
      })
    });

    $('#pilih').click(function(){


      var back = '<?php echo $_GET['back']; ?>';

      if (!jQuery("input#rab").is(":checked")) {
        $('.rabh').attr('style', 'color: #d73925;')
        $('.rabd').attr('style', 'background: #d73925;')
        $('#rab_error').show();
      }
      else {
      $.ajax({
        url: "<?php echo site_url('proses_pemesanan/tombol_pilih_sdm/'.$_SESSION['kd_pemesanan']) ?>",
        dataType: "JSON",
        cache: false,
        beforeSend:function(){
          $('#modal-loading').modal('show');
        },
        success: function(result){
          if (result.status == true) {
            $.ajax({
              url: "<?php echo site_url('proses_pemesanan/kirim_email') ?>",
              async: false
            })
            if (back == 'rab') {
              $('#modal-loading').modal('hide');
              window.location.href = "<?php echo site_url('rab/'.$_SESSION['kd_pemesanan'].'?notif=Data sdm event berhasil diubah&alert=success&logo_notif=check') ?>";
            }
            else {
              $('#modal-loading').modal('hide');
              window.location.href = "<?php echo site_url('pemesanan/pemesanan?notif=Data sdm event berhasil disimpan&alert=success&logo_notif=check') ?>";
            }
          }
          else if (result.status == false) {
            $('#modal-loading').modal('hide');
            $('.alert').show();
            $('html, body').animate({
              scrollTop: $('.content-wrapper').offset().top }, 500);
          }
        }
      })
    }
    });
});
</script>

<script type="text/javascript">
$("body").on("click","#hapus",function(){
  var hapus = $(this).attr('data-id');
    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('proses_pemesanan/hapus_sdm'); ?>",
      data: {hapus: hapus},
      success: function(result) {
          $('.result').html(result);
          $('input[value = <?php echo $_SESSION['rab'] ?>]').prop('checked', true);
      }
    })
  });
</script>

<script type="text/javascript">
  $('body').on('click', '#edit', function(){
    var edit = $(this).attr('data-id');
    var tes = $(this).attr('data-tes');
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('proses_pemesanan/edit_sdm'); ?>',
      dataType: 'JSON',
      data: {edit: edit},
      success: function(result){
        $('select#username').val(result.username);
        $('select#username').trigger('change');
        $('select#pekerjaan1').val(result.pekerjaan1);
        $('select#pekerjaan1').trigger('change');
        $('select#pekerjaan2').val(result.pekerjaan2);
        $('select#pekerjaan2').trigger('change');
        $('select#pekerjaan3').val(result.pekerjaan3);
        $('select#pekerjaan3').trigger('change');
        $('input#gaji').val(result.gaji);
        $('input#uang_makan').val(result.uang_makan);
        $('input[value = '+ result.tgl +']').prop('checked', true);

        $('#batal_edit').show();
        $('#tombol_edit').attr('data-id', edit);
        $('#tombol_edit').attr('data-tes', tes);
        $('#tombol_edit').show();
        $('#tambah').hide();

        $('.form-group.tgl.has-error.col-md-12').attr('class', 'form-group tgl col-md-12')
        $('.cek').hide();
        $('.error').hide();
        $('.vali').hide();

        $('html, body').animate({
          scrollTop: $('.content-wrapper').offset().top }, 500);

      }
    });
  });
</script>

<script type="text/javascript">
  $('body').on('click', '#tombol_edit', function(){
    var edit = $('#tombol_edit').attr('data-id');
    var tes = $('#tombol_edit').attr('data-tes');

    var sdm = $('#username').val();
    var split_sdm = sdm.split(" || ");
    var username = split_sdm[0];

    var p1 = $('#pekerjaan1').val();
    var split_pekerjaan1 = p1.split(" || ");
    var pekerjaan1 = split_pekerjaan1[0];

    var p2 = $('#pekerjaan2').val();
    var split_pekerjaan2 = p2.split(" || ");
    var pekerjaan2 = split_pekerjaan2[0];

    var p3 = $('#pekerjaan3').val();
    var split_pekerjaan3 = p3.split(" || ");
    var pekerjaan3 = split_pekerjaan3[0];

    var gaji = $('#gaji').val();
    var uang_makan = $('#uang_makan').val();
    var tgl = $('input#tgl:checked').val();
    var cek = username+' '+tgl;

    if (pekerjaan1 == "-" && pekerjaan2 == "-" && pekerjaan3 == "-" || !jQuery("input#tgl").is(":checked")) {
      if (pekerjaan1 == "-" && pekerjaan2 == "-" && pekerjaan3 == "-") {
        $(".form-group.pekerjaan1.col-md-12").attr("class", "form-group pekerjaan1 has-error col-md-12");
        $("label#pekerjaan1_error").show();
        $(".form-group.pekerjaan2.col-md-12").attr("class", "form-group pekerjaan2 has-error col-md-12");
        $("label#pekerjaan2_error").show();
        $(".form-group.pekerjaan3.col-md-12").attr("class", "form-group pekerjaan3 has-error col-md-12");
        $("label#pekerjaan3_error").show();
      }
      if (!jQuery("input#tgl").is(":checked")) {
        $(".form-group.tgl.col-md-12").attr("class", "form-group tgl has-error col-md-12");
        $("label#tgl_error").show();
      }
      $('html, body').animate({
        scrollTop: $('.content-wrapper').offset().top }, 500);
    }
    else {
    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('proses_pemesanan/cek_sdm2'); ?>",
      dataType: "JSON",
      data: {tes: tes, username: username, tgl: tgl},
      cache: false,
      success: function(result) {
        if (result > 0) {
          $('.form-group.username.col-md-12').attr('class', 'form-group username has-error col-md-12')
          $('.form-group.tgl.col-md-12').attr('class', 'form-group tgl has-error col-md-12')
          $('#username_cek').show();
          $('html, body').animate({
            scrollTop: $('.content-wrapper').offset().top }, 500);
        }
        else{
          if (pekerjaan1 != "-" && pekerjaan2 != "-" && pekerjaan3 != "-") {
            if (pekerjaan1 == pekerjaan2) {
              $(".form-group.pekerjaan1.col-md-12").attr("class", "form-group pekerjaan1 has-error col-md-12");
              $("label#pekerjaan1_cek").show();
              $(".form-group.pekerjaan2.col-md-12").attr("class", "form-group pekerjaan2 has-error col-md-12");
              $("label#pekerjaan2_cek").show();
              $('html, body').animate({
                scrollTop: $('.content-wrapper').offset().top }, 500);
            }
            else if (pekerjaan1 == pekerjaan3) {
              $(".form-group.pekerjaan1.col-md-12").attr("class", "form-group pekerjaan1 has-error col-md-12");
              $("label#pekerjaan1_cek").show();
              $(".form-group.pekerjaan3.col-md-12").attr("class", "form-group pekerjaan3 has-error col-md-12");
              $("label#pekerjaan3_cek").show();
              $('html, body').animate({
                scrollTop: $('.content-wrapper').offset().top }, 500);
            }
            else if (pekerjaan2 == pekerjaan3) {
              $(".form-group.pekerjaan2.col-md-12").attr("class", "form-group pekerjaan2 has-error col-md-12");
              $("label#pekerjaan2_cek").show();
              $(".form-group.pekerjaan3.col-md-12").attr("class", "form-group pekerjaan3 has-error col-md-12");
              $("label#pekerjaan3_cek").show();
              $('html, body').animate({
                scrollTop: $('.content-wrapper').offset().top }, 500);
              }
            else {
              tedit(edit, cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl)
            }
          }
          else if (pekerjaan1 != "-" && pekerjaan2 != "-") {
            if (pekerjaan1 == pekerjaan2) {
              $(".form-group.pekerjaan1.col-md-12").attr("class", "form-group pekerjaan1 has-error col-md-12");
              $("label#pekerjaan1_cek").show();
              $(".form-group.pekerjaan2.col-md-12").attr("class", "form-group pekerjaan2 has-error col-md-12");
              $("label#pekerjaan2_cek").show();
              $('html, body').animate({
                scrollTop: $('.content-wrapper').offset().top }, 500);
            }
            else {
              tedit(edit, cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl)
            }
          }
          else if (pekerjaan1 != "-" && pekerjaan3 != "-") {
            if (pekerjaan1 == pekerjaan3) {
              $(".form-group.pekerjaan1.col-md-12").attr("class", "form-group pekerjaan1 has-error col-md-12");
              $("label#pekerjaan1_cek").show();
              $(".form-group.pekerjaan3.col-md-12").attr("class", "form-group pekerjaan3 has-error col-md-12");
              $("label#pekerjaan3_cek").show();
              $('html, body').animate({
                scrollTop: $('.content-wrapper').offset().top }, 500);
            }
            else {
              tedit(edit, cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl)
            }
          }
          else if (pekerjaan2 != "-" && pekerjaan3 != "-") {
            if (pekerjaan2 == pekerjaan3) {
              $(".form-group.pekerjaan2.col-md-12").attr("class", "form-group pekerjaan2 has-error col-md-12");
              $("label#pekerjaan2_cek").show();
              $(".form-group.pekerjaan3.col-md-12").attr("class", "form-group pekerjaan3 has-error col-md-12");
              $("label#pekerjaan3_cek").show();
              $('html, body').animate({
                scrollTop: $('.content-wrapper').offset().top }, 500);
              }
              else {
                tedit(edit, cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl)
              }
          }
          else{
            tedit(edit, cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl)
          }
        }
      }
    });
  }
});
</script>

<script>
  function tedit(edit, cek, username, pekerjaan1, pekerjaan2, pekerjaan3, gaji, uang_makan, tgl) {
    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('proses_pemesanan/tombol_edit_sdm'); ?>",
      data: {edit: edit, cek: cek, username: username, pekerjaan1: pekerjaan1, pekerjaan2: pekerjaan2, pekerjaan3: pekerjaan3, gaji: gaji, uang_makan: uang_makan, tgl: tgl},
      cache: false,
      success: function(result) {
        $('.result').html(result);
        $('select#username').prop('selectedIndex', 0);
        $('select#username').trigger('change');
        $('select#pekerjaan1').prop('selectedIndex', 0);
        $('select#pekerjaan1').trigger('change');
        $('select#pekerjaan2').prop('selectedIndex', 0);
        $('select#pekerjaan2').trigger('change');
        $('select#pekerjaan3').prop('selectedIndex', 0);
        $('select#pekerjaan3').trigger('change');
        $('input#gaji').val(0);
        $('input#tgl').prop("checked", false);
        $('input[value = <?php echo $_SESSION['rab'] ?>]').prop('checked', true);
        var uang_makan = '<?php echo $pemesanan['uang_makan']; ?>';
        $('#uang_makan').val(uang_makan);
        $('#batal_edit').hide();
        $('#tombol_edit').hide();
        $('#tambah').show();
      }
    });
  }
</script>

<script type="text/javascript">
  $('body').on('click', '#batal_edit', function(){
      $('#batal_edit').hide();
      $('#tombol_edit').hide();
      $('#tambah').show();
      $('select#username').prop('selectedIndex', 0);
      $('select#username').trigger('change');
      $('select#pekerjaan1').prop('selectedIndex', 0);
      $('select#pekerjaan1').trigger('change');
      $('select#pekerjaan2').prop('selectedIndex', 0);
      $('select#pekerjaan2').trigger('change');
      $('select#pekerjaan3').prop('selectedIndex', 0);
      $('select#pekerjaan3').trigger('change');
      $('input#gaji').val(0);
      $('input#tgl').prop("checked", false);
      var uang_makan = '<?php echo $pemesanan['uang_makan']; ?>';
      $('#uang_makan').val(uang_makan);
      $('.form-group.tgl.has-error.col-md-12').attr('class', 'form-group tgl col-md-12')
      $('.cek').hide();
      $('.error').hide();
      $('.vali').hide();
  });
</script>

<script type="text/javascript">
  $('body').on('change', '#rab', function(){
      var rab = $("input#rab:checked").val()

      $.ajax({
        type: 'POST',
        url: "<?php echo site_url('proses_pemesanan/set_rab'); ?>",
        data: {rab: rab},
        success: function(result) {
          $('.rab').attr('style', '');
          $('#rab_error').hide();
        }
      });
  });
</script>
