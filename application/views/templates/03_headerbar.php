<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Help menu-->
      <!-- <li>
        <a href="#">
          <i class="fa fa-question-circle"> Bantuan</i>
        </a>
      </li> -->
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo base_url(); ?>assets/dist/img/user-128x128.png" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $_SESSION['ses_nama'] ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="<?php echo base_url(); ?>assets/dist/img/user-160x160.png" class="img-circle" alt="User Image">

            <p>
              <?php echo $_SESSION['ses_nama'] ?>
            </p>
          </li>

          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <button type="button" class="btn btn-warning btn-flat" data-toggle="modal" data-target="#modal-password" data-kode="<?php echo $_SESSION['ses_id']; ?>">
                Ganti Password
              </button>
            </div>
            <div class="pull-right">
              <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-logout">
                Logout
              </button>
            </div>
          </li>
        </ul>
      </li>

      <!-- Control Sidebar Toggle Button
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    -->
    </ul>
  </div>
</nav>
</header>
