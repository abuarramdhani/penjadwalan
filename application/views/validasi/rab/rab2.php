<!-- validasi tombol pilih -->
<script type="text/javascript">
  $(document).ready(function(){

    $('.select2').select2();

    $('#diskon').maskAsNumber();

    $('#diskon').keyup(function() {
      var $th = $(this);
      $th.val( $th.val().replace(/[^a-zA-Z0-9 ]/g, function(str) {
            $(".form-group.diskon.col-md-12").attr("class", "form-group diskon has-error col-md-12");
            $("label#diskon_error").hide();
            $("label#diskon_vali").show();
            return "";
      } ) );
    });

    $('#diskon').keydown(function() {
          $(".form-group.diskon.col-md-12.has-error").attr("class", "form-group diskon col-md-12");
          $('.error').hide();
          $('.vali').hide();
          return true;
          return false;
    });

    $('#diskon').keydown(function(event) {
      var charCode = (event.which) ? event.which : event.keyCode
      if (charCode >= 48 && charCode <= 57 || charCode == 8)
      {
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
      }
      else if (charCode == 13){
        $('#diskon').focusout();
      }
      else {
        $("label#diskon_error").hide();
        $("label#diskon_vali").show();
        return false;
      }
    });

    $('diskon').click(function(){
      $('diskon').hide();
      $('#diskon').attr('type', 'text');
      $('#diskon').focus();
    });

});
</script>

<script type="text/javascript">
$("body").on("focusout","#diskon",function(){
  var diskon = $('#diskon').val();

  if (diskon == "") {
    diskon = 0;
  }

    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('Rab/diskon/'.$_SESSION['kd_pemesanan']); ?>",
      data: {diskon: diskon},
      success: function(result) {
          $('diskon').show();
          $('.diskon_text').text('Rp '+result.diskon);
          $('.total_harga_jual').text('Rp '+result.total_harga_jual);
          $('.laba_kotor').text('Rp '+result.laba_kotor);
          $('.laba_bersih').text('Rp '+result.laba_bersih);
          $('#diskon').attr('type', 'hidden');
          $('#diskon').val(diskon);
          $("label#diskon_error").hide();
          $("label#diskon_vali").hide();
      }
    })
  });
</script>

<script type="text/javascript">
$("body").on("change","#persen_fee",function(){
  var persen_fee = $('#persen_fee').val();

  $.ajax({
    type: 'POST',
    url: "<?php echo site_url('Rab/persen_fee/'.$_SESSION['kd_pemesanan']); ?>",
    data: {persen_fee: persen_fee},
    success: function(result) {
      $('.laba_bersih').text('Rp '+result.laba_bersih);
      $('.pengeluaran_fee_penjualan').text('Rp '+result.harga);
    }
  })
  });
</script>

<script type="text/javascript">
$("body").on("change","#nama_fee",function(){
  var nama_fee = $('#nama_fee').val();

  $.ajax({
    type: 'POST',
    url: "<?php echo site_url('Rab/nama_fee/'.$_SESSION['kd_pemesanan']); ?>",
    data: {nama_fee: nama_fee}
  })
  });
</script>
