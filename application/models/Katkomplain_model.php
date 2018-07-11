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
        //    return $query = $this->db->query("select u.nama from user u inner join kategori_unit ku on ku.id_user = u.id_user where ku.id_kat_kom ='$id_kat_kom'")->result();
           return $query = $this->db->query("select ku.id_kat_unit, u.nama from user u inner join kategori_unit ku on ku.id_user = u.id_user where ku.id_kat_kom ='$id_kat_kom'")->result();

        }

        // sinkronasi
        public function get_unitdetail($id_kat_unit){
            return $query = $this->db->query("select * from kategori_unit")->result();
                 
            // if($id_kat_unit === FALSE){
            //     $query = $this->db->get('kategori_unit');
            //     return $query->result_array();
            // }
            // $query = $this->db->get_where('kategori_unit',  array('id_kat_unit' => $id_kat_unit));
            // return $query->row_array();

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
        public function insertkatunit(){
            $data = array(
                'id_kat_unit' => $this->input->post('id_kat_unit'),
                'id_kat_kom' => $this->input->post('id_kat_kom'),
                'id_user' => $this->input->post('id_user')
            );
            return $this->db->insert('kategori_unit', $data);
            if($this->db->affected_rows() > 0){
                return true;
            } else {
                return false;
            }  
        }


        //edit kategori komplain kat_kom
        public function edit_katkomplain($id_kat_kom){
            $data = array(
                'nama_kat_kom' => $this->input->post('nama_kat_kom')
            );
            
            $this->db->where('id_kat_kom', $this->input->post('id_kat_kom'));
            return $this->db->update('kat_kom', $data);
                   
        }

        //hapus unit sinkronasi kategori_unit
        public function delet_unit($id_kat_unit){
            $this->db->where('id_kat_unit', $id_kat_unit);
            $this->db->delete('kategori_unit');
            return true;
            // $this->db->from("kategori_unit");
            // $this->db->join("kategori_unit ku", "ku.id_user = u.id_user");
            // $this->db->where("ku.id_kat_unit", $id_kat_unit);
            // $this->db->delete("kategori_unit");
            // return true;
            // return $query = $this->db->query("DELETE ku
            // FROM user u
            // INNER JOIN kategori_unit ku
            // ON ku.id_user = u.id_user
            // WHERE ku.id_kat_unit = '$id_kat_unit'")->result();
            
            // $this->db->delete('kategori_unit', array('id_kat_unit' => $id_kat_unit)); 
        }

        //select ku.id_kat_unit, u.nama from user u inner join kategori_unit ku on ku.id_user = 
        //u.id_user where ku.id_kat_kom ='$id_kat_kom'
        
        //DELETE FROM kategori_unit WHERE id_kat_unit='18';

        //hapus kat_kom
        public function hapus_katkomplain($id_kat_kom){
            $this->db->where('id_kat_kom', $id_kat_kom);
            $this->db->delete('kat_kom');
            return true;
        }
    }