<!-- <script>
$('#myModal').on('shown.bs.modal', function () {
$('#myInput').trigger('focus')
})
</script>  -->

<br>
<h2><b>Daftar kategori Komplain</b></h2><br>
    <div class="container nav navbar-nav navbar-right table-responsive" >
          <td class="nav-item active">
          <p><a class="btn btn-success" href="<?php echo site_url();?>katkomplain/tambahkatkom">Tambah Kategori Komplain</a></p>
          </td>
    </div>
            <table class="table table-stripped">
                <thead>
                <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">ID Kategori Komplain</th>
                    <th style="text-align:center">Nama Kategori Komplain </th>
                    <th style="text-align:center">Tanggal & Jam</th>
                    <th style="text-align:center" colspan="2">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = $this->uri->segment('3') + 1; foreach($kat_kom as $kat) : ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align:center"><?php echo $kat->id_kat_kom;?></td>
                    <td style="text-align:center"><?php echo $kat->nama_kat_kom;?></td>
                    <td style="text-align:center"><?php echo $kat->tanggal_kat;?></td> 
                    <td>
                    <a type="submit" class="btn btn-warning" href="<?php echo site_url('/katkomplain/edit/'.$kat->id_kat_kom); ?>">
                    Ubah 
                    </a>
                    </td>
                    <td width="50">
                    <a type="submit" class="btn btn-danger" value="hapus" href="<?php echo site_url('/katkomplain/hapus/'.$kat->id_kat_kom); ?>"/>hapus </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="halaman"><?php echo $halaman;?></div><br>


            
             
            
           