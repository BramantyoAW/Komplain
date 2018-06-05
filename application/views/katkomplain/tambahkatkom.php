<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
  <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('katkomplain/tambahkatkom');?>
<br>
    <form>
        <div class="container">
        <h2><b><?= $title; ?></b></h2>
            <div class="control-group" >
              <label >Id Kategori Komplain</label>
              <div class="controls">
                <input type="text" class='form-control' name="id_kat_kom" placeholder="Contoh : INR01 ( INFRASTRUKTUR 1 )">
              </div>
            </div> <br>
            <div class="control-group" >
              <label >Nama Kategori Komplain</label>
              <div class="controls">
                <input type="text" class='form-control' name="nama_kat_kom" placeholder="">
              </div>
            </div> <br>
            <div class="control-group">
              <label>Tanggal Komplain</label>
              <div class="controls">
                <input type="text" name="tanggal_kat"  class='form-control' value="<?php echo date('Y-m-d');?>" readonly>
              </div>
            </div><br>
            <div>
              <button type="submit" class="btn btn-success">Tambah Komplain</button>
            </div>
        </div>
  </form>

