<?php
class Home_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    //melihat data komplain dengan pagination
    public function get_komplain($number, $offset){
        $this->db->order_by('tanggal_kom');
        return $query = $this->db->get('komplain',$number,$offset)->result();    
        }

        
    //penghitungan tabel pagination
    function jumlah_data(){
        return $this->db->get('komplain')->num_rows();
    }


     //untuk melihat detail komplain pada daftar mahasiswa 
     public function get_kom($id_kom)
     {
         //return $query = $this->db->get('komplain', $id_kom)->result();
         if($id_kom === FALSE){
             $query = $this->db->get('komplain');
             return $query->result_array();
         }
         $query = $this->db->get_where('komplain',  array('id_kom' => $id_kom));
         return $query->row_array();
 
     }

     //untuk select panel detail komplain
     public function get_detailkom($id_kom){
        return $query = $this->db->query("select * from detail_kom where id_kom='$id_kom'")->result();
       }
}