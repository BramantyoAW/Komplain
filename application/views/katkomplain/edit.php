
<br>
  <?php echo validation_errors(); ?>
    

            <?php echo form_open('katkomplain/edit');?>
            <h2><b><?php echo $katkomplain['id_kat_kom']; ?> - <?php echo $katkomplain['nama_kat_kom']; ?></b></h2><br>
            <div class="control-group" >
              <label >Id Kategori Komplain</label>
              <div class="controls">
                <input type="text" class='form-control' name="id_kat_kom" value="<?php echo $katkomplain['id_kat_kom']; ?>" readonly>
              </div>
            </div> <br>
            <div class="control-group" >
              <label >Nama Kategori Komplain</label>
              <div class="controls">
                <input type="text" class='form-control' name="nama_kat_kom" value="<?php echo $katkomplain['nama_kat_kom'];?>">
              </div>
            </div> <br>
            <div class="control-group">
              <label>Tanggal Komplain Penginputan</label>
              <div class="controls">
                <input type="text" name="tanggal_kat"  class='form-control' placeholder="<?php echo $katkomplain['tanggal_kat'];?>" readonly>
              </div>
            </div><br>
            <div class="control-group">
              <label>Tanggal Komplain Edit Sekarang</label>
              <div class="controls">
                <input type="text" name="tanggal_kat"  class='form-control' value="<?php echo date('Y-m-d');?>" readonly>
              </div>
            </div><br>
            <div>
              <button type="submit" class="btn btn-success">Ubah Kategori Komplain</button>
            </div>
  