<script type="text/javascript">
$(document).ready(function(){
  $('.select2').select2()
  $('.error').hide();
  $('.vali').hide();
  $('.cek').hide();

  var tipe = $('#tipe :selected').text();
  var split = tipe.split(" || ");

  $('tek').text(split[1]);

  $('#kode').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z0-9]/g, function(str) {
          $(".form-group.kode.col-md-12").attr("class", "form-group kode has-error col-md-12");
          $("label#kode_error").hide();
          $("label#kode_vali").show();
          return "";
    } ) );
  });

  $('#kode').keypress(function() {
        $(".form-group.kode.col-md-12.has-error").attr("class", "form-group kode col-md-12");
        $('.error').hide();
        $('.vali').hide();
        $('.cek').hide();
        return true;
        return false;
  });

  $('#tipe').change(function(){
    var tipe = $('#tipe :selected').text();
    var split = tipe.split(" || ");

    $('tek').text(split[1]);

    var kode1 = $('#kode').val();
    kode1 = kode1.toUpperCase();
    var kode2 = split[1];

    var kode = kode1+'-'+kode2;

    var cek = '<?php echo $peralatan_item['kd_peralatan'] ?>';
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Peralatan/cek_kode2') ?>',
      dataType: 'JSON',
      data: {kode: kode, cek: cek},
      cache: false,
      success: function(result){
        if (result) {
          $(".form-group.kode.col-md-12").attr("class", "form-group kode has-error col-md-12");
          $('label#kode_cek').show();
          $('label#kode_error').hide();
          $('label#kode_vali').hide();
          $("input#kode").focus();
        }
        else {
          $('label#kode_cek').hide();
        }
      }
    })
  });

  $('#kode').keyup(function(){
    var tipe = $('#tipe :selected').text();
    var split = tipe.split(" || ");

    var kode1 = $('#kode').val();
    kode1 = kode1.toUpperCase();
    var kode2 = split[1];

    var kode = kode1+'-'+kode2;

    var cek = '<?php echo $peralatan_item['kd_peralatan'] ?>';
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Peralatan/cek_kode2') ?>',
      dataType: 'JSON',
      data: {kode: kode, cek: cek},
      cache: false,
      success: function(result){
        if (result) {
          $(".form-group.kode.col-md-12").attr("class", "form-group kode has-error col-md-12");
          $('label#kode_cek').show();
        }
        else {
          $('label#kode_cek').hide();
        }
      }
    })
  });
});
</script>
