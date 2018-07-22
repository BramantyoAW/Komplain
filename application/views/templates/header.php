<html>
        <head>
            <title>Aplikasi Komplain </title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <link rel="stylesheet" href="css2/bootstrap.min.css">
            <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.min.css" >    
            <!-- bootstrap 4 atas ini primary dan sama 1 online 1 offline -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- atas ini buat icon -->
            <link rel="stylesheet" href="css2/bootstrap.css">
            <link rel="stylesheet" href="css2/_variables.scss">
            <link rel="stylesheet" href="css2/_bootswatch.scss">
            <link rel="stylesheet" href="<?php echo base_url();?>css2/style.css">
           <!-- bundle dari bootsrap 4 online -->
            <script src="//cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
            <!-- atas ini ck editor buat form -->
            <!-- <script src="css2/jquery.min.js"></script>
            <script src="css2/popper.min.js"></script>
            <script src="css2/bootstrap.min.js"></script> -->
        </head>
    <body>


    <!-- navbar 1 (KIRI)-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-white">
    <a class="navbar-brand" href="<?php echo base_url();?>home/homelogin">
        <img src="<?php echo base_url();?>.\images\Logo.png" alt="logo" width="120" heigh="60"></a>
        <!-- <div class='navbar-right' style="font-family:'Segoe UI',Arial,sans-serif">KENYAMANAN KEAMANAN UNTUK MEMAKSIMALKAN</div> -->
        </div>
        <ul class="navbar-nav mr-auto">
        <li class="navbar-item active"></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" >
        <li>Halo, <?php echo $this->session->userdata("nama"); ?> ( <?php echo $this->session->userdata("id_user"); ?> )<br> 
         <a href="<?php echo base_url();?>users/logout">Log Out <i class="fa fa-sign-out"></i></a>
        </li>
        </ul>
    </nav>

    <!-- navbar 2 (KIRI)-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <!-- mahasiswa -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
          <!-- Page Netral Home -->
          <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>home/homelogin" hidden><b>Home<span class="sr-only">(current)</b></span></a>
          </li>
          <?php if($this->session->userdata('id_role') != 3): ?>
          <?php else:?>
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>home/homelogin" hidden><b>Daftar Komplain<span class="sr-only">(current)</b></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>komplain/komsay" ><b>Komplain Saya</b></a>
              </li>
            <?php endif; ?>
          <!-- Unit -->
          <?php if($this->session->userdata('id_role') != 2): ?>
          <?php else: ?>
          <li class="nav-item active">
               <a class="nav-link" href="<?php echo base_url();?>unit/index"><b>Daftar Komplain(UNIT)</b></a>
          </li>
          <?php endif; ?>
          <!-- admin -->
          <?php if($this->session->userdata('id_role') != 1): ?>
          <?php else: ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>dashboard" ><b>Dashboard</b></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>komplain/indexadm"><b>Daftar Komplain<span class="sr-only">(current)</b></span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>katkomplain/index"><b>Kategori Komplain</b></a>
          </li>
          <?php endif; ?>
          </ul>
          <div>
          <!-- Navbar Kanan -->
          <ul class="nav navbar-nav navbar-right">
            <?php if($this->session->userdata('id_role') != 3) : ?>
          <?php else: ?>
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo base_url();?>komplain/tambahkomplain"><b>Buat Komplain</b></a>
                </li >
            <?php endif; ?>
                <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>users/login" hidden><b>Login</b></a>
                </li>
                <!-- log out dah jadi di header atas, hidden -->
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo base_url();?>users/logout"hidden><b>Log Out</b></a>
                </li >
          </ul>
          </div>
        </div>
      </nav>
    
  

  <!-- Flash message -->
  <?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').' </p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('komplain_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('komplain_created').' </p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('katkomplain_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('katkomplain_created').' </p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('katkomplain_edited')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('katkomplain_edited').' </p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('katkomplain_deleted')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('katkomplain_deleted').' </p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('status_edited')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('status_edited').' </p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').' </p>'; ?>
  <?php endif; ?>

