<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
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
<br>
<?php $this->session->userdata('user_loggedin'); ?>

<div class="container">
<h3>Daftar Komplain <b><?php echo $this->session->userdata("nama"); ?> ( <?php echo $this->session->userdata("id_user"); ?> )</b></h3>
<hr>
            <table class="table">
                <thead>
                <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">NIM </th>
                    <th width="170" style="text-align:center">ID Kategori</th>
                    <th width="150" style="text-align:center">Judul Komplain</th>
                    <th width="180" style="text-align:center">Tanggal & Jam</th>
                    <th width="160" style="text-align:center">Status Komplain</th>
                    <th widht="150" style="text-align:center">Detail Komplain</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = $this->uri->segment('3') + 1; foreach($komplain as $komp) : ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align:center"><?php echo $komp->id_user;?>
                    <td style="text-align:center"><?php echo $komp->id_kat_kom;?></td>
                    <td style="text-align:left"><?php echo word_limiter($komp->judul, 5);?></td>
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
            
            <!-- <div class="pagination-links"><?php echo $halaman;?></div><br> -->
</div>
