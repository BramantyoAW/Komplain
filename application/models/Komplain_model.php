<?php
class Komplain_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    //penampilan komplain
    public function get_komplain($number, $offset){
    //    if($id === FALSE){
    //         $query = $this->db->get('komplain', $number, $offset);
    //         return $query->result_array();
    //    }

    //     $query = $this->db->get_where('komplain', array('id' => $id));
    //     return $query->row_array();
        
    //$query=$this->db->query('SELECT id_kat_kom, nama_kat_kom from kat_kom');

    $this->db->order_by('tanggal_kom', "DESC");
    return $query = $this->db->get('komplain',$number,$offset)->result();    
    }
    
    //percobaan select by login komsay
    public function get_komsay($number, $offset){
    $id_user = $_SESSION['id_user'];
    // $q = "SELECT * FROM KOMPLAIN WHERE id_user='$id_user' ORDER BY id_kom";
    return $query = $this->db->get("KOMPLAIN WHERE id_user='$id_user' ORDER BY id_kom",$number,$offset)->result();
    }

    //penghitungan tabel pagination
    function jumlah_data(){
        $this->db->order_by('tanggal_kom');
        return $this->db->get('komplain')->num_rows();
    }

    //untuk menampilkan di select tambah komplain
    public function get_katkom()
    {
        $this->db->order_by('id_kat_kom');
        $query = $this->db->get('kat_kom');
        return $query->result_array();
    }

    //select detail komplain
    public function get_detailkom($id_kom){
        return $query = $this->db->query("select * from detail_kom where id_kom='$id_kom'")->result();
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

    //Menambahkan data
    public function create_komplain($gambar_komplain)
    {
        //$slug = url_title($this->input->post('id'));
        
        $data = array(
            'id_kom' => $this->input->post('id_kom'),
            'id_user' => $this->input->post('id_user'),
            'id_kat_kom' => $this->input->post('id_kat_kom'),
            //'tanggal_kom' => $this->input->post('tanggal_kom'),
            //'tanggal_kom' => $this->default->post($date=date('Y-m-d H:i:s')),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status'),
            'judul' => $this->input->post('judul'),
            'lokasi' => $this->input->post('lokasi'),
            'solusi' => $this->input->post('solusi'),
            'gambar_komplain' => $gambar_komplain
        );

        return $this->db->insert('komplain', $data);
    }

    public function searchadm($id_kat_kom){
        $this->db->select('*');
        $this->db->from('komplain');
        $this->db->like('id_kat_kom', $id_kat_kom);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            //
            return $query->result();
        }
    }        
}