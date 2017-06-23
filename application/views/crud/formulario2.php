<!-- Modal -->
<div id="modModificar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">modificar usuario</h4>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
        <div id="m-id">
        	<label >id</label>
        	<input type="text" id="modId" class="form-control" readonly>
        </div>
        <div id="m-nombre">
        	<label >nombre</label>
        	<input type="text" id="modNombre" class="form-control"  required="true">
        </div>
        <div id="m-apellido">
        	<label >apellido</label>
        	<input type="text" id="modApellido" class="form-control" required="true" >
        </div>
        <div id="m-usurio">
        	<label >usuario</label>
        	<input type="text" id="modUsuario" class="form-control" required="true" >
        </div>
        <div id="m-contra">
        	<label >contraseña</label>
        	<input type="password" id="modContra" class="form-control"  required="true">
        </div>
      </form>
      <div class="modal-footer">
        <button name="btnModificar" type="submit" value="btnModificar" class="btn btn-info" id="btnModificar" >modificar</button>
        <button name="btnEliminar" value="btnEliminar" class="btn btn-warning" id="btnEliminar">elimianr</button>
      </div>
    </div>

  </div>
</div>
</div>

<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div id="frmTabla">

        <table class="table table-striped table-hover" id="tabla">
        <tr>
          <th>id</th>
          <th>nombre</th>
          <th>apellido</th>
          <th>usuario</th>
          <th>aciones</th>
        </tr>
      <?= form_close() ?>
    <!--llenado de la tabla con los datos de lal base-->
    <?php 
    //con el for recorro a todos los usuarios que se llamaron a la base de datos
    foreach ($arrUsuario ->result() as $usuario) {
       ?> 
    <?= form_open("#") ?>
    <?php 
    //la caja de de texto idPrco esta oculta y contiene el valor del id   
    echo"<tr>
  <td>".$usuario->id."<input type='text' name='idProc' hidden='true' value='".$usuario->id."'></td>
  <td>".$usuario->nombre."</td>
  <td>".$usuario->apellido."</td>
  <td>".$usuario->usuario."</td>
  <td><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modModificar' id='btnModal'onClick=\"selecPersona('$usuario->id','$usuario->nombre','$usuario->apellido','$usuario->usuario')\">accion</button></td>
  </tr>";//campo contraseña para ver que si esta enciptada sin entrar a la base
 ?> 
<?= form_close() ?>
<?php 
    }//cierre de foreach
 
     ?>
      </table>
      </div>
		</div>
		<div class="col-md-3"></div>
	</div> 

