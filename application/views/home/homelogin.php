<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
<!-- Caurosel -->
<script src="css2/cr/jquery.min.js"></script>
<script src="css2/cr/popper.min.js"></script>
<script src="css2/cr/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 50%;
  }
  </style>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
 
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url();?>.\images\ukdw1.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url();?>.\images\ukdw2.jpg" alt="Chicago" width="1100" height="500">
    </div>
  </div>

  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div><br>

<div class="container">
<h3><b>Daftar Komplain</b></h3><hr>
  <div class="row">
    <div class="col-md-12">
      <div class="container">
        <table class="table" style="border:2px solid black">
                <thead>
                <tr>
                    <th style="text-align:center">No</th>
                    <!-- <th style="text-align:left">Nama </th> -->
                    <th width="200" style="text-align:left">Kategori</th>
                    <th width="160" style="text-align:left">Judul</th>
                    <th width="80" style="text-align:left">Waktu</th>
                    <!-- <th width="160" style="text-align:left">Status</th> -->
                    <th widht="150" style="text-align:center">Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = $this->uri->segment('3') + 1; foreach($komplain as $komp) : ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <!-- <td style="text-align:left"><?php echo $komp->id_user;?></td> -->
                    <td style="text-align:left"><?php echo $komp->id_kat_kom;?></td>
                    <td style="text-align:left"><?php echo $komp->judul;?></td>
                    <td style="text-align:left"><?php echo $komp->tanggal_kom;?></td>
                    <!-- <td style="text-align:left"><?php echo $komp->status;?></td> -->
                    <td style="text-align:center">
                    <a type="submit" class="btn btn-info" href="<?php echo site_url('/home/detailkomplainlogin/'.$komp->id_kom); ?>">
                    Detail 
                    </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
      </table>
          <div class="pagination-links"><?php echo $halaman;?>
            </div>
        </div><br>
    </div>    


  <div class="col-md-12">
    <h3><b>Cara Komplain :</b></h3><hr>
    <img src="<?php echo base_url();?>.\images\carakomplain3.png" alt="carakomplain" style="margin-right:10px;" width="1100px" height="800px">
  </div>
  </div>
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


