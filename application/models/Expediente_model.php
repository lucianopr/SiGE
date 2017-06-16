<?php

class Expediente_model extends CI_Model {
    
    public function get_nro_transac(){
        $query = $this->db->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_NAME = 'expediente'");
        return $query->result();
    }

}