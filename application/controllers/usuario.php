<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->helpers("form");
		$this->load->helpers("url");
		$this->load->model("usuario_model");
	}

	public function index(){
		$data['arrUsuario']=$this->usuario_model->obtener_usuarios();
		$this->load->view("crud/headers");
		$this->load->view("crud/navbar.php");
		$this->load->view("crud/tabla.php",$data);
		$this->load->view("crud/footer");
	}
	public function agregar(){
		$this->load->view("crud/headers");
		$this->load->view("crud/navbar.php");
		$this->load->view("crud/formulario1.php");
		$this->load->view("crud/footer");
	}
	public function modificar(){
		$data['arrUsuario']=$this->usuario_model->obtener_usuarios();
		$this->load->view("crud/headers");
		$this->load->view("crud/navbar");
		$this->load->view("crud/formulario2",$data);
		$this->load->view("crud/footer");
	}
	 function formulario(){
	 	if($this->input->post("btnAgregar")){
	 		$nombre=$this->input->post("nombre");
	 		$apellido=$this->input->post("apellido");
	 		$usuario=$this->input->post("usuario");	 		
	 		$contraE=md5($this->input->post("contra"));
	 		$this->usuario_model->agregar($nombre,$apellido,$usuario,$contraE);
	 	}elseif ($this->input->post('btnEliminar'))// si existe el envio de boton eliminar
		 {
		 	$data['arrUsuario']=$this->usuario_model->obtener_usuarios();
			$id=$this->input->post('id');//recibo el valor de la caja oculta de tabla1
			$this->usuario_model->eliminar($id);
			$respuesta=$this->load->view("crud/tabla2.php",$data);
			
		}elseif ($this->input->post('btnModificar'))// si existe el envio de boton modificar1
		 {
			$id = $this->input->post('id');
			$nombre = $this->input->post('nombre');
        	$apellido = $this->input->post('apellido');
        	$usuario = $this->input->post('usuario');
        	$contra = $this->input->post('contra'); 
        	$contraE=md5($contra);
        	$this->usuario_model->modificar($id,$nombre, $apellido, $usuario, $contraE);
        	
			
		}
		$respuesta=$this->respuesta();	
			return $respuesta;			
	 }


function respuesta(){
	$data=$this->usuario_model->obtener_usuarios();
	echo "<table class='table table-striped table-hover'>
	<tr>
          <th>id</th>
          <th>nombre</th>
          <th>apellido</th>
          <th>usuario</th>
          <th>aciones</th>
        </tr>";
    foreach ($data ->result() as $usuario) {
    	echo"<tr>
  <td>".$usuario->id."<input type='text' name='idProc' hidden='true' value='".$usuario->id."'></td>
  <td>".$usuario->nombre."</td>
  <td>".$usuario->apellido."</td>
  <td>".$usuario->usuario."</td>
  <td><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modModificar' id='btnModal'onClick=\"selecPersona('$usuario->id','$usuario->nombre','$usuario->apellido','$usuario->usuario')\">accion</button></td>
  </tr>";
    }
    echo "</table>";
}


}
?>