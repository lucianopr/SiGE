<?php

class Expediente_model extends CI_Model {
    
    public function get_all(){
        $this->db->order_by('id_expediente', 'desc');
        $query = $this->db->get('expediente');
        return $query->result();
    }
    
    public function nuevo($d){
        $data = Array(
            'num_expediente' => $d['nro_expediente'],
            'fecha_ingreso' => $d['fecha_ingreso'],
            'referencia' => $d['referencia'],
            'num_escuela' => $d['nro_escuela'],
            'seccion_circuito_zona' => $d['seccion'],
            'id_modalidad' => $d['modalidad'],
            'id_dependencia' => $d['dependencia'],
            'id_supervisor' => $d['supervisor'],
            'iniciador' => $d['iniciador']
        );
        return $this->db->insert('expediente', $data);
        
    }
    
    public function get_nro_transac(){
        $query = $this->db->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_NAME = 'expediente'");
        return $query->result();
    }
    
    public function get_dependencia($n){
        $this->db->where('nombre_dependencia', $n);
        $query = $this->db->get('dependencia');
        return $query->result();
    }
    public function nueva_dependencia($n){
        $data = Array(
            'nombre_dependencia' => $n
        );
        $this->db->insert('dependencia', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

}