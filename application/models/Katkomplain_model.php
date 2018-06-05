<?php
    class Katkomplain_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        //penampilan data kat_kom
        public function get_katkomplain($number, $offset){
            $this->db->order_by('id_kat_kom');
            return $query = $this->db->get('kat_kom', $number, $offset)->result();
        }
        
        //penghitungan tabel kat_kom
        function jumlah_data(){
            return $this->db->get('kat_kom')->num_rows();
        }

          //create kat_kom
          public function create_katkomplain(){
            $data = array(
                'id_kat_kom' => $this->input->post('id_kat_kom'),
                'nama_kat_kom' => $this->input->post('nama_kat_kom')
            );

            return $this->db->insert('kat_kom', $data);
        }

        //untuk melihat detail edit/hapus kat_kom
        public function get_katkomplaindetail($id_kat_kom)
        {       
                
            if($id_kat_kom === FALSE){
                    $query = $this->db->get('kat_kom');
                    return $query->result_array();
                }
                $query = $this->db->get_where('kat_kom',  array('id_kat_kom' => $id_kat_kom));
                return $query->row_array();
    
          
            // $query = $this->db->query("select u.id_kat_kom, u.id_user, k.nama_kat_kom from kategori_unit u INNER JOIN kat_kom k ON u.id_kat_kom = k.id_kat_kom WHERE u.id_kat_kom='$id_kat_kom'");
            // return $query->row_array();
        }

        public function get_kategoriunit($id_kat_kom){
           return $query = $this->db->query("select u.nama from user u inner join kategori_unit ku on ku.id_user = u.id_user where ku.id_kat_kom ='$id_kat_kom'")->result();
            
        }

        //untuk melihat select pada modal detail
        public function get_katmodunit($id_kat_kom){
            $this->db->order_by('id_user');
            $query = $this->db->query("select * from user where id_role='2'");
            return $query->result_array();

            // $query = $this->db->query('select * from user where id_role = "2"');
            // return $query->result_array();
        }
        

        //menambah kategori_unit untuk di dedetail
        public function post_katunit(){
            $data = array(
                'id_kat_unit'=> $this->input->post('id_kat_unit'),
                'id_kat_kom' => $this->input->post('id_kat_kom'),
                'id_user' => $this->input->post('id_user')
            );
            return $this->db->insert('kategori_unit', $data);
        }

        //edit kategori komplain kat_kom
        public function edit_katkomplain($id_kat_kom){
            $data = array(
                'nama_kat_kom' => $this->input->post('nama_kat_kom')
            );
            
            $this->db->where('id_kat_kom', $this->input->post('id_kat_kom'));
            return $this->db->update('kat_kom', $data);
                   
        }

        //hapus kat_kom
        public function hapus_katkomplain($id_kat_kom){
            $this->db->where('id_kat_kom', $id_kat_kom);
            $this->db->delete('kat_kom');
            return true;
        }
    }