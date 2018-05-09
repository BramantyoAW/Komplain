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
         $this->load->database();
         $jumlah_data = $this->unit_model->jumlah_data();
         $this->load->library('pagination');
         $config['base_url'] = base_url().'unit/index';
         $config['total_rows'] = $jumlah_data;
         $config['per_page'] = 10;
         $from= $this->uri->segment(3);

         $this->pagination->initialize($config);

         $data['halaman'] = $this->pagination->create_links();

         $data['unit'] = $this->unit_model->get_unit($config['per_page'],$id);
       // print_r($data['komplain']);
            
       //$data['title'] = "Daftar Komplain";
        
            $this->load->view('templates/header');
            $this->load->view('unit/index', $data);
            $this->load->view('templates/footer');
        }
       

        //untuk menampilkan detailkomplain
        public function edit($id_kom = NULL){
            if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

            $data['unit'] = $this->unit_model->get_unitkom($id_kom);
            //$data['kat_kom'] = $this->komplain_model->get_katkom(); - mau menampilkan nama kategori komplain
             
             if(empty($data['unit'])){
                 show_404();
             }
 
             $data['title'] = $data['unit']['judul'];
 
             $this->load->view('templates/header');
             $this->load->view('unit/edit', $data);
             $this->load->view('templates/footer');
             }
             
              //edit
        public function editstatus(){
            if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
            $this->unit_model->update($id_kom);

             //setting pesan
             $this->session->flashdata('status_edited','Komplain Berhasil Ditambah');
             
            redirect('unit');

        }
             
            
    }