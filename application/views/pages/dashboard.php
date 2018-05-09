<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    //Modifikasi 
    <?php 

      $namahost = "localhost";
      $namaPengguna = "root";
      $katasandi = "";
      $nama_dbase = "komplaindb";
      $koneksi = mysqli_connect($namahost, $namaPengguna, $katasandi);
      $database = mysqli_select_db($koneksi, $nama_dbase);

      //cek koneksi
      // if(!koneksi)
      //   echo '<div class="alert alert-danger" role="alert">Koneksi Gagal</div>';

      // // if(!database)
      // // echo '<div class="alert alert-success" role="alert">Databse tidak ditemukan</div>';

      //Query
      $query="SELECT id_kat, count( id_kat), STATUS FROM komplain NATURAL JOIN kategori group BY id_kat, STATUS";

      $results = mysqli_query($koneksi,$query);
      $res = mysqli_fetch_array($results);
      
      // while($data=mysqli_fetch_array($getkomplain)){
        // echo $data[0]. $data[1]. $data[2].",/<br>";
        // die('INI DATA');
      // }

      // $data[]=mysqli_fetch_array($getkomplain);
    ?>
     

     google.charts.load('current', {'packages':['bar']});
     google.charts.setOnLoadCallback(drawChart);

     function drawChart() {
       var data = google.visualization.arrayToDataTable([
         ['Year', 'Sales', 'Expenses'], 
          ['2014', 1000, 400],
          ['2015', 1170, 460],
          ['2016', 660, 1120],
          ['2017', 1030, 540]
       ]);

       var options = {
         chart: {
           title: 'Company Performance',
           subtitle: 'Sales, Expenses, and Profit: 2014-2017',
         }
       };

       var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

       chart.draw(data, google.charts.Bar.convertOptions(options));
     }

    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 600px;"></div>
    <?php echo"ada data"; ?>
    <?php foreach($res as $data){
      echo $data[0];
    } ?>
  </body>
</html>