
<div class="container">
	<h2>Actualizar Curso</h2>
	<form action="?controller=Curso&&action=update" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="idCurso" value="<?php echo $curso->getIdCurso() ?>" >
		<div class="form-group">
			<label for="text">Título</label>
			<input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $curso->getTitulo() ?>" maxlength="50">
		</div>
		<div class="form-group">
			<label for="text">Descripción</label>
			<area type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo $curso->getDescripcion(); ?>" maxlength="200"/>
		</div>
		<div class="form-group">
			<label for="text">Precio</label>
			<input type="text" name="precio" id="precio" class="form-control" value="<?php echo $curso->getPrecio();?>" maxlength="7">
		</div>
		<div class="form-group">
			<label for="text">Horas</label>
			<input type="text" name="horas" id="horas" class="form-control numeric" value="<?php echo $curso->getHoras(); ?>" maxlength="2">
		</div>
		<div class="form-group">
			<label for="text">Fecha Creada</label>
			<input type="date" name="fechacreada" id="fechacreada" class="form-control" value="<?php echo $curso->getFechacreada(); ?>" readonly>
		</div>

		<div class="form-group">
			<label for="text">Imágen :</label>
			<input type="file" class="form-control-file" name="foto" id="foto" value="<?php echo $curso->getFoto() ?>" required="">
		</div>
  
		<div class="check-box">
			<label>Activo <input type="checkbox" name="estado" <?php echo $curso->getEstado() ?>></label>
		</div>
		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>
</div>
<script>
$(function() {

	

  $('.numeric').keypress(function(e){
  var code = e.keyCode || e.which;
  if(code < 48 || code > 57) { //Enter keycode
    e.preventDefault();
  }
  });

});


</script>