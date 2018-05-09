<?php 
    class Home extends CI_Controller{
        function __construct(){
            parent::__construct();
            
    }

    public function index(){

        $data['title'] = 'Home Page';

        $this->load->view('templates/header');
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');

        $this->session->set_flashdata('user_loggedin');
    }

}