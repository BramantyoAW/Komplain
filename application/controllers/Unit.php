<?php
    class Unit extends CI_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('logged_in') != true){
                redirect('users/login');
            }
            $this->load->helper(array('url'));
            $this->load->model('unit_model');
        }

        public function index($id = NULL){
         $this->load->library('pagination');
         $config['base_url'] = base_url().'unit/index';
         $config['total_rows'] = $this->unit_model->jumlah_data();
         $config['per_page'] = 10;
         $config['uri_segment'] = 3;
         $config['attributes'] = array('class' => 'pagination-link');
  

         $this->pagination->initialize($config);

         $data['halaman'] = $this->pagination->create_links();

         $data['unit'] = $this->unit_model->get_unit($config['per_page'],$id);
       // print_r($data['komplain']);
            
       //$data['title'] = "Daftar Komplain";
        
            $this->load->view('templates/header');
            $this->load->view('unit/index', $data);
            $this->load->view('templates/footer');
        }

        public function proseskom(){
            
            $data['detail_kom'] = $this->unit_model->get_detailkom($id_kom);
            


            $this->load->view('templates/header');
            $this->load->view('unit/proseskom');
            $this->load->view('templates/footer');
            
        }
       

        //untuk menampilkan detailkomplain
        public function edit($id_kom = NULL){
            if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

            $data['unit'] = $this->unit_model->get_unitkom($id_kom);
            $data['detail_kom'] = $this->unit_model->get_detailkom($id_kom);
             
             if(empty($data['unit'])){
                 show_404();
             }
 
             $data['title'] = $data['unit']['judul'];
 
             $this->load->view('templates/header');
             $this->load->view('unit/edit', $data);
             $this->load->view('templates/footer');
             }
             
              //edit mengubah nilai pada Edit
        public function editstatus(){
            //session
            if(!$this->session->userdata('logged_in')){
				redirect('users/login');
            }

            // //insert
             $this->unit_model->insert();
            // $msg['success'] = False;
            // if($result){
            //     $msg['success'] = True;
            // } 
            
            // echo json_encode($msg);
            // die;

            echo json_encode(array("status" => TRUE));
        }      


    }