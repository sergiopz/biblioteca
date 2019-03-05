<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>

<script>
$("document").ready(function() {
    //Plugin de jquery para las tablas
    $('#Dtabla').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    //Ejecutar eliminar el registro al hacer click en el boton Eliminar
    $(".borrarInstituto").click(function() {

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
            data: datos
        });

    });

});
</script>


<a href="#insert" id="mover" class="flotante btn btn-large pulse #00e676 green accent-3 modal-trigger "><i
        class="material-icons" title="Insertar">add_box</i></a>

<table id="Dtabla" class="highlight responsive-table #536dfe indigo accent-2 ">
    <thead>
        <tr class="#536dfe indigo accent-2">
            <th class="#000000 black-text">Nombre</th>
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
              <td class='colorFila' style='width:60%'><p hidden>$autor->nombre</p><input class='#ffffff black-text' type='text' name='nombre' value='$autor->nombre'></td>";
            if($this->session->userdata('tipoUsuario')==0){
              echo"<td class='colorFila'><button class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 clasemodificar' value='$autor->id' type='submit' name='action'>Modificar<i class='material-icons right'>create</i></button></td>";
              echo "<td class='colorFila'><a value='$autor->id' class='btn-flat waves-effect waves-light #d32f2f  red darken-2 white-text borrarInstituto' >Eliminar<i class='material-icons right' title='Eliminar'>delete</i></a></td>";
            }else{
              echo"<td class='colorFila'><button class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 clasemodificar disabled' value='$autor->id' type='submit' name='action'>Modificar<i class='material-icons right'>create</i></button></td>";
              echo "<td class='colorFila'><a value='$autor->id' class='btn-flat waves-effect waves-light #d32f2f  red darken-2 white-text borrarInstituto disabled' >Eliminar<i class='material-icons right' title='Eliminar'>delete</i></a></td>";
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