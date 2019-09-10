<!-- notif -->
<div id='notif' class='col-xs-12'>
  <div id='alert' class='alert alert-<?php if(isset($_GET['alert'])){ echo $_GET['alert'];} ?>'>
  <p style='text-align: center;'><i id='logo' class='fa fa-<?php if(isset($_GET['logo_notif'])){ echo $_GET['logo_notif'];} ?>'></i> <teks><?php if(isset($_GET['notif'])){ echo $_GET['notif'];} ?></teks></p>
  </div>
</div>

<style media="screen">
  #notif{
    display: none;
    z-index: 100000;
    margin-top: 4%;
    position: fixed;
  }
</style>
