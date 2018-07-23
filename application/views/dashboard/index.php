<!-- <body> -->
    
<?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<p class="alert alert-primary">'.$this->session->flashdata('user_loggedin').' </p>'; ?>
  <?php endif; ?>

<div class="container"><br>
<h2><b>REPORT DASHBOARD KOMPLAIN KESELURUHAN</b></h2><hr>
    
     
       
        
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css2/Chart.min.js"></script>

    <br>
    <div class="row">
    <div class="col-md-12">
    <canvas id="myChart1" style="width: 200px; height: 100px; border:0px solid #000000; background-color:#D0D3D5; text-align:center"></canvas>
      <script type="text/javascript">
      
      <?php
        foreach($data as $data){
            $kom[] = $data->nama_kat_kom;
            // $count[] = $data->count('id_kat_kom');
            $STATUS[] = (float) $data->STATUS;
        }
      ?>
      

   
      var ctx = document.getElementById("myChart1");
            var myChart1 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($kom);?>,
                    datasets: [{
                        label: 'Data Komplain Keseluruhan',
                        data: <?php echo json_encode($STATUS);?>,
                        backgroundColor: [
                            'rgba(65, 150, 132, 0.2)',
                            'rgba(255, 150, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(65,150,132,1)',
                            'rgba(255,150,132,1)',
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
</div>

        <!-- <div class='tableauPlaceholder' id='viz1531410432488' style='position: relative'><noscript><a href='#'><img alt='Dashboard  ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Ko&#47;KomplainDashboard&#47;Dashboard2&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='KomplainDashboard&#47;Dashboard2' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Ko&#47;KomplainDashboard&#47;Dashboard2&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1531410432488');                    var vizElement = divElement.getElementsByTagName('object')[0];                    vizElement.style.width='1000px';vizElement.style.height='827px';                    var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>
    </div> -->
    <div class="row">
    <div class="col-sm-6">
        <!-- <div rowspan="2"> -->
        <br> 
        <canvas id="myChart2" style="width: 400px; height: 192px; border:0px solid #000000; background-color:#D0D3D5;"></canvas>

        <?php
        foreach($line as $a){
            $date[] = $a->tanggal;
            $jumlah[] = (float)$a->jumlah;
            // $count[] = $data->count('id_kat_kom');
            // $STATUS[] = (float) $data->STATUS;
        }
      ?>
            
            <script>
            
            Chart.defaults.global.hover.mode = 'nearest';
            var ctx = document.getElementById("myChart2");
            var myChart2 = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($date); ?>,
                    datasets: [
                        {
                            label: "Data Komplain Harian",
                            fill: false,
                            boolean: false,
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
                            pointRadius: 2,
                            poinHitRadius: 2,
                            data: <?php echo json_encode($jumlah);?>,
                            spanGaps: false, 
                        }
                    ]
                },
                options: {
                    legend: {
                        label: {
                            fontColor: 'rgb(255, 99, 132)',
                            defaultfontsize:12,
                            
                        },
                        display:{
                            boolean:false
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                tension: 1,
                                stacked: true,
                                // userCallback: function(label, index, labels) {
                                // // when the floored value is the same as the value we have a whole number
                                // if (Math.floor(label) === label) {
                                //     return label;
                                // }
                                fixedStepSize: 1
                            }
                        }]
                    },
                    animation: {
                        duration: 0
                    },
                    hover: {
                    // Overrides the global setting
                    mode: 'index'
                    }
                }
            });
            </script>
            </div>
<br>
        <div class="col-md-6">
        <br>
        <canvas id="myChart3" style="width: 400px; height: 192px; border:0px solid #000000; background-color:#D0D3D5;"></canvas>
        <?php
        foreach($pie as $p){
            $stat[] = $p->status;
            $jum[] = (float)$p->jumlah;
        }
      ?>
      
            <script>
                var ctx = document.getElementById("myChart3");
                var myChart3 = new Chart(ctx,{
                    type: 'pie',
                    data:{
                        datasets: [{
                            data: []
                        }],
                        labels: <?php echo json_encode($stat);?>,
                        datasets: [{
                            label: "Status Komplain Keseluruhan",
                            backgroundColor: ["#FFFF33", "#2398FE","#3cba9f","#FF0800","#c45850"] ,
                            data: <?php echo json_encode($jum);?>
                          }]
                        },
                        options: {
                          title: {
                            display: true,
                            text: 'Status Komplain Keseluruhan'
                          }
                        }
                    });

            </script>
    </div>
    </div>
    <!--    -->
    <!-- </div> -->
