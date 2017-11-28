<?php

class Seccion_model extends CI_Model {
    
    public function get_all_seccion(){
        $this->db->order_by('nombre_zona', 'asc');
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
    
    public function edit_zona($id, $nombre){
        $data = Array(
            'nombre_zona' => $nombre
        );
        $this->db->where('nombre_zona', $nombre);
        $query = $this->db->get('zona');
        
        if ($query->num_rows() === 0){
            $this->db->where('id_zona', $id);
            return $this->db->update('zona', $data);
        }else{
            return 'already exists';
        }
    }
    
    public function eliminar_zona($id){
        $this->db->where('id_zona', $id);
        $query = $this->db->delete('zona');
        return $query;
//        if ($query->num_rows() === 0){
//            return 'error';
//        }else{
//            return 'eliminado';
//        }
    }

}