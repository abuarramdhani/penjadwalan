<!--notif success-->
<script>
//angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
  $(document).ready(function(){
    setTimeout(function(){
      $("#notif").fadeIn('slow');}, 500);
    });
//angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
  setTimeout(function(){
    $("#notif").fadeOut('slow');}, 3000);
</script>
