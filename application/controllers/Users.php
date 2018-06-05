<?php
    class Users extends CI_Controller{
		function __construct(){
			parent::__construct();
			
		}
		public function register(){
			$data['tittle'] = 'Akun Baru';

			$this->form_validation->set_rules('id_user', 'id_user', 'required|callback_check_id_user_exist');
			$this->form_validation->set_rules('id_role', 'id_role', 'required');
			$this->form_validation->set_rules('nama', 'nama', 'required|callback_check_nama_exist');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('password2', 'Konfirmasi Pasword', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('users/register', $data);
			    
				
			} else {
				$enc_password = md5($this->input->post('password'));
				
				// Flassh Message
				$this->session->set_flashdata('user_registered', 'Anda Telah Berhasil Register');

				$this->users_model->register($enc_password);

				redirect('users/login');
			}
		}

		//cek kalo nama user udh ada atau belum
		function check_nama_exist($nama){
			$this->form_validation->set_message('check_nama_exist', 'Nama Sudah Ada. Coba Periksa Kembali');
			if($this->users_model->check_nama_exist($nama)){
				return true;
			} else {
				return false;
			}
		}

		//cek kalo nim udh ada atau belum
		function check_id_user_exist($id_user){
			$this->form_validation->set_message('check_id_user_exist', 'Nim Sudah Ada. Coba Periksa Kembali');
			if($this->users_model->check_id_user_exist($id_user)){
				return true;
			} else {
				return false;
			}
		}

        // Log in user
		public function login(){
			$data['title'] = 'Sign In';
			$this->form_validation->set_rules('id_user', 'Id_user', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('users/login', $data);
			} else {
				
				// Get username
				$id_user = $this->input->post('id_user');
				// Get and encrypt the password
				$password = $this->input->post('password');

				// Login user
				$result = $this->users_model->getresult($id_user, $password);
				// $orang = $this->users_model->namalogin($nama);

				if($result){
					// Create session
					$user_data = array(
						// session buat di controller
						'id_user' => $id_user,
						'id_role' => $result->row(0)->id_role,
						'nama' => $result->row(0)->nama,
						'logged_in' => true,
						// role buat di header
						'mahasiswa' => $mahasiswa,
						'unit' => $unit,
						'admin' => $admin,
					);
					
					$this->session->set_userdata($user_data);
					
					// Set message
					$this->session->set_flashdata('user_loggedin', 'Selamat Datang ' .  $result->row(0)->nama );
					
					redirect('home/homelogin');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('users/login');
				}		
			}
		}
        
        // Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('id_role');
		
			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			// $this->session->sess_destroy();
		
			redirect('users/login');
		}










    }