<?php
    class  Dashboard_model extends CI_Model{

        public function get_chart_data(){
            $query = $this->db->get('komplain', $q1);
            $q1 = 'SELECT id_kat, count( id_kat), STATUS FROM komplain NATURAL JOIN kategori group BY id_kat, STATUS';
            // $this->db->select('id_kat, count( id_kat), status');
            // // $this->db->where('status');
            // $this->db->from('komplain natural join kategori');
            // $this->db->group_by('id_kat, status');
            // $query = $this->db->get();
            return $query;

            //$query="SELECT id_kat, count( id_kat), STATUS FROM komplain NATURAL JOIN kategori group BY id_kat, STATUS";
        }
    }


    //    $query = $this->db->get($this->db_mgmt);
    // $this->db->select('rating, COUNT(rating) AS Count');
    // $this->db->from('db_mgmt');
    // $this->db->where('status =', $status);
    // $this->db->group_by('rating'); 
    // $query = $this->db->get();
    // $results['chart'] = $query->result();