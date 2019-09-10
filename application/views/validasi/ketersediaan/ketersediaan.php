<script type="text/javascript">
  $(document).ready(function(){
  $("#cek").click(function(){

    var tgl = $('#reservation').val();

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Ketersediaan/cek') ?>',
      data: {tgl: tgl},
      cache: false,
      success: function(result){
        $('.result').html(result);
        $('tgl').text(tgl);
        $('#tabel').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
        })
      }
    });

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Ketersediaan/cek2') ?>',
      data: {tgl: tgl},
      cache: false,
      success: function(result){
        $('.result2').html(result);
        $('#tabel1').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
        })
      }
    });

    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('Ketersediaan/kategori') ?>',
      data: {tgl: tgl},
      cache: false,
      success: function(result){
        $('.result_kategori').html(result);
      }
    });


  });

});
</script>
