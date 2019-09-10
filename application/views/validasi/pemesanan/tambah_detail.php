<!-- validasi tombol tambah -->
<script type="text/javascript">
  $(document).ready(function(){
  $("#tambah, #tombol_edit").click(function(){
    $('.error').hide();
    $('.vali').hide();

    var jenis_pesanan = $('#jenis_pesanan').val();
    var harga_jual = $('#harga_jual').val();
    var keterangan = $('#keterangan').val();
    var tgl = [];

    $(".form-group.harga_jual.has-error.col-md-12").attr("class", "form-group harga_jual col-md-12");
    $(".form-group.keterangan.has-error.col-md-12").attr("class", "form-group keterangan col-md-12");
    $(".form-group.tgl.has-error.col-md-12").attr("class", "form-group tgl col-md-12");

  	/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
  	$("#checkboxs:checked").each(function() {
  		tgl.push($(this).val());
  	});

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
      if (!jQuery("input#checkboxs").is(":checked")) {
        $(".form-group.tgl.col-md-12").attr("class", "form-group tgl has-error col-md-12");
        $('.vali').hide();
        $("label#tgl_error").show();
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
      var tgl = [];
    	/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
    	$("#checkboxs:checked").each(function() {
    		tgl.push($(this).val());
    	});

    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('transaksi_klien/tombol_tambah'); ?>",
      data: {jenis_pesanan: jenis_pesanan, harga_jual: harga_jual, keterangan: keterangan, tgl: tgl},
      cache: false,
      success: function(result) {
        if (harga_jual != "" && keterangan != "" && jQuery('input#checkboxs').is(":checked")) {
          $('.result').html(result);
          $('#jenis_pesanan').prop('selectedIndex', 0);
          $('#harga_jual').val('');
          $('#keterangan').val('');
          $('input#checkboxs').prop('checked', false);
          $('input#pilih_semua').prop('checked', false);
        }
      }
    });
  });

  $('#kembali').click(function(){
    $.ajax({
      url: "<?php echo site_url('transaksi_klien/kembali') ?>",
      cache: false,
      success: function(result){
        window.location.href = "<?php echo site_url('pemesanan/tambah') ?>";
      }
    })
  });

  $('#batal').click(function(){
    $.ajax({
      url: "<?php echo site_url('transaksi_klien/kembali') ?>",
      cache: false,
      success: function(result){
        window.location.href = "<?php echo site_url('pemesanan/pemesanan') ?>";
      }
    })
  });

  $('#simpan').click(function(){
    $.ajax({
      url: "<?php echo site_url('transaksi_klien/tombol_simpan') ?>",
      dataType: "JSON",
      cache: false,
      beforeSend:function(){
        $('#modal-loading').modal('show');
      },
      success: function(result){
        if (result.status) {
          $.ajax({
            url: "<?php echo site_url('transaksi_klien/kirim_email') ?>",
            async: false
          })
          $('#modal-loading').modal('hide');
          window.location.href = "<?php echo site_url('pemesanan/pemesanan?notif=Data pemesanan berhasil disimpan&alert=success&logo_notif=check') ?>";
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
      url: "<?php echo site_url('transaksi_klien/hapus_detail'); ?>",
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
      url: '<?php echo site_url('transaksi_klien/edit_detail'); ?>',
      dataType: 'JSON',
      data: {edit: edit},
      success: function(result){
        $('input#harga_jual').val(result.harga_jual);
        $('textarea#keterangan').val(result.keterangan);
        $('select#jenis_pesanan').val(result.jenis_pesanan);

        for (var i = 0; i < result.tgl.length; i++) {
          $('input[value = '+ result.tgl[i] +']').prop('checked', true);
        }

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
    var tgl = [];
    /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
    $("#checkboxs:checked").each(function() {
      tgl.push($(this).val());
    });

      $.ajax({
        type: 'POST',
        url: "<?php echo site_url('transaksi_klien/tombol_edit'); ?>",
        data: {edit: edit, jenis_pesanan: jenis_pesanan, harga_jual: harga_jual, keterangan: keterangan, tgl: tgl},
        success: function(result) {
          if (harga_jual != "" && keterangan != "" && jQuery('input#checkboxs').is(":checked")) {
            $('.result').html(result);
            $('#batal_edit').hide();
            $('#tombol_edit').hide();
            $('#tambah').show();
            $('#jenis_pesanan').prop('selectedIndex', 0);
            $('#harga_jual').val('');
            $('#keterangan').val('');
            $('input#checkboxs').prop('checked', false);
            $('input#pilih_semua').prop('checked', false);
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
      $('#jenis_pesanan').prop('selectedIndex', 0);
      $('#harga_jual').val('');
      $('#keterangan').val('');
      $('input#checkboxs').prop('checked', false);
      $('input#pilih_semua').prop('checked', false);
  });
</script>
