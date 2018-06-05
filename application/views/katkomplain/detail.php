  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<br>
  <?php echo validation_errors(); ?>
    
      <div class="container">
            <?php echo form_open_multipart('katkomplain/detail');?>
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
          <input type="text" class='form-control' name="nama_kat_kom" value="<?php echo $katkomplain['nama_kat_kom'];?>"readonly>
        </div>
      </div> <br>
      
<div class="container">
  <!-- Button to Open the Modal -->
  <label>Nama Unit Yang Menangani : </label>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
   Tambah Unit
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
  <?php echo form_open('katkomplain/tambahkatunit');?>
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Unit : <b><?php echo $katkomplain['id_kat_kom'];?> </b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <input type="text" name="lokasi" class='form-control' value="<?php echo $katkomplain['id_kat_kom'];?>" readonly>
         <select class="form-control" name="id_user" id="id_user">
          <option value="">Pilih Unit</option>
          <?php foreach($namaunit as $b) : ?>
            <option value="id_user"><?php echo $b['id_user']; ?> - <?php echo $b['nama']?></option>
          <?php endforeach ?>
         </select>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" data-dismiss="modal" href="">Tambah Unit</button>
          <!-- <button type="button" class="btn btn-succes" value="tambahkatunit" data-dismiss="modal" href="<?php echo site_url('/katkomplain/tambahkatunit/'.$katkomplain->id_kat_kom); ?>"/>Simpan </button> -->
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div><br>

        <div class="col-md-3" style="margin-right:60px">
          <table class="table table-stripped">
            <thead>
              <tr>
                <th style="text-align:center">Nama</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach($a as $u) : ?>
                <tr>
                  <td ><?php echo $u->nama;?></td>
                </tr>
              <?php endforeach ?>
          </table>
        </div>
        
      <div>
          <button type="submit" class="btn btn-success">Simpan</button>
      </div>
  </div>
  