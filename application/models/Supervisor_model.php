<?php

class Supervisor_model extends CI_Model {
    
    public function get_all(){
        $this->db->order_by('nombre', 'asc');
        $query = $this->db->get('supervisor');
        return $query->result();
    }
    
//    public function save_zona($nombre){
//        
//        $data = Array(
//            'nombre_zona' => $nombre
//        );
//        
//        $this->db->where('nombre_zona', $nombre);
//        $query = $this->db->get('zona');
//        
//        if ($query->num_rows() == 0){
//            return $this->db->insert('zona', $data);
//        }else{
//            return 'already exists';
//        }
//        
//    }
    
//    public function edit_zona($id, $nombre){
//        $data = Array(
//            'nombre_zona' => $nombre
//        );
//        $this->db->where('nombre_zona', $nombre);
//        $query = $this->db->get('zona');
//        
//        if ($query->num_rows() === 0){
//            $this->db->where('id_zona', $id);
//            return $this->db->update('zona', $data);
//        }else{
//            return 'already exists';
//        }
//    }
    
    public function eliminar($id){
        $this->db->where('id_supervisor', $id);
        $query = $this->db->delete('supervisor');
        return $query;
//        if ($query->num_rows() === 0){
//            return 'error';
//        }else{
//            return 'eliminado';
//        }
    }

}