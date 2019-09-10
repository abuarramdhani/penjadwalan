<script>
$(document).ready(function(){

  $('#modal-batalkan').on('show.bs.modal', function (event) {

    // Tombol dimana modal di tampilkan
    var button = $(event.relatedTarget);

    // Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
    var kode = button.data('kode');
    var controller = button.data('controller');
    var form = button.data('form');

    var modal = $(this);

    // Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
    // modal.find('#kode').attr("href","hapus/"+kode);
    $('#batal').click(function(){
      $.ajax({
        url: '<?php echo site_url(); ?>'+controller+'/pembatalan/'+kode,
        cache: false,
        success: function(result){

          $('#modal-batalkan').modal('hide');
          $('teks').text('Transaksi '+form+' berhasil dibatalkan');
          $('#alert').attr('class', 'alert alert-success');
          $('#logo').attr('class', 'fa fa-check');

          setTimeout(function(){ $("#notif").fadeIn('slow');}, 500);
          $('.result').html(result);
          setTimeout(function(){ $("#notif").fadeOut('slow');}, 3000);


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
    });

  });

});
</script>
