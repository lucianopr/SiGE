<?php
class Usuario_model extends CI_Model{
//    private $db;   
//    public function __construct() { 
//        $this->db=Conectar::conexion();      
//    }
 
    

   public function validar_usuario($dni, $password) {
//        $sql  = "SELECT * FROM  usuario WHERE user = '$user' AND password = '$password' ";
//        $dato = mysql_fetch_array( mysql_query( $sql) );
//
//       if( $dato['userid'] > 0 )  {
//           return $dato['userid'];
//       } else {
//          return 0;
//       }
       $query = $this->db->query("SELECT * FROM  usuario WHERE dni = '$dni' AND password = '$password' ");
       if($query->result() != null){
       foreach ($query->result() as $row){
           return $row;           
       }
       }else{
           return null;
       }
   }
    
     
        
        
    public function get_usuario(){
        $consulta=$this->db->query("select * from usuario;");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }
//      public function validar_usuario($dni, $psw){
//        $consulta=$this->db->query("select * from usuario where dni = " + $dni + " and pasword = " + $psw + ";");
//        $dato = mysql_fetch_array( mysql_query( $consulta) );
//
//       if( $dato['id_usuario'] > 0 )  {
//           return $dato[];
//       } else {
//          return 0;
//       }
// 
//   }
}
?>

