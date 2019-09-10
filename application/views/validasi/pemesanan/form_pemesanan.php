<script type="text/javascript">
$(document).ready(function(){
  $('.select2').select2();
  
  $('#nama_event').keydown(function() {
    $(".form-group.nama_event.has-error.col-md-12").attr("class", "form-group nama_event col-md-12");
    $('.error').hide();
  });

  $('#lokasi').keydown(function() {
    $(".form-group.lokasi.has-error.col-md-12").attr("class", "form-group lokasi col-md-12");
    $('.error').hide();
  });


});
</script>
