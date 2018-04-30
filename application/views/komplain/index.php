<br>
<h2><b>Daftar Komplain</b></h2>
<br>
            <table class="table">
                <thead>
                <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">Nama </th>
                    <th width="170" style="text-align:center">ID Kategori</th>
                    <th width="160" style="text-align:center">Judul Komplain</th>
                    <th width="180" style="text-align:center">Tanggal & Jam</th>
                    <th width="160">Status Komplain</th>
                    <th widht="150">Detail Komplain</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = $this->uri->segment('3') + 1; foreach($komplain as $komp) : ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align:center"><?php echo $komp->id_user;?></td>
                    <td style="text-align:center"><?php echo $komp->id_kat_kom;?></td>
                    <td style="text-align:center"><?php echo $komp->judul;?></td>
                    <td style="text-align:center"><?php echo $komp->tanggal_kom;?></td>
                    <td style="text-align:center"><?php echo $komp->status;?></td>
                    <td>
                    <a type="submit" class="btn btn-info" href="<?php echo site_url('/komplain/detailkomplain/'.$komp->id_kom); ?>">
                    Detail Komplain 
                    </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="halaman"><?php echo $halaman;?></div><br>
