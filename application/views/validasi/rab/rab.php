<!-- validasi tombol pilih -->
<script type="text/javascript">
  $(document).ready(function(){

    $('.select2').select2();

    $('#diskon').maskAsNumber();

    $('#jumlah_rab').keydown(function(event) {
      var charCode = (event.which) ? event.which : event.keyCode
      if (charCode >= 48 && charCode <= 57 || charCode == 8)
      {
        $('.error').hide();
        $('.vali').hide();
        return true;
        return false;
      }
      else if (charCode == 13){
        $('#jumlah_rab').focusout();
      }
      else {
        $("label#jumlah_rab_error").hide();
        $("label#jumlah_rab_vali").show();
        return false;
      }
    });

    $('#jumlah_rab').keyup(function() {
      var $th = $(this);
      $th.val( $th.val().replace(/[^a-zA-Z0-9 ]/g, function(str) {
            $(".form-group.jumlah_rab.col-md-12").attr("class", "form-group jumlah_rab has-error col-md-12");
            $("label#jumlah_rab_error").hide();
            $("label#jumlah_rab_vali").show();
            return "";
      } ) );
    });

    $('#jumlah_rab').keydown(function() {
          $(".form-group.jumlah_rab.col-md-12.has-error").attr("class", "form-group jumlah_rab col-md-12");
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

    $('.jumlah_rab').click(function(){
      $('.jumlah_rab').hide();
      $('#jumlah_rab').attr('type', 'text');
      $('#jumlah_rab').focus();
    });

    $('.pemegang_rab').click(function(){
      $('.pemegang_rab').hide();
      var pemegang_rab = $('.pemegang_rab_text').text();
      $('select#pemegang_rab').val(pemegang_rab);
      $('.pemegang_rab_select').show();
    });

    $('.batal').click(function(){
      $('.pemegang_rab_select').hide();
      $('.pemegang_rab').show();
    });

    $('diskon').click(function(){
      $('diskon').hide();
      $('#diskon').attr('type', 'text');
      $('#diskon').focus();
    });

});
</script>

<script type="text/javascript">
$("body").on("focusout","#jumlah_rab",function(){
  var jumlah_rab = $('#jumlah_rab').val();

  if (jumlah_rab == "") {
    $("label#jumlah_rab_error").show();
    $('#jumlah_rab').attr('class', 'form-control has-error')
  }
  else {
    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('Rab/jumlah_rab/'.$_SESSION['kd_pemesanan']); ?>",
      data: {jumlah_rab: jumlah_rab},
      success: function(result) {
          $('.jumlah_rab').show();
          $('.jumlah_rab_text').text('Rp '+result.jumlah_rab);
          $('#jumlah_rab').attr('type', 'hidden');
          $('#jumlah_rab').val(jumlah_rab);
          $("label#jumlah_rab_error").hide();
          $("label#jumlah_rab_vali").hide();
      }
    })
  }
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
$("body").on("change","#pemegang_rab",function(){
  var pemegang_rab = $('#pemegang_rab').val();

  $.ajax({
    type: 'POST',
    url: "<?php echo site_url('Rab/pemegang_rab/'.$_SESSION['kd_pemesanan']); ?>",
    data: {pemegang_rab: pemegang_rab},
    success: function(result) {
      $('.pemegang_rab').show();
      $('.pemegang_rab_select').hide();
      $('.pemegang_rab_text').text(result.pemegang_rab);
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
