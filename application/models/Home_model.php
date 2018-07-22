<?php
class Home_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    //melihat data komplain dengan pagination
    public function get_komplain($number, $offset){
        $this->db->order_by('tanggal_kom' , "DESC");
        return $query = $this->db->get('komplain',$number,$offset)->result();   
        
        // return $query = $this->db->query("select k.id_kom, k.id_user, k.id_kat_kom, k.tanggal_kom, k.tanggal_ubah, k.deskripsi, k.gambar_komplain, k.solusi, k.status, k.judul, k.lokasi, d.tgl_update from komplain k inner join detail_kom d on k.id_kom = d.id_kom order by tanggal_kom desc",$number,$offset)->result();
        }

    // public function get_tglupdate($id_kom){
    //     return $query = $this->db->query("'select tgl_update from detail_kom where id_kom ='$id_kom'")->result();
    // }
        
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