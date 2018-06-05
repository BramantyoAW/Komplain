<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">

<br>

<br>

<?php echo validation_errors(); ?></h4>
    <?php echo form_open_multipart('unit/proseskom');?>
    <form>
      <div class="container">
        <!-- <h2><b><?= $title; ?></b></h2><br> -->
        <div class="control-group" >
              <label >Nomor Induk Mahasiswa Pengirim</label>
              <div class="controls">
                <input type="text" class='form-control' name="id_user" value="<?php echo $this->session->userdata("id_user"); ?>" readonly>
              </div>
            </div> <br>
            <div class="control-group" >
              <label >ID Komplain</label>
              <div class="controls">
                <input type="text" class='form-control'name="id_kom" value="<?php echo $detail_kom["id_kom"];?>" readonly>
              </div>
            </div> <br>
            <div class="control-group" >
              <label >Status Komplain</label>
              <div class="controls">
                <select class="form-control" name="" id="">
                    <option value="Dapat Diproses">Dapat Diproses</option>
                    <option value="Tidak Dapat Diproses">Tidak Dapat Diproses</option>
                    <option value="Proses Selesai">Proses Selesai</option>
                </select>
              </div>
            </div><br>
            <div class="control-group">
              <label>Tanggal Komplain</label>
              <div class="controls">
                <input type="text" name="tanggal_kom"  class='form-control' value="<?php echo date('Y-m-d');?>" readonly>
              </div>
            </div><br>
            <div class="control-control">
              <label>Keterangan</label>
              <div class="controls">
                <textarea id="editor1" class='form-control' name="deskripsi"  placeholder=""></textarea>
              </div><br>
            </div>
            <div>
              <button type="submit" class="btn btn-success">Tambah Komplain</button>
            </div>
      </div>
  </form>

