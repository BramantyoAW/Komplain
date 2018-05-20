    <title>TES</title>
    <h2>REPORT DASHBOARD KOMPLAIN KESELURUHAN</h2>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>css2/Chart.min.js"></script>

    <br>
      <canvas id="myChart" style="width: 900px; height: 300px;"></canvas>
      <script type="text/javascript">
      
      <?php
        foreach($data as $data){
            $kom[] = $data->nama_kat_kom;
            // $count[] = $data->count('id_kat_kom');
            $STATUS[] = (float) $data->STATUS;
        }
      ?>

      var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($kom);?>,
                    datasets: [{
                        label: 'Data Komplain Keseluruhan',
                        data: <?php echo json_encode($STATUS);?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 5
                    }]
                    
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>