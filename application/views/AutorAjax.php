<script>
$("document").ready(function() {

    //Ejecutar eliminar el registro al hacer click en el boton Eliminar
    $(".borrarInstituto").click(function(e) {

      var r = confirm("Vas a eliminar un registro!\n¿Estás seguro?");

      if (r == false) {
   
        e.preventDefault();

      }else{


        var idInstituto = $(this).attr("value");

        $("." + idInstituto).remove();

        cadena = "<?php echo site_url('Autores/EliminarAutor'); ?>/" + idInstituto;

        $.ajax({
            url: cadena
        });

      }

    });

    //Ejecutar modificar el registro al hacer click en el boton Modificar
    $('.clasemodificar').click(function() {

        var iddiv = $(this).attr("value");

        var nombre = $("." + iddiv + " input[name='nombre']").val();

        var datos = "id=" + iddiv + "&nombre=" + nombre;

        var cadena = "<?php echo site_url("Autores/ModificarAutor/"); ?>";

        $.ajax({
            type: "POST",
            url: cadena,
            data: datos,
            success:function(data) {
              Swal.fire({
                type: 'success',
                title: 'Perfecto!',
                text: 'Modificación efectuada con éxito.'
              })
            }
        });

    });

});
</script>

<div class='container'>

<table id="Dtabla" class="table table-striped table-bordered ">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>

      <?php

      /*Recorremos los autores y si el tipo del usuario es 0(Administrador) enseñamos los botones de modificar y
       eliminar de todos los autores, si el tipo es es distinto solo enseñamos los botones desactivados*/

      for ($i = 0; $i < count($listaAutores); $i++) {
          $autor = $listaAutores[$i];

          echo "<div class='info'>
            <tr class='$autor->id'>
              <input hidden type='text' name='id' value='$autor->id'>
              <td style='width:60%'><p hidden>$autor->nombre</p><input type='text' name='nombre' value='$autor->nombre'></td>";
            if($this->session->userdata('tipoUsuario')==0){
              echo"<td><button class='btn btn-info clasemodificar' value='$autor->id' type='submit' name='action'>Modificar</button></td>";
              echo "<td><a value='$autor->id' class='btn btn-danger borrarInstituto'>Eliminar</a></td>";
            }else{
              echo"<td><button class='btn btn-info clasemodificar disabled' value='$autor->id' type='submit' name='action'>Modificar</button></td>";
              echo "<td><a value='$autor->id' class='btn btn-danger borrarInstituto disabled' >Eliminar</a></td>";
            }
          echo"
            </tr>
          </div>
        ";
      }
    ?>

    </tbody>
</table>
</div>
</div>


<div class="modal" id="insertModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php    echo form_open_multipart("Autores/InsertarAutor");?>
        
            <div class="form-group">
                <label for="nombre">Autor</label>
                <input type="text" id="nombre" name="nombre" placeholder="Autor">
                <small id="nameHelp" class="form-text text-muted">Comprueba que el autor no existe aún!</small>
            </div>

            <button  type="submit" value="Insertar" class="btn btn-primary">Insertar</button>

        </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

</div>









<!--Contenido de la ventana modal de insercion-->

<div id="insert" class="modal tamañoVModal">
    <?php    echo form_open_multipart("Autores/InsertarAutor");?>

    <h5 class="modal-close">&#10005;</h5>
    <div class="modal-content center">
        <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>

        <div class="input-field">
            <i class="material-icons prefix" style="color:royalblue">person</i>
            <input type="text" id="nombre" name="nombre">
            <label style="color:royalblue" for="nombre">Nombre</label>
        </div>

        <div><input style="background-color:royalblue" type="submit" value="Insertar" class="btn btn-large"></div>
        <br>
        <br>

        </form>
    </div>
</div>