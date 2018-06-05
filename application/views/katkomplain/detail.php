<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>css2/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

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
       url = "<?php echo site_url('katkomplain/addkatU')?>";
   }else{
       url = "<?php echo site_url('katkomplain/addkatU')?>";
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
            <h2><b><?php echo $katkomplain['id_kat_kom']; ?> - <?php echo $katkomplain['nama_kat_kom']; ?></b></h2><br>
      <div class="control-group" >
          <label >Id Kategori Komplain</label>
        <div class="controls">
          <input type="text" class='form-control' name="id_kat_kom" value="<?php echo $katkomplain['id_kat_kom']; ?>" readonly>
        </div>
      </div> <br>
      <div class="control-group" >
          <label >Nama Kategori Komplain</label>
        <div class="controls">
          <input type="text" class='form-control' name="nama_kat_kom" value="<?php echo $katkomplain['nama_kat_kom'];?>"readonly>
        </div>
      </div> <br>
      
      
<div class="container">
  <!-- Button to Open the Modal -->
  <label>Nama Unit Yang Menangani : </label>
  <button id="btnAdd" onclick="add()" type="button" class="btn btn-success"  data-target="#myModal">
   Tambah Unit
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Unit : <b> </b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="myForm" method="post" class="form-horizontal">
        <label>Kategori Komplain</label>
        <input type="text" id="" name="id_kat_unit" class='form-control' value="" hidden><br>
        <div class="control">
          <input type="text" id="" name="id_kat_kom" class='form-control' value="<?php echo $katkomplain['id_kat_kom'];?>" readonly>
        </div><br>
        <div class="control-group" >
        <div class="control-group" >
        <label >Status Komplain</label>
        <div class="controls">
         <select class="form-control" name="id_user">
          <option>Pilih Unit</option>
          <?php foreach($namaunit as $b) : ?>
            <option value="<?php echo $b['id_user']; ?>"><?php echo $b['id_user']; ?> - <?php echo $b['nama']?></option>
          <?php endforeach ?>
         </select><br>
         </div>
        </div><br>
         <button type="submit" id="btnSave" class="btn btn-success" onclick="save()" data-dismiss="modal" href="">Tambah Unit</button>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <!-- <button type="submit" class="btn btn-success" onclick="save()" data-dismiss="modal" href="">Tambah Unit</button> -->
          <!-- <button type="button" class="btn btn-succes" value="tambahkatunit" data-dismiss="modal" href="<?php echo site_url('/katkomplain/tambahkatunit/'.$katkomplain->id_kat_kom); ?>"/>Simpan </button> -->
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div><br><br>

        <div class="col-md-3" style="margin-right:60px">
          <table class="table table-stripped">
            <thead>
              <tr>
                <th style="text-align:center">Nama </th>
              </tr>
            </thead>

            <tbody>
              <?php foreach($a as $u) : ?>
                <tr>
                  <td ><?php echo $u->nama;?></td>
                </tr>
              <?php endforeach ?>
          </table>
        </div>
        
      <!-- <div>
          <button type="submit" class="btn btn-success">Simpan</button>
      </div> -->
  </div>
  