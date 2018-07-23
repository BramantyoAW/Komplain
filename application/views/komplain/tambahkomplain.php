<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
<!-- Script dibawah untuk alert eror pada textarea ckeditor -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script> 

<br>

<br>
    <?php echo form_open_multipart('komplain/tambahkomplain');?>
    <form>
      <div class="container">
        <h2><b><?= $title; ?></b></h2><br>
        <?php echo validation_errors(); ?></h4>
        <div class="control-group" >
              <label >Nomor Induk Mahasiswa Pengirim</label>
              <div class="controls">
                <input type="text" class='form-control' name="id_user" value="<?php echo $this->session->userdata("id_user"); ?>" readonly>
              </div>
            </div> <br>
            <div class="control-group" >
              <label >Kategori Komplain <font color="red" style="font-size:14px">*Wajib Dipilih</font></label>
              <div class="controls">
              <select class='form-control' name="id_kat_kom" required>
              <!-- <option></option> -->
              <option value="">Pilih Komplain </option>
              <?php foreach($kat_kom as $kategori): ?>
                <option value="<?php echo $kategori['id_kat_kom']; ?>"><?php echo $kategori['id_kat_kom']; ?> - <?php echo $kategori['nama_kat_kom']; ?></option>
              <?php endforeach ;?>
              </select>
              </div>
            </div> <br>
            <div class="control-group" >
              <label>Judul Komplain <font color="red" style="font-size:14px">*Wajib Diisi</font></label>
              <div class="controls">
                <input type="text" class='form-control' name="judul" placeholder="Maksimal Judul 50 Kata" maxlength="50" required >
              </div>
            </div> <br>
            <div class="control-group" >
            <label>Lokasi Kejadian <font color="red" style="font-size:14px">*Wajib Dipilih</font></label>
              <div class="controls">
                <input type="text" name="lokasi" class='form-control' placeholder="Contoh : Kafetaria/Tempat Parkir/Ruang Kelas" required>
              </div>
            </div><br>
            <div class="control-group" >
              <label >Status Komplain</label>
              <div class="controls">
                <input type="text" name="status" class='form-control' value='Pengajuan' readonly>
              </div>
            </div><br>
            <div class="control-group">
              <label>Tanggal Komplain </label>
              <div class="controls">
                <input type="text" name="tanggal_kom"  class='form-control' value="<?php echo date('Y-m-d');?>" readonly>
              </div>
            </div><br>
            <div class="control-control">
              <label>Masukkan Bukti Gambar <font color="red" style="font-size:14px">*Maksimal Gambar Size 2 mb</font></label>
                <input class="form-control" type="file" name="userfile" size="20" >
            </div><br>
            <div class="control-control">
              <label>Deskripsi Komplain <font color="red" style="font-size:14px">*Wajib Diisi</font></label>
              <div class="controls">
                <textarea  id="" name="deskripsi"   class='form-control' rows="5" cols="60"  placeholder=""></textarea>
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

  <!-- <script type="text/javascript">
         CKEDITOR.replace( 'editor1' );  
  </script> -->

  <!-- <script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
        $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['editor1'].getData().replace(/<[^>]*>/gi, '').null;
            if( !messageLength ) {
                alert( 'Deskripsi Komplain Tidak Boleh Kosong, Tolong Diisi' );
                e.preventDefault();
            }
        });
  </script> -->

