<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
<br>

<?php echo form_open('unit/editstatus');?>
<h2><b><?php echo $unit['judul']; ?></b></h2><br>
<!-- ID TYPE HIDDEN SANGAT PENTING UNTUK UPDATE/DELET ANJNG 3 HARI GA KETEMU2 CUMA GARA2 ITU -->
<input type="hidden" name="id_kom" value="<?php echo $unit['id_kom']; ?>" ?>
    <p>-<?php echo $unit['id_kat_kom']; ?> - Nama kategori komplain belum jadi</p>
    <div>
        <a><b> Nama Orang Komplain : <?php echo $unit['id_user']; ?> </b> </a> <br><br> 
        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="<?php echo site_url(); ?>images/gambarbaruupload/<?php echo $unit['gambar_komplain']; ?>">
                    <img src="<?php echo site_url(); ?>images/gambarbaruupload/<?php echo $unit['gambar_komplain']; ?>" width="600" height="400">
                </a>
            <div class="desc"><b>INI FOTO KOMPLAIN</b></div>
        </div>
            <small class="post-date">Lokasi : <?php echo $unit['lokasi'] ?></small><br>
            <small class="post-date">Tanggal Komplain : <?php echo $unit['tanggal_kom'] ?></small><br> 
            <p><b>Deskripsi Lengkap : </br><?php echo $unit['deskripsi']; ?> </p>
            <p><b>Solusi Dari Komplain : </b><br><?php echo $unit['solusi']; ?> </p><br>
        <div class="controls">
            <label >Ubah Status Komplain</label>
            <select class='form-control' name="status" placeholder="Pilih Ubah Status Komplain">
       
                <option > <?php echo $unit['status']; ?></option>
                <option value="Dapat Diproses">Dapat Diproses</option>
                <option value="Tidak Dapat Diproses">Tidak Dapat Diproses</option>
            </select><br>
        <div>

        <div class="control-group">
              <label>Tanggal Ubah Status</label>
              <div class="controls">
                <input type="text" name="tanggal_ubah"  class='form-control' value="<?php echo date('Y-m-d');?>" readonly>
              </div>
            </div><br>
    
        <button type="submit" class="btn btn-success">Ubah Status Komplain</button>
    </div><br><br>
               
    </div>

    <style>
            div.gallery {
                border: 1px solid #ccc;
            }
            
            div.gallery:hover {
                border: 1px solid #777;
            }
            
            div.gallery img {
                width: 100%;
                height: auto;
            }
            
            div.desc {
                padding: 15px;
                text-align: center;
            }
            
            * {
                box-sizing: border-box;
            }
            
            .responsive {
                padding: 0 6px;
                float: left;
                width: 24.99999%;
            }
            
            @media only screen and (max-width: 700px) {
                .responsive {
                    width: 49.99999%;
                    margin: 6px 0;
                }
            }
            
            @media only screen and (max-width: 500px) {
                .responsive {
                    width: 100%;
                }
            }
            
            .clearfix:after {
                content: "";
                display: table;
                clear: both;
            }
            
               </style>







        <style>
        .post-date{
            background:#f4f4f4;
            padding:4px;
            margin:3px;
            display:block;

        }

        
        <style>
            div.gallery {
                border: 1px solid #ccc;
            }
            
            div.gallery:hover {
                border: 1px solid #777;
            }
            
            div.gallery img {
                width: 100%;
                height: auto;
            }
            
            div.desc {
                padding: 15px;
                text-align: center;
            }
            
            * {
                box-sizing: border-box;
            }
            
            .responsive {
                padding: 0 6px;
                float: left;
                width: 24.99999%;
            }
            
            @media only screen and (max-width: 700px) {
                .responsive {
                    width: 49.99999%;
                    margin: 6px 0;
                }
            }
            
            @media only screen and (max-width: 500px) {
                .responsive {
                    width: 100%;
                }
            }
            
            .clearfix:after {
                content: "";
                display: table;
                clear: both;
            }
            
               </style>
        </style>