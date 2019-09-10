<!-- validasi tombol tambah -->
<script type="text/javascript">
  $(document).ready(function(){
  $("#tambah, #tombol_edit").click(function(){
    $('.error').hide();
    $('.vali').hide();
    $('.alert').hide();

    $(".form-group.nama_alat.has-error.col-md-12").attr("class", "form-group nama_alat col-md-12");
    $(".form-group.harga_sewa.has-error.col-md-12").attr("class", "form-group harga_sewa col-md-12");
    $(".form-group.jumlah.has-error.col-md-12").attr("class", "form-group jumlah col-md-12");

    var nama_alat = $('#nama_alat').val();
    var harga_sewa = $('#harga_sewa').val();
    var jumlah = $('#jumlah').val();


  		if (nama_alat == "") {
        $(".form-group.nama_alat.col-md-12").attr("class", "form-group nama_alat has-error col-md-12");
        $('.vali').hide();
        $("label#nama_alat_error").show();
        $("input#nama_alat").focus();
      }

      if (harga_sewa == "") {
        $(".form-group.harga_sewa.col-md-12").attr("class", "form-group harga_sewa has-error col-md-12");
        $('.vali').hide();
        $("label#harga_sewa_error").show();
        $("input#harga_sewa").focus();
      }

      if (jumlah == "") {
        $(".form-group.jumlah.col-md-12").attr("class", "form-group jumlah has-error col-md-12");
        $('.vali').hide();
        $("label#jumlah_error").show();
        $("input#jumlah").focus();
      }

      if (nama_alat == "" && harga_sewa == "" && jumlah =="") {
        $('input#nama_alat').focus();
      }

      if (nama_alat == "" && harga_sewa == "" && jumlah != "") {
        $('input#nama_alat').focus();
      }

      if (nama_alat == "" && harga_sewa != "" && jumlah == "") {
        $('input#nama_alat').focus();
      }

      if (nama_alat != "" && harga_sewa == "" && jumlah == "") {
        $('input#harga_sewa').focus();
      }

    });

  $("#tambah").click(function(){

    var nama_alat = $('#nama_alat').val();
    var harga_sewa = $('#harga_sewa').val();
    var jumlah = $('#jumlah').val();

    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('transaksi_vendor/tombol_tambah'); ?>",
      data: {nama_alat: nama_alat, harga_sewa: harga_sewa, jumlah: jumlah},
      cache: false,
      success: function(result) {
        if (nama_alat != "" && harga_sewa != "" &&  jumlah != "") {
          $('.result').html(result);
          $('#nama_alat').val('');
          $('#harga_sewa').val('');
          $('#jumlah').val('');
        }
      }
    });
  });

  $('#kembali').click(function(){
    $.ajax({
      url: "<?php echo site_url('transaksi_vendor/kembali') ?>",
      cache: false,
      success: function(result){
        window.location.href = "<?php echo site_url('peminjaman/tambah') ?>";
      }
    })
  });

  $('#batal').click(function(){
    $.ajax({
      url: "<?php echo site_url('transaksi_vendor/kembali') ?>",
      cache: false,
      success: function(result){
        window.location.href = "<?php echo site_url('peminjaman/peminjaman') ?>";
      }
    })
  });

  $('#ubah').click(function(){
    $.ajax({
      url: "<?php echo site_url('transaksi_vendor/tombol_ubah_detail/'.$_SESSION['kd_peminjaman']); ?>",
      dataType: "JSON",
      cache: false,
      beforeSend:function(){
        $('#modal-loading').modal('show');
      },
      success: function(result){
        if (result.status) {
          $('#modal-loading').modal('hide');
          window.location.href = "<?php echo site_url('peminjaman/peminjaman?notif=Data peminjaman berhasil diubah&alert=success&logo_notif=check') ?>";
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
      url: "<?php echo site_url('transaksi_vendor/hapus_detail'); ?>",
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
      url: '<?php echo site_url('transaksi_vendor/edit_detail'); ?>',
      dataType: 'JSON',
      data: {edit: edit},
      success: function(result){
        $('input#nama_alat').val(result.nama_alat);
        $('input#harga_sewa').val(result.harga_sewa);
        $('input#jumlah').val(result.jumlah);


        $('#batal_edit').show();
        $('#tombol_edit').show();
        $('#tombol_edit').attr('data-id', edit);
        $('#tambah').hide();
      }
    });
  });
</script>

<script type="text/javascript">
  $('body').on('click', '#tombol_edit', function(){
    var edit = $(this).attr('data-id');
    var nama_alat = $('#nama_alat').val();
    var harga_sewa = $('#harga_sewa').val();
    var jumlah = $('#jumlah').val();

    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('transaksi_vendor/tombol_edit'); ?>",
      data: {edit: edit, nama_alat: nama_alat, harga_sewa: harga_sewa, jumlah: jumlah},
      cache: false,
      success: function(result) {
        if (nama_alat != "" && harga_sewa != "" &&  jumlah != "") {
          $('.result').html(result);
          $('#batal_edit').hide();
          $('#tombol_edit').hide();
          $('#tambah').show();
          $('#nama_alat').val('');
          $('#harga_sewa').val('');
          $('#jumlah').val('');
        }
      }
    });
  });
</script>

<script type="text/javascript">
  $('body').on('click', '#batal_edit', function(){
      $('#batal_edit').hide();
      $('#tombol_edit').hide();
      $('#tambah').show();
      $('#nama_alat').val('');
      $('#harga_sewa').val('');
      $('#jumlah').val('');
  });
</script>
