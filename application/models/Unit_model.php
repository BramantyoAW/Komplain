<?php
class Unit_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_unit($number, $offset){

        $id_user = $_SESSION['id_user'];
        $this->db->order_by('tanggal_kom');
        // return $query = $this->db->get('komplain',$number,$offset)->result();
        //By Session 
        return $query = $this->db->query('select distinct k.id_kom,k.id_user, k.id_kat_kom, k.tanggal_kom, k.deskripsi, k.gambar_komplain, k.solusi, k.status, k.judul, k.lokasi from komplain k, kategori_unit ku WHERE k.id_kat_kom IN( SELECT distinct ku.id_kat_kom FROM kategori_unit ku where ku.id_user ="'.$id_user.'")')->result();

    }

    function jumlah_data(){
        return $this->db->get('komplain')->num_rows();
    }

    //untuk melihatdetail komplain 
    public function get_unitkom($id_kom)
    {
        //return $query = $this->db->get('komplain', $id_kom)->result();
        if($id_kom === FALSE){
            $query = $this->db->get('komplain');
            return $query->result_array();
        }
        $query = $this->db->get_where('komplain',  array('id_kom' => $id_kom));
        return $query->row_array();

    }

    //untuk insert status komplain
   public function insert(){
    $data = array(
        'id_kom' => $this->input->post('id_kom'),
        'id_user' => $this->input->post('id_user'),
        'status' => $this->input->post('status'),
        'keterangan' => $this->input->post('keterangan')
    );
    return $this->db->insert('detail_kom', $data);
    if($this->db->affected_rows() > 0){
        return true;
    } else {
        return false;
    }  
   }

//    public function edit_komplain(){
//        $data = array(
//            'id_kom' => $this->input->post('id_kom'),
//            'status' => $this->input->post('status')
//        );
//        $this->db->where('komplain', $this->input->post('id'));
//        return $this->db->update('komplain', $data);
//    }

   //untuk melihat detail komplain yang sudah di ubah unit
   public function get_detailkom($id_kom){
    return $query = $this->db->query("select * from detail_kom where id_kom='$id_kom'")->result();
   }

   //mengubah dengan menginsert status komplain baru pada detail_kom
   public function edit_kom(){
       $data = array(
        //    'id_detail_kom' => $this->input->post('id_detail_kom'),
           'id_kom' => $this->input->post('id_kom'),
           'id_user' => $this->input->post('id_user'),
           'status' => $this->input->post('status'),
           'tgl_update' => $this->input->post('tgl_update'),
           'keterangan' => $this->input->post('keterangan')
       );

       return $this->db->insert('detail_kom', $data);
       if($this->db->affected_rows() > 0){
           return true;
       } else {
           return false;
       }
   }

}