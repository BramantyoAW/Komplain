<!-- manggil bootsrap offline -->
<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">

<div class="container">
<br>
    <h1><b><?php echo $komplain['judul']; ?></b></h1>
    <a><b> Nim  : <?php echo $komplain['id_user']; ?> </b> </a> <hr><br>


    <div class="row">
        <div class="col-md-4">
            <div class="gallery">
                <a target="_blank" href="<?php echo site_url(); ?>images/gambarbaruupload/<?php echo $komplain['gambar_komplain']; ?>">
                    <img src="<?php echo site_url(); ?>images/gambarbaruupload/<?php echo $komplain['gambar_komplain']; ?>" width="600" height="400">
                </a>
            <div class="desc"><b>INI FOTO KOMPLAIN</b></div>
        </div>
    </div>


        <div class="col-md-8">    
                <small class="post-date">Id Komplain : <?php echo $komplain['id_kat_kom']; ?> </small>
                <small class="post-date">Tanggal Komplain : <?php echo $komplain['tanggal_kom'] ?></small><br>
                <p><b>Lokasi : </b><?php echo $komplain['lokasi'] ?></p> 
                <p><b>Deskripsi Lengkap : </b><?php echo $komplain['deskripsi']; ?> </p>
                <p><b>Solusi Dari Komplain : </b><br><?php echo $komplain['solusi']; ?> </p>
        </div>
    </div>
</div>
<br>

<div class="container">
        <div class="alert alert-dismissible alert-primary">
        <h3>Proses Komplain : <b></b></h3>
        <div class="alert alert-dismissible alert-light">
        <?php foreach($detail_kom as $u) : ?>
            <div class="panel-heading">Proses Komplain</div>
            <div class="panel-body">
                <li>Diproses oleh    :<b><?php echo $u->id_user;?></b></li>
                <li>Status Komplain  : <i><?php 
                if($u->status == 'Proses'){
                    echo '<span class="badge badge-info">Proses</span>';
                  } else if($u->status == 'Selesai'){
                      echo '<span class="badge badge-success">Selesai</span>';
                  } else if($u->status == 'Tidak Dapat Diproses'){
                      echo '<span class="badge badge-danger">Tidak Dapat Diproses</span>';
                  }else if($u->status == 'Pengajuan'){
                      echo'<span class="badge badge-warning">Pengajuan</span>';
                  } else {
                  echo'<span class="badge badge-dark">';
                  echo $u->status;
                  echo '</span>';
                  };?></i>
                </li>
                <li>Diproses Tanggal :<b><?php echo $u->tgl_update;?></b></li>
                <li>Catatan Proses   :<b> <?php echo $u->keterangan;?></b></li><hr>
            </div>
        <?php endforeach ?>
        </div>
        </div>
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