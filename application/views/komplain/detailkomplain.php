<!-- manggil bootsrap offline -->
<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">

        <br>
        <h1><b><?php echo $komplain['judul']; ?></b></h1>
        <p>-<?php echo $komplain['id_kat_kom']; ?> - Nama kategori komplain belum jadi</p>
               <div>
               <a><b> Nama Orang Komplain : <?php echo $komplain['id_user']; ?> </b> </a> <br><br> 
               <div class="responsive">
                    <div class="gallery">
                        <a target="_blank" href="<?php echo site_url(); ?>images/gambarbaruupload/<?php echo $komplain['gambar_komplain']; ?>">
                            <img src="<?php echo site_url(); ?>images/gambarbaruupload/<?php echo $komplain['gambar_komplain']; ?>" width="600" height="400">
                        </a>
                    <div class="desc"><b>INI FOTO KOMPLAIN</b></div>
                    </div>
                </div>
               <small class="post-date">Lokasi : <?php echo $komplain['lokasi'] ?></small><br>
               <small class="post-date">Tanggal Komplain : <?php echo $komplain['tanggal_kom'] ?></small>
                <br> 
                <p><b>Deskripsi Lengkap : </b><?php echo $komplain['deskripsi']; ?> </p>
                <p><b>Solusi Dari Komplain : </b><br><?php echo $komplain['solusi']; ?> </p>
               <br><br><br>
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