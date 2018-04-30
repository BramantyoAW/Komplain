<?php
    class Katkomplain_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        //penampilan data 
        public function get_katkomplain($number, $offset){
            $this->db->order_by('tanggal_kat');
            return $query = $this->db->get('kat_kom', $number, $offset)->result();
        }

        //penghitungan tabel
        function jumlah_data(){
            return $this->db->get('kat_kom')->num_rows();
        }

        public function create_katkomplain(){
            $data = array(
                'id_kat_kom' => $this->input->post('id_kat_kom'),
                'nama_kat_kom' => $this->input->post('nama_kat_kom')
            );

            return $this->db->insert('kat_kom', $data);
        }
        //untuk melihat detail edit/hapus
        public function get_katkomplaindetail($id_kat_kom)
        {
            //return $query = $this->db->get('komplain', $id_kom)->result();
            if($id_kat_kom === FALSE){
                $query = $this->db->get('kat_kom');
                return $query->result_array();
            }
            $query = $this->db->get_where('kat_kom',  array('id_kat_kom' => $id_kat_kom));
            return $query->row_array();
    
        }

        //edit kategori komplain
        public function edit_katkomplain($id_kat_kom){
            $data = array(
                'nama_kat_kom' => $this->input->post('nama_kat_kom')
            );
        
            $this->db->where('id_kat_kom', $this->input->post('id_kat_kom'));
            return $this->db->update('kat_kom', $data);
               
        }

        public function hapus_katkomplain($id_kat_kom){
            $this->db->where('id_kat_kom', $id_kat_kom);
            $this->db->delete('kat_kom');
            return true;
        }


    }