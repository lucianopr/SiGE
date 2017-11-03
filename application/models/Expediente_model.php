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
        $op = $this->db->insert('expediente', $data);
        $id = $this->db->insert_id();
        $res = Array(
            'res' => $op,
            'id' => $id
        );
        return $res;
        
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
    public function nuevo_pase($p){
        $data = Array(
            'fecha' => $p['fecha'],
            'folio' => $p['folio'],
            'dependencia' => $p['asignacion'],
            'id_supervisor' => $p['supervisor'],
            'id_expediente' => $p['exp_id']
        );
        return $this->db->insert('pases', $data);
    }
    public function get_expediente($d){
//        array(6) { ["ex_buscar_supervisor"]=> string(4) "none" ["ex_buscar_seccion"]=> string(1) "1" ["num_expediente"]=> string(0) "" 
//        ["num_interno"]=> string(0) "" ["num_escuela"]=> string(0) "" ["buscar"]=> string(6) "Buscar" } 
        
//        $query = $this->db->query("YOUR QUERY");
//
//        foreach ($query->result() as $row)
//        {
//           echo $row->title;
//           echo $row->name;
//           echo $row->body;
//        }
        
        $this->db->order_by('id_expediente', 'desc');
        if ($d['ex_buscar_supervisor'] !== 'none'){
            $this->db->where('id_supervisor', $d['ex_buscar_supervisor']);
        }
        if ($d['ex_buscar_seccion'] !== 'none'){
            $this->db->where('seccion_circuito_zona', $d['ex_buscar_seccion']);
        }
        if ($d['num_expediente'] !== ''){
            $this->db->where('num_expediente', $d['num_expediente']);
        }
        if ($d['num_interno'] !== ''){
            $this->db->where('id_expediente', $d['num_interno']);
        }
        if ($d['num_escuela'] !== ''){
            $this->db->where('num_escuela', $d['num_escuela']);
        }
        $query = $this->db->get('expediente');
        return $query->result();
        
    }

}