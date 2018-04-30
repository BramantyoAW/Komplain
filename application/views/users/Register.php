            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <link rel="stylesheet" href="<?php echo base_url(); ?>css2/bootstrap.min.css">
            <!-- <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.min.css" > -->
            <!-- bootstrap 4 atas ini primary dan sama 1 online 1 offline -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>css2/bootstrap.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>css2/_variables.scss">
            <link rel="stylesheet" href="<?php echo base_url(); ?>css2/_bootswatch.scss">
            <link rel="stylesheet" href="<?php echo base_url(); ?>css2/style.css">

    <?php echo validation_errors(); ?>
    <?php echo form_open('users/register'); ?>
    
        <div align="center" class="">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="text-center"><?= $tittle; ?></h2>
                    <div class="form-group">
                        <label>ID User</label>
                        <input type="text" class="form-control" name="id_user" placeholder="ID USER">
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Role</label>
                        <select class='form-control' name="id_role">
                        <!-- <option></option> -->
                        <option value="" type="readonly" >1 - Admin</option>
                        <option value="2">2 - Unit</option>
                        <option value="3">3 - Mahasiswa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Tambah User</button>
            </div>
        </div>
    <?php echo form_close(); ?>