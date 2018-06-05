<?php 
    class Home extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->helper(array('url'));
            $this->load->model('home_model');
    }

    public function index($id_kom = NULL){

        $data['title'] = 'Halaman Home';

        $this->load->library('pagination');
        $config['base_url'] = base_url().'home/index';
        $config['total_rows'] = $this->home_model->jumlah_data();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-link');
   
        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();

        $data['komplain'] = $this->home_model->get_komplain($config['per_page'],$id_kom);

        //menggunakan header khusus
        $this->load->view('templates/headerkhusus');
        $this->load->view('home/index', $data);
        $this->load->view('templates/footerkhusus');
    }

  
    //Detail komplain home
    public function detailkomplain($id_kom = NULL){
            
        $data['komplain'] = $this->home_model->get_kom($id_kom);
        $data['detail_kom'] = $this->home_model->get_detailkom($id_kom);
        //$data['kat_kom'] = $this->komplain_model->get_katkom(); - mau menampilkan nama kategori komplain
         
         if(empty($data['komplain'])){
             show_404();
         }

         $data['title'] = $data['komplain']['judul'];

         $this->load->view('templates/headerkhusus');
         $this->load->view('home/detailkomplain', $data);
         $this->load->view('templates/footerkhusus');
         }


    public function homelogin($id_kom = NULL){       
        if($this->session->userdata('id_role') == 1){
            redirect('dashboard');
        }
        
        if($this->session->userdata('id_role') == 2){
            redirect('unit/index');
        }
        
        $data['title'] = 'Halaman Home';
    
            $this->load->library('pagination');
            $config['base_url'] = base_url().'home/homelogin';
            $config['total_rows'] = $this->home_model->jumlah_data();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'pagination-link');
       
            $this->pagination->initialize($config);
    
            $data['halaman'] = $this->pagination->create_links();
    
            $data['komplain'] = $this->home_model->get_komplain($config['per_page'],$id_kom);
    
            $this->load->view('templates/header');
            $this->load->view('home/homelogin', $data);
            $this->load->view('templates/footer');
    
    $this->session->set_flashdata('user_loggedin');
    }

    //detailkomplain jika sudah login
    public function detailkomplainlogin($id_kom = NULL){
            
        $data['komplain'] = $this->home_model->get_kom($id_kom);
        $data['detail_kom'] = $this->home_model->get_detailkom($id_kom);
        //$data['kat_kom'] = $this->komplain_model->get_katkom(); - mau menampilkan nama kategori komplain
         
         if(empty($data['komplain'])){
             show_404();
         }

         $data['title'] = $data['komplain']['judul'];

         $this->load->view('templates/header');
         $this->load->view('home/detailkomplain', $data);
         $this->load->view('templates/footer');
         }


}