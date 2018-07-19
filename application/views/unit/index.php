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

<br><br>
<div class="container">
    <h2>Daftar Komplain Masuk: <b><?php echo $this->session->userdata("nama");?></b></h2><hr>
    <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th style="text-align:center">NIM </th>
                    <th style="text-align:center">ID Kategori</th>
                    <th style="text-align:center">Judul Komplain</th>
                    <th style="text-align:center">Tanggal Komplain</th>
                    <!-- <th width="360" style="text-align:center">Tanggal Status Ubah</th> -->
                    <th style="text-align:center">Status Komplain</th>
                    <th style="text-align:center">Aksi</th>
                    </tr>
            </thead>
        <tbody>
                    <?php $no = $this->uri->segment('3') + 1; foreach($unit as $u) : ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align:center"><?php echo $u->id_user;?></td>
                    <td style="text-align:center"><?php echo $u->id_kat_kom;?></td>
                    <td width="200" style="text-align:left"><?php echo $u->judul;?></td>
                    <td style="text-align:center"><?php echo $u->tanggal_kom;?></td>
                    <!-- <td style="text-align:center"><?php echo $u->tanggal_ubah;?></td> -->
                    <td width="190" style="text-align:center"><?php echo $u->status;?></td>
                    <td style="text-align:center">
                    <a class="btn btn-success" href="<?php echo site_url('/unit/edit/'.$u->id_kom); ?>">
                    Ubah Status
                    </a>
                    </td>
                </tr>
                    <?php endforeach; ?>
            </tbody>
        </div>
</table>
            <div class="pagination-links"><?php echo $halaman;?></div><br>



            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script>
            $(document).ready(function(){
                $("details").click(function(){
                    $("p").slideToggle();
                });
            });
            </script> -->
