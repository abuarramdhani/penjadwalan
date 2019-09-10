<!-- validasi tombol pilih -->
<script type="text/javascript">
  $(document).ready(function(){

    $('.select2').select2();

    $('#show_alat_sewa').click(function(){
      if (jQuery("input#show_alat_sewa").is(":checked")) {
        $('.sewa_alat').show();
      }
      else {
        $('.sewa_alat').hide();
      }
    });

    $('#peralatan').change(function(){
      $('.form-group.peralatan.has-error.col-md-12').attr('class', 'form-group peralatan col-md-12')
      $('#peralatan_cek').hide();
    });

    $("#tambah, #tombol_edit").click(function(){
      $('.error').hide();
      $('.vali').hide();

      var peralatan = $('#peralatan').val();

      $('.alert').hide();

      });

    $("#tambah").click(function(){
      var peralatan = $('#peralatan').val();

      $.ajax({
        type: 'POST',
        url: "<?php echo site_url('proses_pemesanan/cek_peralatan'); ?>",
        dataType: "JSON",
        data: {peralatan: peralatan},
        cache: false,
        success: function(result) {
          if (result > 0) {
            $('.form-group.peralatan.col-md-12').attr('class', 'form-group peralatan has-error col-md-12')
            $('#peralatan_cek').show();
          }
          else{
            $.ajax({
              type: 'POST',
              url: "<?php echo site_url('proses_pemesanan/tombol_tambah_peralatan'); ?>",
              data: {peralatan: peralatan},
              cache: false,
              success: function(result) {
                $('.result').html(result);
                $('select#peralatan').prop('selectedIndex', 0);
                $('select#peralatan').trigger('change');
              }
            });
          }
        }
      });
    });

    $('#batal').click(function(){
      var back = '<?php echo $_GET['back']; ?>';
      $.ajax({
        url: "<?php echo site_url('proses_pemesanan/kembali_peralatan') ?>",
        cache: false,
        success: function(result){
          if (back == 'rab') {
            window.location.href = "<?php echo site_url('rab/'.$_SESSION['kd_pemesanan']) ?>";
          }
          else if (back == 'rab2') {
            window.location.href = "<?php echo site_url('rab2/'.$_SESSION['kd_pemesanan']) ?>";
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
        url: "<?php echo site_url('proses_pemesanan/tombol_pilih_peralatan/'.$_SESSION['kd_pemesanan']) ?>",
        dataType: "JSON",
        cache: false,
        beforeSend:function(){
          $('#modal-loading').modal('show');
        },
        success: function(result){
          if (result.status) {
            if (back == 'rab') {
              $('#modal-loading').modal('hide');
              window.location.href = "<?php echo site_url('rab/'.$_SESSION['kd_pemesanan'].'?notif=Data peralatan event berhasil diubah&alert=success&logo_notif=check') ?>";
            }
            else if (back == 'rab2') {
              $('#modal-loading').modal('hide');
              window.location.href = "<?php echo site_url('rab2/'.$_SESSION['kd_pemesanan'].'?notif=Data peralatan event berhasil diubah&alert=success&logo_notif=check') ?>";
            }
            else {
              $('#modal-loading').modal('hide');
              window.location.href = "<?php echo site_url('pemesanan/pemesanan?notif=Data peralatan event berhasil disimpan&alert=success&logo_notif=check') ?>";
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
      url: "<?php echo site_url('proses_pemesanan/hapus_peralatan'); ?>",
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
      url: '<?php echo site_url('proses_pemesanan/edit_peralatan'); ?>',
      dataType: 'JSON',
      data: {edit: edit},
      success: function(result){
        $('select#peralatan').val(result.peralatan);
        $('select#peralatan').trigger('change');
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
    var peralatan = $('#peralatan').val();

    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('proses_pemesanan/cek_peralatan2'); ?>",
      dataType: "JSON",
      data: {edit: edit, peralatan: peralatan},
      cache: false,
      success: function(result) {
        if (result > 0) {
          $('.form-group.peralatan.col-md-12').attr('class', 'form-group peralatan has-error col-md-12')
          $('#peralatan_cek').show();
        }
        else {
          $.ajax({
            type: 'POST',
            url: "<?php echo site_url('proses_pemesanan/tombol_edit_peralatan'); ?>",
            data: {edit: edit, peralatan: peralatan},
            success: function(result) {
                $('.result').html(result);
                $('#batal_edit').hide();
                $('#tombol_edit').hide();
                $('#tambah').show();
                $('select#peralatan').prop('selectedIndex', 0);
                $('select#peralatan').trigger('change');
            }
          });
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
      $('select#peralatan').prop('selectedIndex', 0);
      $('select#peralatan').trigger('change');
  });
</script>
