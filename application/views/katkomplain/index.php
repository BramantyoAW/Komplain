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

<script>
function doconfirm()
{
    job=confirm("Apakah anda yakin menghapus KATEGORI KOMPLAIN ini ?");
    if(job!=true)
    {
        return false;
    }
}
</script>


<br>
<div class="container">
    <div class="container">
    <h2><b>Daftar kategori Komplain</b></h2><hr>
        <div class="container nav navbar-nav navbar-right table-responsive" >
            <td class="nav-item active">
            <p><a class="btn btn-success" href="<?php echo site_url();?>katkomplain/tambahkatkom">Tambah Kategori Komplain</a></p>
            </td>
        </div>
    </div>
        <div class="container">
            <table class="table table-stripped">
                <thead>
                <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:left">ID Kategori Komplain</th>
                    <th style="text-align:left">Nama Kategori Komplain </th>
                    <th style="text-align:center" colspan="2">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = $this->uri->segment('3') + 1; foreach($kat_kom as $kat) : ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align:left"><?php echo $kat->id_kat_kom;?></td>
                    <td style="text-align:left"><?php echo $kat->nama_kat_kom;?></td>
                    <td>
                    <a type="submit" class="btn btn-warning" href="<?php echo site_url('/katkomplain/detail/'.$kat->id_kat_kom); ?>">
                    Detail 
                    </a>
                    </td>
                    <td width="20">
                    <a type="submit" class="btn btn-danger" value="hapus" href="<?php echo site_url('/katkomplain/hapus/'.$kat->id_kat_kom); ?>" onClick="return doconfirm();"/>
                    hapus </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="pagination-links"><?php echo $halaman;?></div><br>
        </div>
</div>


            
             
            
           