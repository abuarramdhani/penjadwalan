<!-- validasi tombol pilih -->
<script type="text/javascript">
  $(document).ready(function(){

    $('.select2').select2();

    $('#vendor').change(function(){
      $('.form-group.vendor.has-error.col-md-12').attr('class', 'form-group vendor col-md-12')
      $('#vendor_cek').hide();
    });

    $("#tambah_sewa, #tombol_edit_sewa").click(function(){
      $('.cek').hide();
      $('.error').hide();
      $('.vali').hide();

      $('.alert').hide();

      });

    $("#tambah_sewa").click(function(){
      var nama = $('#nama_alat').val();
      var jumlah = $('#jumlah').val();
      var harga = $('#harga').val();
      var vendor = $('#vendor').val();

      if (nama == "" || jumlah == "" || harga == "") {
        if (harga == "") {
          $(".form-group.harga.col-md-12").attr("class", "form-group harga has-error col-md-12");
          $("label#harga_error").show();
          $("input#harga").focus();
        }

        if (jumlah == "") {
          $(".form-group.jumlah.col-md-12").attr("class", "form-group jumlah has-error col-md-12");
          $("label#jumlah_error").show();
          $("input#jumlah").focus();
        }

        if (nama == "") {
          $(".form-group.nama_alat.col-md-12").attr("class", "form-group nama_alat has-error col-md-12");
          $("label#nama_alat_error").show();
          $("input#nama_alat").focus();
        }
      }
      else {
        $.ajax({
          type: 'POST',
          url: "<?php echo site_url('proses_pemesanan/tombol_tambah_alat_sewa'); ?>",
          data: {nama: nama, jumlah: jumlah, harga: harga, vendor: vendor},
          cache: false,
          success: function(result) {
            $('.result_sewa').html(result);
            $('#nama_alat').val("");
            $('#jumlah').val("");
            $('#harga').val("");
            $('select#vendor').prop('selectedIndex', 0);
            $('select#vendor').trigger('change');
            }
        });
      }
    });

});
</script>

<script type="text/javascript">
$("body").on("click","#hapus_sewa",function(){
  var hapus = $(this).attr('data-id');
    $.ajax({
      type: 'POST',
      url: "<?php echo site_url('proses_pemesanan/hapus_alat_sewa'); ?>",
      data: {hapus: hapus},
      success: function(result) {
          $('.result_sewa').html(result);
      }
    })
  });
</script>

<script type="text/javascript">
  $('body').on('click', '#edit_sewa', function(){
    var edit = $(this).attr('data-id');
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('proses_pemesanan/edit_alat_sewa'); ?>',
      dataType: 'JSON',
      data: {edit: edit},
      success: function(result){
        $('input#nama_alat').val(result.nama);
        $('input#jumlah').val(result.jumlah);
        $('input#harga').val(result.harga);
        $('select#vendor').val(result.vendor);
        $('select#vendor').trigger('change');
        $('#batal_edit_sewa').show();
        $('#tombol_edit_sewa').attr('data-id', edit);
        $('#tombol_edit_sewa').show();
        $('#tambah_sewa').hide();
      }
    });
  });
</script>

<script type="text/javascript">
  $('body').on('click', '#tombol_edit_sewa', function(){
    var edit = $(this).attr('data-id');
    var nama = $('#nama_alat').val();
    var jumlah = $('#jumlah').val();
    var harga = $('#harga').val();
    var vendor = $('#vendor').val();

    if (nama == "" || jumlah == "" || harga == "") {
      if (harga == "") {
        $(".form-group.harga.col-md-12").attr("class", "form-group harga has-error col-md-12");
        $("label#harga_error").show();
        $("input#harga").focus();
      }

      if (jumlah == "") {
        $(".form-group.jumlah.col-md-12").attr("class", "form-group jumlah has-error col-md-12");
        $("label#jumlah_error").show();
        $("input#jumlah").focus();
      }

      if (nama == "") {
        $(".form-group.nama_alat.col-md-12").attr("class", "form-group nama_alat has-error col-md-12");
        $("label#nama_alat_error").show();
        $("input#nama_alat").focus();
      }
    }
    else {
      $.ajax({
        type: 'POST',
        url: "<?php echo site_url('proses_pemesanan/tombol_edit_alat_sewa'); ?>",
        data: {edit: edit, nama: nama, jumlah: jumlah, harga: harga, vendor: vendor},
        cache: false,
        success: function(result) {
          $('.result_sewa').html(result);
          $('#nama_alat').val("");
          $('#jumlah').val("");
          $('#harga').val("");
          $('select#vendor').prop('selectedIndex', 0);
          $('select#vendor').trigger('change');
          $('#batal_edit_sewa').hide();
          $('#tombol_edit_sewa').hide();
          $('#tambah_sewa').show();
          }
      });
    }

  });
</script>

<script type="text/javascript">
  $('body').on('click', '#batal_edit_sewa', function(){
      $('#batal_edit_sewa').hide();
      $('#tombol_edit_sewa').hide();
      $('#tambah_sewa').show();
      $('#nama_alat').val("");
      $('#jumlah').val("");
      $('#harga').val("");
      $('select#vendor').prop('selectedIndex', 0);
      $('select#vendor').trigger('change');
  });
</script>
