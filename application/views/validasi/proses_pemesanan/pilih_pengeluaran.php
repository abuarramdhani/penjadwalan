<!-- validasi tombol pilih -->
<script type="text/javascript">
  $(document).ready(function(){

    $("#tambah, #tombol_edit").click(function(){
      $('.error').hide();
      $('.vali').hide();

      var harga = $('#harga').val();

      $(".form-group.harga.has-error.col-md-12").attr("class", "form-group harga col-md-12");
      $(".form-group.keterangan.has-error.col-md-12").attr("class", "form-group keterangan col-md-12");

      if (harga == "") {
        $(".form-group.harga.col-md-12").attr("class", "form-group harga has-error col-md-12");
        $('.vali').hide();
        $("label#harga_error").show();
        $("input#harga").focus();
      }

      $('.alert').hide();

    });

    $("#tambah").click(function(){
      var jenis_pengeluaran = $('#jenis_pengeluaran').val();
      var harga = $('#harga').val();
      var keterangan = $('#keterangan').val();

      if (harga != "") {
        $.ajax({
          type: 'POST',
          url: "<?php echo site_url('proses_pemesanan/tombol_tambah_pengeluaran'); ?>",
          data: {jenis_pengeluaran: jenis_pengeluaran, harga: harga, keterangan: keterangan},
          cache: false,
          success: function(result) {
            $('.result').html(result);
            $('select#jenis_pengeluaran').prop('selectedIndex', 0);
            $('select#jenis_pengeluaran').trigger('change');
            $('input#harga').val('');
            $('textarea#keterangan').val('');
            }
            });
        }

    });

    $('#batal').click(function(){
      var back = '<?php echo $_GET['back']; ?>';
      $.ajax({
        url: "<?php echo site_url('proses_pemesanan/kembali_pengeluaran') ?>",
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
      $.ajax({
        url: "<?php echo site_url('proses_pemesanan/tombol_pilih_pengeluaran/'.$_SESSION['kd_pemesanan']) ?>",
        dataType: "JSON",
        cache: false,
        beforeSend:function(){
          $('#modal-loading').modal('show');
        },
        success: function(result){
          if (result.status) {
            if (back == 'rab') {
              $('#modal-loading').modal('hide');
              window.location.href = "<?php echo site_url('rab/'.$_SESSION['kd_pemesanan'].'?notif=Data pengeluaran event berhasil diubah&alert=success&logo_notif=check') ?>";
            }
            else {
              $('#modal-loading').modal('hide');
              window.location.href = "<?php echo site_url('pemesanan/pemesanan?notif=Data pengeluaran event berhasil disimpan&alert=success&logo_notif=check') ?>";
            }
          }
          else {
            $('#modal-loading').modal('hide');
            $('.alert').show();
            $('html, body').animate({
              scrollTop: $('.content-wrapper').offset().top }, 500);
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
      url: "<?php echo site_url('proses_pemesanan/hapus_pengeluaran'); ?>",
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
      url: '<?php echo site_url('proses_pemesanan/edit_pengeluaran'); ?>',
      dataType: 'JSON',
      data: {edit: edit},
      success: function(result){
        $('select#jenis_pengeluaran').val(result.jenis_pengeluaran);
        $('select#jenis_pengeluaran').trigger('change');
        $('input#harga').val(result.harga);
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
    var jenis_pengeluaran = $('#jenis_pengeluaran').val();
    var harga = $('#harga').val();
    var keterangan = $('#keterangan').val();

    if (harga != "") {
      $.ajax({
        type: 'POST',
        url: "<?php echo site_url('proses_pemesanan/tombol_edit_pengeluaran'); ?>",
        data: {edit: edit, jenis_pengeluaran: jenis_pengeluaran, harga: harga, keterangan: keterangan},
          success: function(result) {
            $('.result').html(result);
            $('#batal_edit').hide();
            $('#tombol_edit').hide();
            $('#tambah').show();
            $('select#jenis_pengeluaran').prop('selectedIndex', 0);
            $('select#jenis_pengeluaran').trigger('change');
            $('input#harga').val('');
            $('textarea#keterangan').val('');
          }
        });
    }

  });
</script>

<script type="text/javascript">
  $('body').on('click', '#batal_edit', function(){
      $('#batal_edit').hide();
      $('#tombol_edit').hide();
      $('#tambah').show();
      $('select#jenis_pengeluaran').prop('selectedIndex', 0);
      $('select#jenis_pengeluaran').trigger('change');
      $('input#harga').val('');
      $('textarea#keterangan').val('');
  });
</script>
