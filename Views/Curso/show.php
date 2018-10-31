

<div class="container">
	<h2>Lista Cursos</h2>
	<form class="form-inline" action="?controller=Curso&action=search" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="form-control" id="idCurso" name="idCurso" type="text" placeholder="Busqueda por ID">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-search"> </span> Buscar</button>
			</div>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Título</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Horas</th>
					<th>Fecha Creada</th>
					<th>Foto</th>
					<th>Estado</th>
					
				</tr>
				<tbody>
					<?php foreach ($listaCurso as$Curso) {?>

					
					<tr>
						<td> <a href="?controller=Curso&&action=updateshow&&idCurso=<?php  echo $Curso->getIdCurso()?>"> <?php echo $Curso->getIdCurso(); ?></a> </td>
						<td><?php echo $Curso->getTitulo(); ?></td>
						<td><?php echo $Curso->getDescripcion(); ?></td>
						<td><?php echo $Curso->getPrecio(); ?></td>
						<td><?php echo $Curso->getHoras(); ?></td>
						<td><?php echo $Curso->getFechacreada(); ?></td>
						<td><?php echo '<img src="'.$Curso->getFoto().'"width="100" height="100">' ?></td>
									
						<td><?php if ( $Curso->getEstado()=='checked'):?>
							Activo
						<?php  else:?>
							Inactivo
						<?php endif; ?></td>
					<td><a href="?controller=Curso&&action=delete&&idCurso=<?php echo $Curso->getIdCurso() ?>">Eliminar</a> </td>	
			
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>
