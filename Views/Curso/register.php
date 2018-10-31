<div class="container">
  <h2>Registro de Curso</h2>
  <form action="?controller=Curso&&action=save" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="text">Titulo:</label>
      <input type="text" class="form-control" id="titulo" placeholder="Ingrese su Titulo" name="titulo" required>
    </div>

    <div class="form-group">
      <label for="text">Descripción :</label>
      <input type="text" name="descripcion" id ="descripcion" class="form-control" placeholder="Ingrese su Descripción" required>
    </div>
    <div class="form-group">
      <label for="text">Precio :</label>
      <input type="text" name="precio" id="precio" class="form-control" placeholder="Ingrese su Precio" required>
    </div>
    <div class="form-group">
      <label for="text">Horas :</label>
      <input type="text" name="horas" id="horas" class="form-control numeric" placeholder="Ingrese su horas" required>
    </div>

    <div class="form-group">
    <label for="text">Imágen :</label>
    <input type="file" class="form-control-file"  name="foto" id="foto" required="">
   </div>
  
    <div class="check-box">
      <label>Activo <input type="checkbox" name="estado" id="estado" required>  </label>      
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>
<script>
$(function() {
  
  if($(".titulo").val()==''){
         event.preventDefault();
         alert('Tiene que llenar el Titulo del curso ');
       return false;
      }
  if($(".descripcion").val()==''){
         event.preventDefault();
         alert('Tiene que llenar la descripción ');
       return false;
      }

 if($("#precio").val()==''){
         event.preventDefault();
         alert('Tiene que llenar el precio ');
       return false;
      }

 if($("#horas").val()==''){
         event.preventDefault();
         alert('Tiene que llenar las horas ');
       return false;
      }
 if($("#foto").val()==''){
         event.preventDefault();
         alert('Tiene que agregar una imagen');
       return false;
      }
 if($("#estado").val()==''){
         event.preventDefault();
         alert('Seleccione el estado  ');
       return false;
      }

  $('.numeric').keypress(function(e){
  var code = e.keyCode || e.which;
  if(code < 48 || code > 57) { //Enter keycode
    e.preventDefault();
  }
  });

});


</script>