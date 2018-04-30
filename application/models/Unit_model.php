<?php
class Unit_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_unit($number, $offset){


        $this->db->order_by('tanggal_kom');
        return $query = $this->db->get('komplain',$number,$offset)->result();
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

    //untuk update status komplain
   public function update($id_kom){

    $data = array(
        'status' => $this->input->post('status')
    );

    $this->db->where('id_kom', $this->input->post('id_kom'));
    return $this->db->update('komplain', $data);
       
   }
}