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
    }
    
    public function nuevo($d){
        $data = Array(
            'nombre' => $d['nombre'],
            'id_zona' => $d['seccion'],
            'id_nivel' => $d['nivel'],
            'id_modalidad' => $d['modalidad'],
            'dni' => $d['documento'],
            'domicilio' => $d['domicilio'],
            'localidad' => $d['localidad'],
            'cod_postal' => $d['cp'],
            'tel' => $d['tel'],
            'id_sit_revista' => $d['situacion']
        );
        $this->db->where('dni', $d['documento']);
        $query = $this->db->get('supervisor');
        if ($query->num_rows() == 0){
            return $this->db->insert('supervisor', $data);
        }else{
            return 'already exists';
        }
    }
    
    public function get_modalidades(){
        $this->db->order_by('nombre', 'asc');
        $query = $this->db->get('modalidad');
        return $query->result();
    }
    
    public function get_sitprev(){
        $this->db->order_by('situacion', 'asc');
        $query = $this->db->get('situacion_revista');
        return $query->result();
    }
    
    public function get_niveles(){
        $this->db->order_by('nombre', 'asc');
        $query = $this->db->get('nivel_supervisor');
        return $query->result();
    }
    
    public function get_nivel($id){
        $this->db->where('id', $id);
        $query = $this->db->get('nivel_supervisor');
        return $query->result();
    }    
    public function nuevo_nivel($n){
        $data = Array(
            'nombre' => $n
        );
        $this->db->insert('nivel_supervisor', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function get_modalidad($id){
        $this->db->where('id', $id);
        $query = $this->db->get('modalidad');
        return $query->result();
    }    
    public function nueva_modalidad($n){
        $data = Array(
            'nombre' => $n
        );
        $this->db->insert('modalidad', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function get_seccion($id){
        $this->db->where('id_zona', $id);
        $query = $this->db->get('zona');
        return $query->result();
    }    
    public function nueva_seccion($n){
        $data = Array(
            'nombre' => $n
        );
        $this->db->insert('zona', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function get_situacion($id){
        $this->db->where('id', $id);
        $query = $this->db->get('situacion_revista');
        return $query->result();
    }
    public function nueva_situacion($n){
        $data = Array(
            'nombre' => $n
        );
        $this->db->insert('situacion_revista', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

}