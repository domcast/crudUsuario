<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuario_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function agregar($nombre,$apellido,$usuario,$contra){
		$this->db->query("INSERT INTO usuario (nombre,apellido,usuario,contra) VALUES('$nombre','$apellido','$usuario','$contra')");
	}
	   function obtener_usuarios(){
      $query=$this->db->query("SELECT * FROM usuario WHERE activo=1 ");
	 
        return $query;
    }
     function eliminar($id){
        $this->db->query("UPDATE usuario SET activo=0 WHERE id=$id");
    }
 function modificar($id,$nombre, $apellido, $usuario, $contra){
        $this->db->query("UPDATE usuario SET nombre='$nombre', apellido='$apellido',usuario='$usuario',contra='$contra' WHERE id=$id");
    }
}
?>