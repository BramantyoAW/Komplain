<?php
    class Users extends CI_Controller{

		public function register(){
			$data['tittle'] = 'New User';

			$this->form_validation->set_rules('id_user', 'id_user', 'required|callback_check_id_user_exist');
			$this->form_validation->set_rules('id_role', 'id_role', 'required');
			$this->form_validation->set_rules('nama', 'nama', 'required|callback_check_nama_exist');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('password2', 'Konfirmasi Pasword', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
			    $this->load->view('templates/footer');
				
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
			$this->form_validation->set_rules('id_user', 'id_user', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			if($this->form_validation->run() === FALSE){

				// $this->load->view('templates/header');
				$this->load->view('users/login', $data);
			    // $this->load->view('templates/footer');
		
			} else {
				
				// Get username
				$id_user = $this->input->post('id_user');
				// Get and encrypt the password
				// $password = md5($this->input->post('password')); seharusnya
				$password = $this->input->post('password');


				// Login user
				$user_id = $this->users_model->login($id_user, $password);

				if($user_id){
					//create session
					$user_data = array(
						'user_id' => $user_id,
						'id_user' => $id_user,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					//set pesan
					$this->session->set_flashdata('user_loggedin', 'selamat datang <?php echo $nama ?>');
					redirect('komplain');
				} else {
					// Set pesan
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
			$this->session->unset_userdata('username');
			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('users/login');
		}








    }