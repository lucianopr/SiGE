<?php

class Seccion_model extends CI_Model {
    
    public function get_all_seccion(){
        $query = $this->db->get('zona');
        return $query->result();
    }
    
    public function save_zona($nombre){
        
        $data = Array(
            'nombre_zona' => $nombre
        );
        
        $this->db->where('nombre_zona', $nombre);
        $query = $this->db->get('zona');
        
        if ($query->num_rows() == 0){
            return $this->db->insert('zona', $data);
        }else{
            return 'already exists';
        }
        
    }

}