<div style=" max-width: 460px; width:100%;margin: 7% auto;font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: 400;overflow-x: hidden;overflow-y: auto;font-size: 14px;line-height: 1.42857143;border-radius: 20px;">
  <!-- /.login-logo -->
  <div style="background: #666;padding: 20px;border-top: 0;color: #fff; font-size: 12px;">
    <div style="font-size: 20px;text-align: center;font-weight: 300px;">
      <label><b>RK</b>studio</label>
    </div>
    <p>Hallo <?php echo  $cek['nama']; ?>,</p>
    <p>Silahkan klik tombol dibawah ini untuk mengubah password anda.</p>
    <div style="width: 100%;margin: 3% auto;text-align:center; margin-top: 8%;">
      <a style="padding: 3%;text-decoration: none;color: white;background-color: #e08e0b;border-radius: 10px;" href="<?php echo site_url('password_baru?user='.$cek['username'].'&x='.$cek['password']); ?>">Ubah Password</a>
    </div>
  </div>
</div>
