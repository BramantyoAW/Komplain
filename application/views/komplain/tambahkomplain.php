<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">

<br>

<br>

<?php echo validation_errors(); ?></h4>
    <?php echo form_open_multipart('komplain/tambahkomplain');?>
    <form>
      <div class="container">
        <h2><b><?= $title; ?></b></h2><br>
        <div class="control-group" >
              <label >Nomor Induk Mahasiswa Pengirim</label>
              <div class="controls">
                <input type="text" class='form-control' name="id_user" value="<?php echo $this->session->userdata("id_user"); ?>" readonly>
              </div>
            </div> <br>
            <div class="control-group" >
              <label >Kategori Komplain</label>
              <div class="controls">
              <select class='form-control' name="id_kat_kom">
              <!-- <option></option> -->
              <option >Pilih Komplain</option>
              <?php foreach($kat_kom as $kategori): ?>
                <option value="<?php echo $kategori['id_kat_kom']; ?>"><?php echo $kategori['id_kat_kom']; ?> - <?php echo $kategori['nama_kat_kom']; ?></option>
              <?php endforeach ;?>
              </select>
              </div>
            </div> <br>
            <div class="control-group" >
              <label>Judul Komplain</label>
              <div class="controls">
                <input type="text" class='form-control' name="judul" placeholder="">
              </div>
            </div> <br>
            <div class="control-group" >
            <label>Lokasi Kejadian</label>
              <div class="controls">
                <input type="text" name="lokasi" class='form-control' placeholder="Contoh : Kafetaria/Tempat Parkir/Ruang Kelas">
              </div>
            </div><br>
            <div class="control-group" >
              <label >Status Komplain</label>
              <div class="controls">
                <input type="text" name="status" class='form-control' value='Pengajuan' readonly>
              </div>
            </div><br>
            <div class="control-group">
              <label>Tanggal Komplain</label>
              <div class="controls">
                <input type="text" name="tanggal_kom"  class='form-control' value="<?php echo date('Y-m-d');?>" readonly>
              </div>
            </div><br>
            <div class="control-control">
              <label>Masukkan Bukti Gambar</label>
                <input class="form-control" type="file" name="userfile" size="20" >
            </div><br>
            <div class="control-control">
              <label>Deskripsi Komplain</label>
              <div class="controls">
                <textarea id="editor1" class='form-control' name="deskripsi"  placeholder=""></textarea>
              </div><br>
            </div>
            <div class="control-control"> 
              <label>Solusi dari Komplain</label>
              <div class="col-md-12">
                <div class="controls">
                  <div class="form-check-inline">
                      <label class="form-check-label" for="radio1">
                        <input type="radio" class="form-check-input" id="radio1" name="solusi" value="-" checked>Tidak ada
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio2">
                        <input type="radio" class="form-check-input" id="radio2" name="solusi" value="Tingkatkan lagi kinerjanya">Tingkatkan lagi kinerjanya
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio3">
                        <input type="radio" class="form-check-input" id="radio3" name="solusi" value="Segera diperbaiki">Segera diperbaiki
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio4">
                        <input type="radio" class="form-check-input" id="radio4" name="solusi" value="Segera ditindak lanjuti">Segera ditindak lanjuti
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio5">
                        <input type="radio" class="form-check-input" id="radio5" name="solusi" value="Segera dicek">Segera dicek
                      </label>
                    </div><br><br>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio6">
                        <input type="radio" class="form-check-input" id="radio6" name="solusi" value="">lain - lain
                      </label>
                    </div>
                  </div>
                  </div>
                </div>
           <br>
            <div class="control-group">
              <!-- <label>Solusi dari Komplain</label>
              <div class="controls">
                <textarea id="editor2" class='form-control' name="solusi"  placeholder=""></textarea>
              </div> <br> -->
            </div><br>
            <div>
              <button type="submit" class="btn btn-success">Tambah Komplain</button>
            </div>
      </div>
  </form>

