<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
<!-- Caurosel -->
<script src="css2/jquery.min.js"></script>
<script src="css2/popper.min.js"></script>
<script src="css2/bootstrap.min.js"></script>


<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      
      width: 100%;
      height: 62%;
  }
  </style>

<br>
<div class="container">
<div id="demo" class="carousel slide;" data-ride="carousel">
  <div class="row">
  <div class="col-md-12">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
 
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url();?>.\images\ukdw1.jpg" alt="komplain1" width="1100" height="250">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url();?>.\images\corousel4.png" alt="komplain2" width="1100" height="250">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url();?>.\images\corousel6.png" alt="komplain2" width="1100" height="250">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>  
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>  
</div>
</div>
</div>
</div><br>

<div class="container">
<h1><b>Daftar Komplain</b></h1><hr>


  <div class="row">
    
    <div class="col-md-12">
      <div class="container">
      <table class="table" style="border:1 px solid black">
        <table class="table" style="border:2px solid black">
                <thead>
                <tr>
                    <th style="text-align:center">No</th>
                    <!-- <th style="text-align:center">Nama </th> -->
                    <th width="140" style="text-align:left">ID Komplain</th>
                    <th width="160" style="text-align:left">Judul Komplain</th>
                    <th width="150" style="text-align:center">Tanggal & Jam</th>
                    <th width="180" style="text-align:left">Status Komplain</th>
                    <th widht="150" style="text-align:center">Detail Komplain</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = $this->uri->segment('3') + 1; foreach($komplain as $komp) : ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align:center"hidden><?php echo $komp->id_user;?></td>
                    <td style="text-align:left"><?php echo $komp->id_kat_kom;?></td>
                    <td style="text-align:left"><?php echo $komp->judul;?></td>
                    <td style="text-align:center"><?php echo $komp->tanggal_kom;?></td>
                    <td style="text-align:left"><?php echo $komp->status;?></td>
                    <td style="text-align:center">
                    <a type="submit" class="btn btn-info" href="<?php echo site_url('/home/detailkomplain/'.$komp->id_kom); ?>">
                    Detail
                    </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
      </table>
    </table>
          <div class="pagination-links"><?php echo $halaman;?>
            </div>
        </div><br>
    </div>    


  <div class="col-md-12">
    <h3><b>Cara Komplain :</b></h3><hr>
    <p style="text-align:center"><img src="<?php echo base_url();?>.\images\CaraKomplain8.png" alt="carakomplain" style="margin-right:12 px;" align="" width="1000px" height="250px"></p>
  </div>

  </div><hr>
</div>


<style>
                    .pagination-links{
                    margin:30px 0;
                }

                .pagination-links strong{
                    padding: 8px 13px;
                    margin:5px;
                    background: #f4f4f4;
                    border: 1px #ccc solid;
                }

                a.pagination-link{
                    padding: 8px 13px;
                    margin:5px;
                    background: #f4f4f4;
                    border: 1px #ccc solid;
        }

        
</style>


