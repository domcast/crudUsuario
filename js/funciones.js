$(document).ready(function(){

	//Funciones Luis

	$("#btnAgregar").click(function(){		
	 	var nombre=$('#nombre').val();
	 	var usuario=$('#usuario').val();

	 	
	 	var apellido=$('#apellido').val();
	 	var contra=$('#contra').val();
	 	var btnAgregar=$('#btnAgregar').val();
	 	$.ajax({
	 		'method' : 'POST',
	 		'url' : 'formulario',
	 		'data' : {nombre:nombre,apellido:apellido,usuario:usuario,contra:contra,btnAgregar:btnAgregar}
	 	})
	 	.done(function(){
	 		alert("se agrego correctamente")
	 		$('#nombre').val("");
	 		$('#usuario').val("");
	 		$('#apellido').val("");
	 		$('#contra').val("");
	 	})
	 	})
selecPersona= function(id,nombre,apellido,usuario){
	$('#modId').val(id);
	$('#modNombre').val(nombre);
	$('#modApellido').val(apellido);
	$('#modUsuario').val(usuario);

}
$("#btnEliminar").click(function(e){
		e.preventDefault();		
	 	var id=$('#modId').val();
	 	var btnEliminar=$('#btnEliminar').val();
	 	$.ajax({
	 		'method' : 'POST',
	 		'url' : 'formulario',
	 		'data' : {id:id,btnEliminar:btnEliminar}
	 	})
	 	.done(function(respuesta){
	 		$('#modId').val("");
	 		$('#modNombre').val("");
	 		$('#modUsuario').val("");
	 		$('#modApellido').val("");
	 		$('#modContra').val("");
	 		alert("se elimino correctamente");
	 		$('#modModificar').modal('toggle');	 		
	 		$('#frmTabla').html('');
	 		$('#frmTabla').html(respuesta);
	 	})
	 	})
$("#btnModificar").click(function(e){
		e.preventDefault();
		var id=$('#modId').val();		
	 	var nombre=$('#modNombre').val();
	 	var usuario=$('#modUsuario').val();
	 	var apellido=$('#modApellido').val();
	 	var contra=$('#modUsuario').val();
	 	var btnModificar=$('#btnModificar').val();
	 	$.ajax({
	 		'method' : 'POST',
	 		'url' : 'formulario',
	 		'data' : {id:id,nombre:nombre,apellido:apellido,usuario:usuario,contra:contra,btnModificar:btnModificar}
	 	})
	 	.done(function(respuesta){
	 		$('#modId').val("");
	 		$('#modNombre').val("");
	 		$('#modUsuario').val("");
	 		$('#modApellido').val("");
	 		$('#modContra').val("");
	 		alert("se modifico correctamente");
	 		$('#modModificar').modal('toggle');
	 		$('#frmTabla').html('');
	 		$('#frmTabla').html(respuesta);
	 	})
	 	})
	 });
