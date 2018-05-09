<?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').' </p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedout')): ?>
    <?php echo '<p class="alert alert-primary">'.$this->session->flashdata('user_loggedout').' </p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').' </p>'; ?>
  <?php endif; ?>
        <!-- bootstrap -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <link rel="stylesheet" href="<?php echo base_url(); ?>css2/bootstrap.min.css">
            <!-- <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.min.css" > -->
            <!-- bootstrap 4 atas ini primary dan sama 1 online 1 offline -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>css2/bootstrap.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>css2/_variables.scss">
            <link rel="stylesheet" href="<?php echo base_url(); ?>css2/_bootswatch.scss">
            <link rel="stylesheet" href="<?php echo base_url(); ?>css2/style.css">
            
<?php echo form_open('users/login'); ?>
        <!-- <body background=".\Images\LAPTOPKUH.jpg">
        <br><br><br><br>
            <div align="center">
                <img src=".\images\Logo.png" alt="ERRORHUMAN">
            
            <div class="col-md-3" align="center" >
            <div class="form-control" style="background-color:#FFFFFF">
            <p><b>Masuk</b></p>
            <table >
                <tr>
                <td >ID Pengguna</td>
                <td><input class="form-control" type="text" name="id_user" required></td>
                </tr>
                <tr>
                <td>Kata Sandi</td>
                <td><input class="form-control" type="password" name="password" required></td>
                </tr>    
            </table>
            <div align="center">
                    <button class="btn btn-success" type="submit" >Login</button>
            </div>
            </div>
            </div>
            </div>

    </body> -->

    <br><br><br><br><br><br>
    <div align="center">
		<div align="center" class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="NIM" name="id_user"  required autofocus>
			</div>
			<div class="form-group">
				<input type="password"  class="form-control" placeholder="Masukkan Sandi" name="password" required autofocus>
			</div>
			<button type="submit" class="btn btn-success btn-block">Masuk</button>
		</div>
	</div>

<?php echo form_close(); ?>

