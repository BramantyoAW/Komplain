<?php 
    class Dashboard extends CI_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('id_role') != 1){
                redirect('users/login');
            }
            // $this->load->helper(array('url'));
            $this->load->model('dashboard_model'); 
        }

                public function index(){
                    // $this->load->database();
                    // $this->dashboard_model->get_chart_data();

                    // $datagrafik = $this->dashboard_model->get_chart_data();
                    // $data = array ( 
                    // 'datagrafik' => $datagrafik, 
                    // ); 

                    $data['data']= $this->dashboard_model->get_chart_data();
                    $data['line']= $this->dashboard_model->get_chart_dataLine();
                    $data['pie']= $this->dashboard_model->get_chart_dataPie();
                    

                    $this->load->view('templates/header');
                    $this->load->view('dashboard/index', $data);
                    $this->load->view('templates/footer');

                    

                }
            }