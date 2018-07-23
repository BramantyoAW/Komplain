<br>
<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
<?php $this->session->userdata('user_loggedin'); ?>
<!-- <h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2> -->


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
<div class="container">
    <h2>Daftar Komplain <b><?php echo $this->session->userdata("nama"); ?> ( <?php echo $this->session->userdata("id_user"); ?> )</b></h2>
    <form class="form-inline my-2 my-lg-0" role="form" action="<?php echo base_url().'komplain/searchadm';?>" method="post">
    <div class="col-md-4" style="margin-left:780px">
    <input class="form-control mr-sm-2" name="search" id="search" type="text" placeholder="Cari IDKategori / Status">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit">Search</button>
      </div><br>
      <p class="col-md-6" style="margin-left:740px"><font color="#FF0000"><?php echo $message;?></font></p>
      </form><br>

            <table class="table">
                <thead>
                <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">Nim </th>
                    <th width="120" style="text-align:center">ID Kategori</th>
                    <th width="120" style="text-align:center">Judul Komplain</th>
                    <th style="text-align:center">Tanggal & Jam</th>
                    <th style="text-align:center">Status Komplain</th>
                    <th style="text-align:left">Detail Komplain</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = $this->uri->segment('3') + 1; foreach($komplain as $komp) : ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align:left"><?php echo $komp->id_user;?></td>
                    <td style="text-align:center"><?php echo $komp->id_kat_kom;?></td>
                    <td width="220" style="text-align:left"><?php echo word_limiter($komp->judul, 5);?></td>
                    <td style="text-align:center"><?php echo $komp->tanggal_kom;?></td>
                    <td width="190" style="text-align:center"><?php
                        if($komp->status == 'Proses'){
                          echo '<span class="badge badge-info">Proses</span>';
                        } else if($komp->status == 'Selesai'){
                            echo '<span class="badge badge-success">Selesai</span>';
                        } else if($komp->status == 'Tidak Dapat Diproses'){
                            echo '<span class="badge badge-danger">Tidak Dapat Diproses</span>';
                        }else if($komp->status == 'Pengajuan'){
                            echo'<span class="badge badge-warning">Pengajuan</span>';
                        } else {
                        echo'<span class="badge badge-dark">';
                        echo $komp->status;
                        echo '</span>';
                      };?>
                     </td>
                    <td>
                    <a type="submit" class="btn btn-info" href="<?php echo site_url('/komplain/detailkomplain/'.$komp->id_kom); ?>">
                    Detail Komplain 
                    </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
    <div class="pagination-links"><?php echo $halaman;?></div><br>
</div>
            
          
