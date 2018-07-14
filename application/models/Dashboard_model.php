<?php
    class  Dashboard_model extends CI_Model{

        //barchart
        public function get_chart_data(){
        //Query untuk melihat keseluruhan status dari komplain
        //return $query = $this->db->query("SELECT id_kat_kom, count(id_kat_kom), STATUS FROM komplain NATURAL JOIN kategori group BY id_kat, STATUS")->result();
        
        //Query menampilkan id kategori
        //return $query = $this->db->query("SELECT id_kat_kom,COUNT(id_kat_kom) AS STATUS FROM komplain GROUP BY id_kat_kom")->result();
         
        //Query Menampilkan nama Kategori Komplain
        return $query = $this->db->query("Select nama_kat_kom, count(id_kat_kom) AS STATUS FROM komplain Natural join kat_kom group by id_kat_kom")->result();
          
        //Query ga bisa di panggil di view
        //return $query = $this->db->query("Select nama_kat_kom, count(id_kat_kom) from komplain k Natural join kat_kom group by id_kat_kom")->result();
        }

        public function get_chart_dataLine(){
        return $query = $this->db->query("Select distinct DATE_FORMAT(tanggal_kom, '%e %b %y') tanggal, count(date(tanggal_kom)) jumlah from komplain where DATE(tanggal_kom ) > DATE_SUB( CURDATE( ) , INTERVAL 1 WEEK ) GROUP BY DATE(tanggal_kom)")->result();
 
        }

        public function get_chart_dataPie(){
        return $query = $this->db->query("Select status, COUNT(status) jumlah from komplain GROUP by status")->result();
 
        }
    }

