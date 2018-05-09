<?php 
    class Dashboard extends CI_Controller{

        // public function index(){
        //     // $this->Visualisasi_model->get_chart_data('chart');
        //     // $result = $this->chart->get_chart_data();
        //     // $data['chart'] = $result['chart'];
        //     // $this->load->view('index.php', $data);
        //     $this->load->model('model', 'chart');
                public function index() {

                    
                if(!empty($_POST["val"])) {
                    $val=$_POST["val"];
                    $result_new=$this->chart->fetch_result($val);

                    $array = array();
                    $cols = array();
                    $rows = array();
                    $cols[] = array("id"=>"","label"=>" id_kat","pattern"=>"","type"=>"string");
                    $cols[] = array("id"=>"","label"=>"Count","pattern"=>"","type"=>"number");  

                    foreach ($result_new as $object) {
                    $rows[] = array("c"=>array(array("v"=>$object->risk_id_kat,"f"=>null),array("v"=>(int)$object->Status_Count,"f"=>null)));
                }

                    $array = array("cols"=>$cols,"rows"=>$rows);
                    echo json_encode($array);

                    $this->load->view('templates/header');
                    $this->load->view('dashboard/index', $data);
                    $this->load->view('templates/footer');

                    }

                }

            }