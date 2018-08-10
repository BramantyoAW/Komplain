<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
  <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('katkomplain/tambahkatkom');?>
<br>
    <form>
        <div class="container">
        <h2><b><?= $title; ?></b></h2>
            <div class="control-group" >
              <label >ID Kategori Komplain <font color="red" style="font-size:14px">*Wajib Diisi</font></label>
              <div class="controls">
                <input type="text" class='form-control' name="id_kat_kom" placeholder="Contoh : INR01 untuk ( INFRASTRUKTUR 1 ) *Maksimal 5 Kata" maxlength="5" required>
              </div>
            </div> <br>
            <div class="control-group" >
              <label >Nama Kategori Komplain <font color="red" style="font-size:14px">*Wajib Diisi</font></label>
              <div class="controls">
                <input type="text" class='form-control' name="nama_kat_kom" placeholder="Contoh : Bangunan Universitas Kristen Duta Wacana" maxlength="50" required>
              </div>
            </div> <br>
            <div class="control-group">
              <label>Tanggal Tambah Kategori </label>
              <div class="controls">
                <input type="text" name="tanggal_kat"  class='form-control' value="<?php echo date('Y-m-d');?>" readonly>
              </div>
            </div><br>
            <div>
              <button type="submit" class="btn btn-success">Tambah Komplain</button>
            </div>
        </div>
  </form>

