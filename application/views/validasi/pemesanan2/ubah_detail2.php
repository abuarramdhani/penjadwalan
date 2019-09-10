<!-- validasi tombol tambah -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#tambah, #tombol_edit").click(function(){
      $('.error').hide();
      $('.vali').hide();

      var jenis_pesanan = $('#jenis_pesanan').val();
      var harga_jual = $('#harga_jual').val();
      var keterangan = $('#keterangan').val();

      $(".form-group.harga_jual.has-error.col-md-12").attr("class", "form-group harga_jual col-md-12");
      $(".form-group.keterangan.has-error.col-md-12").attr("class", "form-group keterangan col-md-12");

    		if (harga_jual == "") {
          $(".form-group.harga_jual.col-md-12").attr("class", "form-group harga_jual has-error col-md-12");
          $('.vali').hide();
          $("label#harga_jual_error").show();
          $("input#harga_jual").focus();
        }
        if (keterangan == "") {
          $(".form-group.keterangan.col-md-12").attr("class", "form-group keterangan has-error col-md-12");
          $('.vali').hide();
          $("label#keterangan_error").show();
          $("textarea#keterangan").focus();
        }

        if (harga_jual == "" && keterangan == "") {
          $('input#harga_jual').focus();
        }

        $('.alert').hide();
      });

      $("#tambah").click(function(){
        var jenis_pesanan = $('#jenis_pesanan').val();
        var harga_jual = $('#harga_jual').val();
        var keterangan = $('#keterangan').val();

      $.ajax({
        type: 'POST',
        url: "<?php echo site_url('transaksi_klien2/tombol_tambah2'); ?>",
        data: {jenis_pesanan: jenis_pesanan, harga_jual: harga_jual, keterangan: keterangan},
        cache: false,
        success: function(result) {
          if (harga_jual != "" && keterangan != "") {
            $('.result').html(result);
            $('#harga_jual').val('');
            $('#keterangan').val('');
          }
        }
      });
    });

  $('#batal').click(function(){
    var back = '<?php echo $_GET['back']; ?>'
    $.ajax({
      url: "<?php echo site_url('transaksi_klien2/kembali2') ?>",
      cache: false,
      success: function(result){
        if (back == 'rab2') {
          window.location.href = "<?php echo site_url('rab2/'.$_SESSION['kd_pemesanan']); ?>";
        }
        else {
        window.location.href = "<?php echo site_url('pemesanan/pemesanan') ?>";
        }
      }
    })
  });

  $('#ubah').click(function(){
    var back = '<?php echo $_GET['back']; ?>'
    $.ajax({
      url: '<?php echo site_url('transaksi_klien2/tombol_ubah_detail2/'.$_SESSION['kd_pemesanan']) ?>',
      dataType: 'JSON',
      cache: false,
      beforeSend: function() {
        $('#modal-loading').modal('show');
      },
      success: function(result){
        if (result.status) {
          if (back == 'rab2') {
            $('#modal-loading').modal('hide');
            window.location.href = '<?php echo site_url('rab2/'.$_SESSION['kd_pemesanan'].'?notif=Data pemesanan berhasil diubah&alert=success&logo_notif=check') ?>';
          }
          else {
          $('#modal-loading').modal('hide');
          window.location.href = '<?php echo site_url('pemesanan/pemesanan?notif=Data pemesanan berhasil diubah&alert=success&logo_notif=check') ?>';
          }
        }
        else {
          $('#modal-loading').modal('hide');
          $('.alert').show();
          $('html, body').animate({
            scrollTop: $(".content-wrapper").offset().top}, 500);
        }
      }
    })
  });
});
</script>

<script type="text/javascript">
$("body").on("click","#hapus",function(){
  var hapus = $(this).attr('data-id');
    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('transaksi_klien2/hapus_detail2'); ?>",
      data: {hapus: hapus},
      success: function(result) {
          $('.result').html(result);
      }
    })
  });
</script>

<script type="text/javascript">
  $('body').on('click', '#edit', function(){
    var edit = $(this).attr('data-id');
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('transaksi_klien2/edit_detail2'); ?>',
      dataType: 'JSON',
      data: {edit: edit},
      success: function(result){
        $('input#harga_jual').val(result.harga_jual);
        $('textarea#keterangan').val(result.keterangan);

        $('#batal_edit').show();
        $('#tombol_edit').attr('data-id', edit);
        $('#tombol_edit').show();
        $('#tambah').hide();
      }
    });
  });
</script>

<script type="text/javascript">
  $('body').on('click', '#tombol_edit', function(){
    var edit = $(this).attr('data-id');
    var jenis_pesanan = $('#jenis_pesanan').val();
    var harga_jual = $('#harga_jual').val();
    var keterangan = $('#keterangan').val();

      $.ajax({
        type: 'POST',
        url: "<?php echo site_url('transaksi_klien2/tombol_edit2'); ?>",
        data: {edit: edit, jenis_pesanan: jenis_pesanan, harga_jual: harga_jual, keterangan: keterangan},
        success: function(result) {
          if (harga_jual != "" && keterangan != "") {
            $('.result').html(result);
            $('#batal_edit').hide();
            $('#tombol_edit').hide();
            $('#tambah').show();
            $('#harga_jual').val('');
            $('#keterangan').val('');
          }
        }
      })
  });
</script>

<script type="text/javascript">
  $('body').on('click', '#batal_edit', function(){
      $('#batal_edit').hide();
      $('#tombol_edit').hide();
      $('#tambah').show();
      $('#harga_jual').val('');
      $('#keterangan').val('');
  });
</script>
