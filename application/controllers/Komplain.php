<?php
    class Komplain extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->helper(array('url'));
            $this->load->model('komplain_model');
        }

        public function index($id_kom = NULL){

         $this->load->database();
         $jumlah_data = $this->komplain_model->jumlah_data();
         $this->load->library('pagination');
         $config['base_url'] = base_url().'komplain/index';
         $config['total_rows'] = $jumlah_data;
         $config['per_page'] = 10;
         $from= $this->uri->segment(3);

         $this->pagination->initialize($config);

         $data['halaman'] = $this->pagination->create_links();

         $data['komplain'] = $this->komplain_model->get_komplain($config['per_page'],$id_kom);
        // print_r($data['komplain']);
            
       //$data['title'] = "Daftar Komplain";
        
            $this->load->view('templates/header');
            $this->load->view('komplain/index', $data);
            $this->load->view('templates/footer');
        }

        //Menambahkan Data Controllers
        public function tambahkomplain(){
            $data['title'] = 'Tambah Komplain';

            //tambahan select
            $data['kat_kom'] = $this->komplain_model->get_katkom();

            $this->form_validation->set_rules('id_user', 'Id_user', 'required');
            $this->form_validation->set_rules('id_kat_kom', 'Id_Kat_Kom', 'required');
            //$this->form_validation->set_rules('tanggal_kom', 'Tanggal_Kom', 'required');
            $this->db->set('tanggal_kom','NOW()',FALSE);
            //$this->form_validation->set_rules('tanggal_kom','Tanggal_Kom','required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('lokasi', 'lokasi', 'required');
            $this->form_validation->set_rules('solusi', 'Solusi');
        

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('komplain/tambahkomplain', $data);
                $this->load->view('templates/footer');
            } else {
                //Upload Gambar

               
                $config['upload_path'] = './images/gambarbaruupload';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_widht'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$gambar_komplain = 'noimage.png';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$gambar_komplain = $_FILES['userfile']['name'];
                };


                $this->komplain_model->create_komplain($gambar_komplain);

                //setting pesan
                $this->session->flashdata('komplain_created','Komplain Berhasil Ditambah');
                

                redirect('komplain');
            } 
        }

        public function detailkomplain($id_kom = NULL){

           $data['komplain'] = $this->komplain_model->get_kom($id_kom);
           //$data['kat_kom'] = $this->komplain_model->get_katkom(); - mau menampilkan nama kategori komplain
            
            if(empty($data['komplain'])){
                show_404();
            }

            $data['title'] = $data['komplain']['judul'];

            $this->load->view('templates/header');
            $this->load->view('komplain/detailkomplain', $data);
            $this->load->view('templates/footer');
            }
    }