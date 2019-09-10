<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/dist/img/user-160x160.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['ses_nama'] ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="<?php if(isset($dashboard)){ echo $dashboard; } ?>">
        <a href="<?php echo site_url('dashboard') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="<?php if(isset($ketersediaan)){ echo $ketersediaan; } ?>"><a href="<?php echo site_url('ketersediaan') ?>"><i class="fa fa-search"></i> <span>Periksa Ketersediaan</span></a></li>

        <li class="treeview <?php if(isset($transaksi_klien)){ echo $transaksi_klien; } ?>">
        <a href="">
          <i class="fa fa-pencil"></i> <span>Transaksi Klien</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if(isset($pemesanan)){ echo $pemesanan; } ?>"><a href="<?php echo site_url('pemesanan/pemesanan') ?>"><i class="fa fa-circle-o"></i> Pemesanan</a></li>
          <li class="<?php if(isset($pengembalian_klien)){ echo $pengembalian_klien; } ?>"><a href="<?php echo site_url('pengembalian/klien') ?>"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
        </ul>
      </li>
      <?php
        // if ($this->session->akses == 'superadmin' || $this->session->akses == 'admin') {
        //   echo '<li class="treeview ';if(isset($transaksi_vendor)){ echo $transaksi_vendor; }
        //
        //   echo '">
        // <a href="#">
        //   <i class="fa fa-pencil"></i> <span>Transaksi Vendor</span>
        //   <span class="pull-right-container">
        //     <i class="fa fa-angle-left pull-right"></i>
        //   </span>
        // </a>
        // ';
      //}
      ?>
        <!-- <ul class="treeview-menu">
          <li class="<?php //if(isset($peminjaman)){ echo $peminjaman; } ?>"><a href="<?php //echo site_url('peminjaman/peminjaman') ?>"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
          <li class="<?php //if(isset($pengembalian_vendor)){ echo $pengembalian_vendor; } ?>"><a href="<?php //echo site_url('pengembalian/vendor') ?>"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
          <li class="<?php //if(isset($peralatan_sewa)){ echo $peralatan_sewa; } ?>"><a href="<?php// echo site_url('peralatan/sewa') ?>"><i class="fa fa-circle-o"></i> Peralatan Sewa</a></li>
        </ul>
      </li> -->

      <?php
        if ($this->session->akses == 'superadmin') {
          echo '<li class="treeview '; if(isset($master)){ echo $master; }
          echo '"><a href="#"> <i class="fa fa-book"></i> <span>Data Master</span>
           <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        ';
      }
      ?>
        <ul class="treeview-menu">
          <li class="<?php if(isset($area)){ echo $area; } ?>"><a href="<?php echo site_url('area/area') ?>"><i class="fa fa-bullseye"></i> Area</a></li>
          <li class="<?php if(isset($gaji)){ echo $gaji; } ?>"><a href="<?php echo site_url('gaji/gaji') ?>"><i class="fa fa-money"></i> Gaji</a></li>
          <li class="<?php if(isset($jabatan)){ echo $jabatan; } ?>"><a href="<?php echo site_url('jabatan/jabatan') ?>"><i class="fa fa-black-tie"></i> Jabatan</a></li>
          <li class="<?php if(isset($jenis_pengeluaran)){ echo $jenis_pengeluaran; } ?>"><a href="<?php echo site_url('jenis_pengeluaran/jenis_pengeluaran') ?>"><i class="fa fa-sticky-note-o"></i> Jenis Pengeluaran</a></li>
          <li class="<?php if(isset($jenis_pesanan)){ echo $jenis_pesanan; } ?>"><a href="<?php echo site_url('jenis_pesanan/jenis_pesanan') ?>"><i class="fa fa-sticky-note"></i> Jenis Pesanan</a></li>
          <li class="<?php if(isset($kategori)){ echo $kategori; } ?>"><a href="<?php echo site_url('kategori/kategori') ?>"><i class="fa fa-th"></i> Kategori</a></li>
          <li class="<?php if(isset($klien)){ echo $klien; } ?>"><a href="<?php echo site_url('klien/klien') ?>"><i class="fa fa-user"></i> Klien</a></li>
          <li class="<?php if(isset($kota)){ echo $kota; } ?>"><a href="<?php echo site_url('kota/kota') ?>"><i class="fa fa-building"></i> Kota</a></li>
          <li class="<?php if(isset($merk)){ echo $merk; } ?>"><a href="<?php echo site_url('merk/merk') ?>"><i class="fa fa-ticket"></i> Merk</a></li>
          <li class="<?php if(isset($pegawai)){ echo $pegawai; } ?>"><a href="<?php echo site_url('pegawai/pegawai') ?>"><i class="fa fa-users"></i> Pegawai</a></li>
          <li class="<?php if(isset($pekerjaan)){ echo $pekerjaan; } ?>"><a href="<?php echo site_url('pekerjaan/pekerjaan') ?>"><i class="fa fa-tasks"></i> Pekerjaan</a></li>
          <li class="<?php if(isset($peralatan)){ echo $peralatan; } ?>"><a href="<?php echo site_url('peralatan/peralatan') ?>"><i class="fa fa-camera"></i> Peralatan</a></li>
          <li class="<?php if(isset($tipe)){ echo $tipe; } ?>"><a href="<?php echo site_url('tipe/tipe') ?>"><i class="fa fa-tag"></i> Tipe</a></li>
          <li class="<?php if(isset($vendor)){ echo $vendor; } ?>"><a href="<?php echo site_url('vendor/vendor') ?>"><i class="fa fa-user-secret"></i> Vendor</a></li>
        </ul>
      </li>

      <!-- <li><a href="#"><i class="fa fa-question-circle"></i> <span>Bantuan</span></a></li> -->

  </section>
  <!-- /.sidebar -->
</aside>
