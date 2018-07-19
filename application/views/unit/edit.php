<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<!-- Ajax Modal -->
<script type="text/javascript">
   
    var save_method;

    function add()
    {
    save_method = 'add';
    $('#myForm')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
    

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }

    function refreshPage()
    {
        window.location.reload();
    }


    function save(){
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('unit/editstatus')?>";
    }else{
        url = "<?php echo site_url('unit/editstatus')?>";
    }

    
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#myForm').serialize(),
        dataType: "JSON",
        async: true,
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                refreshPage();
                $('#myModal').modal('hide');
                reload_table();
               
                // windows.location.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
</script>

<br>
<div class="container">
<!--  -->

<!-- data komplain -->
<h2><b><?php echo $unit['judul']; ?></b></h2><a href="<?php echo base_url();?>unit/proseskom" hidden>Proses Komplain</a><br>
<!-- ID TYPE HIDDEN SANGAT PENTING UNTUK UPDATE/DELET ANJNG 3 HARI GA KETEMU2 CUMA GARA2 ITU -->
<input type="hidden" name="id_kom" value="<?php echo $unit['id_kom']; ?>"> 
<a><b> Nama Orang Komplain : <?php echo $unit['id_user']; ?> </b> </a> <br><br> 


<!-- modal start -->
<button id="btnAdd" onclick="Add()" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
   Proses Komplain
  </button>
  <!-- <button onclick="window.location.reload()" class="btn btn-success">Refresh</button> -->
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Unit :</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form id="myForm" method="post" class="form-horizontal">
            <div class="container">
                <!-- <h2><b><?= $title; ?></b></h2><br> -->
                <div class="control-group" >
                    <input type="text" class="form-control" name="id_detail_kom" value="" hidden>
                    <label >ID Unit</label>
                    <div class="controls">
                        <input type="text" class='form-control' name="id_user" value="<?php echo $this->session->userdata("id_user"); ?>" readonly>
                    </div>
                    </div> <br>
                    <div class="control-group" >
                    <label >ID Komplain</label>
                    <div class="controls">
                        <input type="text" class='form-control'name="id_kom" value="<?php echo $unit['id_kom']; ?>" readonly>
                    </div>
                    </div> <br>
                    <div class="control-group" >
                    <label >Status Komplain</label>
                    <div class="controls">
                        <select class="form-control" name="status">
                            <option value="Proses">Proses</option>
                            <option value="Tidak Dapat Diproses">Tidak Dapat Diproses</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    </div><br>
                    <div class="control-group">
                    <label>Tanggal Diubah</label>
                    <div class="controls">
                        <input type="text" name="tgl_update"  class='form-control' value="<?php echo date('Y-m-d');?>" readonly>
                    </div>
                    </div><br>
                    <div class="control-control">
                    <label>Catatan Komplain</label>
                    <div class="controls">
                    <!-- id="editor1" -->
                        <textarea  class='form-control' name="keterangan"  placeholder=""></textarea>
                    </div><br>
                    </div>
                    <div>
                    <button type="submit" id="btnSave" onclick="save()" class="btn btn-success" >Tanggapi Komplain</button>
                    </div>
            </div>
            </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <!-- <button type="submit" class="btn btn-success" data-dismiss="modal" href="">Tambah Unit</button> -->
          <!-- <button type="button" class="btn btn-succes" value="tambahkatunit" data-dismiss="modal" href="<?php echo site_url('/katkomplain/tambahkatunit/'.$katkomplain->id_kat_kom); ?>"/>Simpan </button> -->
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">
<div class="row">
    <div class="col-md-4">
            <div class="gallery">
                <a target="_blank" href="<?php echo site_url(); ?>images/gambarbaruupload/<?php echo $unit['gambar_komplain']; ?>">
                    <img src="<?php echo site_url(); ?>images/gambarbaruupload/<?php echo $unit['gambar_komplain']; ?>" width="600" height="400">
                </a>
                <div class="desc"><b>Klick untuk memperbesar gambar</b></div>
            </div>
    </div>


<!--Unit yang memproses  -->
    <div class="col-md-8">      
            <small class="post-date">Kode Komplain : <?php echo $unit['id_kat_kom']; ?></small>
            <small class="post-date">Tanggal Komplain : <?php echo $unit['tanggal_kom'] ?></small><br>
            <p>Lokasi : <?php echo $unit['lokasi'] ?></p> 
            <p><b>Deskripsi Lengkap :</b> </br><?php echo $unit['deskripsi']; ?> </p>
            <p><b>Solusi Dari Komplain : </b><br><?php echo $unit['solusi']; ?> </p><br>
            <!-- <label >Ubah Status Komplain</label> -->
            <!-- <select class='form-control' name="status" placeholder="Pilih Ubah Status Komplain">
                <option > <?php echo $unit['status']; ?></option>
                <option value="Dapat Diproses">Dapat Diproses</option>
                <option value="Tidak Dapat Diproses">Tidak Dapat Diproses</option>
            </select><br> -->

       
            <!-- <label>Tanggal Ubah Status</label>
            <input type="text" name="tanggal_ubah"  class='form-control' value="<?php echo date('Y-m-d');?>" readonly><br>
            <button type="submit" class="btn btn-success">Ubah Status Komplain</button> -->
    </div>  
</div>
</div>
</div>
<br>
    <div class="container">
        <div class="alert alert-dismissible alert-primary">
        <h3>Proses Komplain : <b></b></h3>
        <div class="alert alert-dismissible alert-light">
        <?php foreach($detail_kom as $u) : ?>
            <div class="panel-heading">Deskripsi Komplain</div>
            <div class="panel-body">
                <li>Diproses oleh    :  <b><?php echo $u->id_user;?></b></li>
                <li>Status Komplain  :  <i><b><u><?php echo $u->status;?></u></b></i></li>
                <li>Diproses Tanggal :  <b><?php echo $u->tgl_update;?></b></li>
                <li>Catatan Proses   :  <b><?php echo $u->keterangan;?></b></li><hr>
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







        <style>
        .post-date{
            background:#f4f4f4;
            padding:4px;
            margin:3px;
            display:block;

        }

        
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
        </style>