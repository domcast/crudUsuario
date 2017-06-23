<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<table class="table table-striped table-hover">
				<tr class="success">
					<th>id</th>
					<th>nombre</th>
					<th>apellido</th>
					<th>usuario</th>
				</tr>
			<?php 
		//con el for recorro a todos los usuarios que se llamaron a la base de datos
			foreach ($arrUsuario ->result() as $usuario) {	
				echo"<tr>
				<td>".$usuario->id."</td>
				<td>".$usuario->nombre."</td>
				<td>".$usuario->apellido."</td>
				<td>".$usuario->usuario."</td>
				</tr>";
			}

		 	?>
			</table>
		</div>
		<div class="col-md-3"></div>
	</div>
