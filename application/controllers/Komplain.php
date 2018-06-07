<?php
    class Komplain extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->helper(array('url'));
            $this->load->model('komplain_model');
        }

        //index user
        public function index($id_kom = NULL){
            if($this->session->userdata('id_role') != 3){
                redirect('users/login');
            }
        $this->load->library('pagination');
        $config['base_url'] = base_url().'komplain/index';
        $config['total_rows'] = $this->komplain_model->jumlah_data();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-link');
   
        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();

        $data['komplain'] = $this->komplain_model->get_komplain($config['per_page'],$id_kom);
        
        $this->load->view('templates/header');
        $this->load->view('komplain/index', $data);
        $this->load->view('templates/footer');
            
        }

        //Index Admin 
        public function indexadm($id_kom = NULL){
            if($this->session->userdata('id_role') != 1){
                redirect('users/login');
            }
            $this->load->library('pagination');
            $config['base_url'] = base_url().'komplain/indexadm';
            $config['total_rows'] = $this->komplain_model->jumlah_data();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'pagination-link');
   
            $this->pagination->initialize($config);
   
            $data['halaman'] = $this->pagination->create_links();
            //Dari controller di searachadm
            $data['message'] = '';
   
            $data['komplain'] = $this->komplain_model->get_komplain($config['per_page'],$id_kom);
           
            $this->load->view('templates/header');
            $this->load->view('komplain/indexadm', $data);
            $this->load->view('templates/footer');
   
               
           }

        //komplain saya
        public function komsay($id_kom = NULL){
            if($this->session->userdata('id_role') != 3){
                redirect('users/login');
            }
            $this->load->library('pagination');
            $config['base_url'] = base_url().'komplain/komsay';
            $config['total_rows'] = $this->komplain_model->jumlah_data();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'pagination-link');
   
            $this->pagination->initialize($config);
   
            $data['halaman'] = $this->pagination->create_links();
   
            $data['komplain'] = $this->komplain_model->get_komsay($config['per_page'],$id_kom);
        
            $this->load->view('templates/header');
            $this->load->view('komplain/komsay', $data);
            $this->load->view('templates/footer');
   
               
           }

        //Menambahkan Data komplain
        public function tambahkomplain(){
            if($this->session->userdata('id_role') != 3){
                redirect('users/login');
            }
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
					$gambar_komplain = 'noimage.gif';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$gambar_komplain = $_FILES['userfile']['name'];
                };


                $this->komplain_model->create_komplain($gambar_komplain);

                //setting pesan
                $this->session->flashdata('komplain_created','Komplain Berhasil Ditambah');

                redirect('komplain/index');
            } 
        }

        public function detailkomplain($id_kom = NULL){
            
           $data['komplain'] = $this->komplain_model->get_kom($id_kom);
           $data['detail_kom'] = $this->komplain_model->get_detailkom($id_kom);
           //$data['kat_kom'] = $this->komplain_model->get_katkom(); - mau menampilkan nama kategori komplain
            
            if(empty($data['komplain'])){
                show_404();
            }

            $data['title'] = $data['komplain']['judul'];

            $this->load->view('templates/header');
            $this->load->view('komplain/detailkomplain', $data);
            $this->load->view('templates/footer');
            }

        public function searchadm() {
            if($this->session->userdata('id_role') != 1){
                redirect('users/login');
            }
            $this->load->model('komplain_model');
            $id_kat_kom = $this->input->post('search');

            if(isset($id_kat_kom) and !empty($id_kat_kom)){
                $data['komplain'] = $this->komplain_model->searchadm($id_kat_kom);
                $data['halaman'] = '';
                $data['message'] = 'Klik tombol search kembali untuk merefresh data';
                $this->load->view('templates/header');
                $this->load->view('komplain/indexadm', $data);
                $this->load->view('templates/footer');
               
            }else{
                    redirect('komplain/indexadm');
            }


        }
    }