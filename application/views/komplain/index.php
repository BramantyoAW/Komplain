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
<!-- <h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2> -->


<br>
<div class="container">
    <h2><b>Daftar Komplain</b></h2>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align:center">No</th>
                <th style="text-align:center">Nama </th>
                <th width="170" style="text-align:left">ID Kategori</th>
                <th width="160" style="text-align:left">Judul Komplain</th>
                <th width="150" style="text-align:center">Tanggal & Jam</th>
                <th width="160" style="text-align:left">Status Komplain</th>
                <th widht="150" style="text-align:left">Detail Komplain</th>
            </tr>
        </thead>
            <tbody>
            <?php $no = $this->uri->segment('3') + 1; foreach($komplain as $komp) : ?>
            <tr>
                <td style="text-align:center"><?php echo $no++; ?></td>
                <td style="text-align:left"><?php echo $komp->id_user;?></td>
                <td style="text-align:left"><?php echo $komp->id_kat_kom;?></td>
                <td style="text-align:left"><?php echo $komp->judul;?></td>
                <td style="text-align:center"><?php echo $komp->tanggal_kom;?></td>
                <td style="text-align:left"><?php echo $komp->status;?></td>
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
             
