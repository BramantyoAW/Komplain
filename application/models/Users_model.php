<?php
    class Users_model extends CI_model{

		
		public function register($enc_password){
			//USER DATA ARRAY
			$data = array(
				'id_user' => $this->input->post('id_user'),
				'id_role' => $this->input->post('id_role'),
				'nama' => $this->input->post('nama'),
				// 'password' => $enc_password seharusnya
				'password' => $this->input->post('password')

			);

			return $this->db->insert('user', $data);
		}

		//cek nama jika sudah ada belum
		public function check_nama_exist($nama){
			$query = $this->db->get_where('user', array('nama' => $nama));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		
		// Check username exists
		public function check_username_exists($id_user){
			$query = $this->db->get_where('user', array('id' => $id_user));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

	

		//cek id user jika sudah ada belum
		public function check_id_user_exist($id_user){
			$query = $this->db->get_where('user', array('id_user' => $id_user));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		
		// // Log user in
		// public function login($id_user, $password){
		// 	// Validate
		// 	$this->db->where('id_user', $id_user);
		// 	$this->db->where('password', $password);
		// 	$result = $this->db->get('user');
		// 		if($result->num_rows() == 1){
		// 			return $result->row(0)->nama;
		// 		} else {
		// 			return false;
		// 		}
		// }

		//Log User In
		public function getresult($id_user, $password){
				// Validate
				$this->db->where('id_user', $id_user);
				$this->db->where('password', $password);
				$result = $this->db->get('user');
					if($result->num_rows() == 1){
						return $result;
					} else {
						return false;
					}
		}

    }