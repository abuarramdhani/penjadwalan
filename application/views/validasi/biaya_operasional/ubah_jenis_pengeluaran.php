<script type="text/javascript">
  $(document).ready(function(){
  $("#ubah").click(function(){

    var kode = $('#kode').val();
    var cek = <?php echo $jenis_pengeluaran_item['kd_jenis_pengeluaran']; ?>;
    var nama = $('#nama').val();
    var status = $('input[name = status]:checked').val();

    if (kode == "") {
      $('.form-group.kode.col-md-12').attr('class', 'form-group kode has-error col-md-12')
      $("input#kode").attr("style", "background: white; color: black;");
      $('.vali').hide();
      $('#kode_error').show();
      $('input#kode').focus();
    }

    if (nama == "") {
      $('.form-group.nama.col-md-12').attr('class', 'form-group nama has-error col-md-12')
      $('.vali').hide();
      $('#nama_error').show();
      $('input#nama').focus();
    }

    if(kode == "" && nama == "")
    {
      $('input#kode').focus();
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Jenis_pengeluaran/cek_kode2') ?>',
      dataType: 'JSON',
      data: {kode: kode, cek: cek},
      cache: false,
      success: function(result){
        if (result) {
          $(".form-group.kode.col-md-12").attr("class", "form-group kode has-error col-md-12");
          $("input#kode").attr("style", "background: red; color: white;");
          $('label#kode_cek').show();
          $("input#kode").focus();
        }
        else {
          $.ajax({
            type: 'POST',
            url: '<?php echo site_url('Jenis_pengeluaran/tombol_ubah/'.$jenis_pengeluaran_item['kd_jenis_pengeluaran']) ?>',
            data: {kode: kode, nama: nama, status: status},
            cache: false,
            success: function(result){
              if (kode != '' && nama != '') {
                window.location.href = "<?php echo site_url('jenis_pengeluaran/jenis_pengeluaran?notif=Data Jenis pengeluaran berhasil diubah&alert=success&logo_notif=check') ?>";
              }
            }
          })
        }
      }
    })
  });

});
</script>
