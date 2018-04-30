<html>
        <head>
            <title>Aplikasi Komplain </title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <link rel="stylesheet" href="css2/bootstrap.min.css">
            <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.min.css" >
            <!-- bootstrap 4 atas ini primary dan sama 1 online 1 offline -->
            <link rel="stylesheet" href="css2/bootstrap.css">
            <link rel="stylesheet" href="css2/_variables.scss">
            <link rel="stylesheet" href="css2/_bootswatch.scss">
            <link rel="stylesheet" href="css2/style.css">
           <!-- bundle dari bootsrap 4 online -->
            <script src="//cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
            <!-- atas ini ck editor buat form -->
            <!-- <script src="css2/jquery.min.js"></script>
            <script src="css2/popper.min.js"></script>
            <script src="css2/bootstrap.min.js"></script>
             INI SEMUA MODAL. GA JADI -->
        </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-white">
    <a class="navbar-brand" href="<?php echo base_url();?>kompsay">
        <img src="<?php echo base_url();?>.\images\Logo.png" alt="logo" width="120" heigh="60"></a>
        <!-- <div class='navbar-right' style="font-family:'Segoe UI',Arial,sans-serif">KENYAMANAN KEAMANAN UNTUK MEMAKSIMALKAN</div> -->
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url();?>komplain"><b>Daftar Komplain<span class="sr-only">(current)</b></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url();?>unit"><b>Daftar Komplain(UNIT)</b></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url();?>kompsay"><b>Komplain Saya</b></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url();?>dashboard"><b>Visualisasi</b></a>
            </li>
          </ul>
          <div>
          <ul class="nav navbar-nav navbar-right">
        
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo base_url();?>katkomplain"><b>Kategori Komplain</b></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo base_url();?>komplain/tambahkomplain"><b>Buat Komplain</b></a>
                </li >
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo base_url();?>users/logout"><b>Log Out</b></a>
                </li>
              
            <?php if(!$this->session->userdata('user_loggedin')) : ?>
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo base_url();?>users/register" hidden><b>Register</b></a>
                </li >
          
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo base_url();?>users/login"><b>Login</b></a>
                </li >
                <?php endif; ?>
          </ul>
          </div>
        </div>
      </nav>
    
    <div class='container'>

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

