<?php
    class Katkomplain extends CI_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('id_role') != 1){
                redirect('users/login');
            }
            $this->load->helper(array('url'));
            $this->load->model('katkomplain_model');
        }

        
        public function index($id_kat_kom = NULL){
            $this->load->library('pagination');
            $config['base_url'] = base_url().'katkomplain/index';
            $config['total_rows'] = $this->katkomplain_model->jumlah_data();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'pagination-link');

            $this->pagination->initialize($config);

            $data['halaman'] = $this->pagination->create_links();
            $data['kat_kom'] = $this->katkomplain_model->get_katkomplain($config['per_page'],$id_kat_kom);

            $this->load->view('templates/header');
            $this->load->view('katkomplain/index', $data);
            $this->load->view('templates/footer');
            
        }

        //penambahan kategori komplain
        public function tambahkatkom(){
            $data['title'] = 'Tambah Kategori Komplain';

            $this->form_validation->set_rules('id_kat_kom', 'ID KATEGORI KOMPLAIN KOSONG','required');
            $this->form_validation->set_rules('nama_kat_kom', 'NAMA KATEGORI KOMPLAIN KOSONG', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('katkomplain/tambahkatkom', $data);
                $this->load->view('templates/footer');
     
            } else {
                $this->katkomplain_model->create_katkomplain();

                //setting pesan
                $this->session->flashdata('katkomplain_created','Komplain Berhasil Ditambah');

               redirect('katkomplain/index');
            }
        }

       

            //vieweditdetail
            public function detail($id_kat_kom = NULL){
                $data['katkomplain'] = $this->katkomplain_model->get_katkomplaindetail($id_kat_kom);
                $data['a'] = $this->katkomplain_model->get_kategoriunit($id_kat_kom);
                $data['namaunit'] = $this->katkomplain_model->get_katmodunit($id_kat_kom);
                // $data['ud'] = $this->katkomplain_model->get_unitdetail($id_kat_unit);
                // $data['unitdetail'] = $this->katkomplain_model->get_unitdetail($id_kat_unit);
                //$data['kat_kom'] = $this->komplain_model->get_katkom(); - mau menampilkan nama kategori komplain
                 
                 if(empty($data['katkomplain'])){
                     show_404();
                 }
     
                 $data['title'] = $data['katkomplain']['id_kat_kom'];
     
                 $this->load->view('templates/header');
                 $this->load->view('katkomplain/detail', $data);
                 $this->load->view('templates/footer');
                 }
                 
            //buat nambah kategori_unit
            public function addkatU(){
                //session
                if(!$this->session->userdata('logged_in')){
                    redirect('users/login');
                }
    
                // //insert
                 $this->katkomplain_model->insertkatunit();
                // $msg['success'] = False;
                // if($result){
                //     $msg['success'] = True;
                // } 
                
                // echo json_encode($msg);
                // die;
    
                echo json_encode(array("status" => TRUE));
            }        

            //edit
            public function balik(){
                // $this->katkomplain_model->edit_katkomplain($id_kat_kom);
                //setting pesan
                $this->session->flashdata('katkomplain_edited','Komplain Berhasil Ditambah');
                redirect('katkomplain/index');


                $this->load->view('templates/header');
                $this->load->view('katkomplain/index', $data);
                $this->load->view('templates/footer');
                }
            
            // hapus sinkronasi unit
            public function hapusU($id_kat_unit){
                $this->katkomplain_model->delet_unit($id_kat_unit);
                // echo("controller"+$id_kat_unit);
    
                //setting pesan
                // $this->session->flashdata('katkomplain_deleted','Komplain Berhasil Ditambah');
    
                // redirect('katkomplain/detail', $id_kat_kom);
                // echo json_encode(array("status" => TRUE));
                // $url = $_SERVER['REQUEST_URI'];  
  
                // header("Refresh: 5; URL=$url"); 
                redirect('katkomplain/index');
                }  
            
            // hapus kategori komplain
            public function hapus($id_kat_kom){
                $this->katkomplain_model->hapus_katkomplain($id_kat_kom);

                 //setting pesan
                //  $this->session->flashdata('katkomplain_deleted','Komplain Berhasil Ditambah');

                redirect('katkomplain/index');
                }
            
        }

    