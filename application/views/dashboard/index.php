<!-- <body> -->
    

<div class="container">
    <!-- <div class="row">
        <div class="col-md-6"> -->
        <h2>REPORT DASHBOARD KOMPLAIN KESELURUHAN</h2><hr>
        
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
    </div>
    <!-- </body>

        <div class="col-md-6">
            
            <script>

            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Januari", "Febuari", "March", "April", "May","Juni","July"],
                    datasets: [
                        {
                            label: "Percobaan Line Charts",
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: "rgba(75,192,192,0,4)",
                            borderColor: "rgba(75,192,192,1)",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "rgba(75,192,192,1)",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            PointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(75,192,192,1)",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            poinHitRadius: 10,
                            data: [65, 29, 80, 81, 59, 55, 40],
                            spanGaps: false, 
                        }
                    ]
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
        </div>
    </div>
</div> -->

        