<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryInstitutos.js"></script>-->
<script>
  $("document").ready(function(){

$(".borrarInstituto").click(function() {

   var idInstituto=$(this).attr("value");

    $("."+idInstituto).remove();

    cadena = "<?php echo site_url('Categorias/EliminarCategoria'); ?>/"+idInstituto;

    $.ajax({
    url: cadena
     });


   });



});
</script>
        <table class="highlight responsive-table #536dfe indigo accent-2 ">
          <thead>
            <tr class="#536dfe indigo accent-2">
              <th class="#000000 black-text">Nombre</th>
              
              
              <th><a href="#insert" class="btn btn-large pulse #00e676 green accent-3 modal-trigger"><i class="material-icons" title="Insertar">add_box</i></a></th>
            </tr>
          </thead>
          <tbody>
            
            <?php
            for ($i = 0; $i < count($listaCategorias); $i++) {
              $categoria = $listaCategorias[$i];

              echo form_open("Categorias/ModificarCategoria");
              echo "<div class='info'>
                <tr class='$categoria->id'>
                      <input hidden class='#ffffff white-text' type='text' name='id' value='$categoria->id'>
                      <td><input class='#ffffff white-text' type='text' name='nombre' value='$categoria->nombre'></td>
                      <td><input  type='Submit' name='Modificar' value='Modificar'/></td>" ;

              echo "<td><a value='$categoria->id' class='btn btn-floating #d32f2f red darken-2 borrarInstituto' ><i class='material-icons' title='Eliminar'>delete</i></a><td>
                  </div>
                  </form>
                  </tr>
                ";
              }
        ?>
            <script>
              $("document").ready(function(){
                $("#prueba").click(function(){
                  var datos=$("#pf").serialize();
                  alert(datos);
                });
              });

              </script>
       <!-- 
            <tr class="">
              <td><input type="text" name="nombre"></td>
              <td><input type="text" name="localidad"></td>
              <td><input type="text" name="direccion"></td>
              <td><input type="text" name="cp"></td>
              <td><input type="text" name="provincia"></td>
              <td><a class="btn btn-floating #d32f2f red darken-2 botonD"><i class="material-icons" title="Eliminar">delete</i></a></td>
              <td><a class="btn btn-floating #e65100 orange darken-4"><i class="material-icons" title="Modificar">create</i></a></li></td>
            </tr>-->
           
          </tbody>
        </table>

      </div>

    </div>

        <!--Contenido de la ventana modal de insercion-->


        <div id="insert" class="modal" style="overflow-y: scroll">
         <?php    echo form_open_multipart("Categorias/InsertarCategoria");?>
        
          <h5 class="modal-close">&#10005;</h5>
          <div class="modal-content center">

              <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">person</i>
                <input type="text" id="nombre" name="nombre">
                <label for="nombre" style="color:royalblue">Nombre</label>
              </div>

              <div><input style="background-color:royalblue" type="submit" value="Insertar" class="btn btn-large"></div>
              <br>
              <br>

            </form>
          </div>
        </div>



<?php

/*
  
<?php
      
      echo "<div class='formularioInsercion' id='oculto' style='display:none'>
            <h1>Insertar un Usuarios</h1>";
        
        echo form_open_multipart("Categorias/InsertarCategoria");
         ?>

       <script>
          $(document).ready(function (){
                     $("#btnNuevoUsuario1").click(function() {
                            $('#oculto').toggle();
                            $('#oculto').text(texto) 
                     });

              });  
         
       </script>

<?php

       echo "<fieldset>
              nombre : <input type='text' name='nombre'/><br/>
       ";
       echo "<br/>
              </fieldset>
       ";

       echo"<input  type='submit' name='Enviar' value='Insertar'/>
              </form>
       ";

       echo "<br></div>
       ";

       echo "<a href='#' id='btnNuevoUsuario1'>Mostrar</a>
       ";
      
         
       echo "<span>id</span>
              <span>nombre</span>
       ";

       echo "<br>";   
       echo "<br>";   
            
       for ($i = 0; $i < count($listaCategorias); $i++) {
              $categoria = $listaCategorias[$i];

              echo form_open("Categorias/ModificarCategoria");
              echo "<div class='info'>
                     <input type='text' name='id' hidden value='$categoria->id'>
                     <input type='text' name='nombre' value='$categoria->nombre'>
                     <input type='Submit' name='Modificar' value='Modificar'/>
              " ;
    
              echo "<button><a href='".site_url('Categorias/EliminarCategoria/'.$categoria->id)."'>Eliminar</a></button>
                     </div>
                     </form>
              ";
       }
   
       echo "<div>
              <a href='".site_url("Usuarios/cerrar_sesion")."'>Cerrar sesión</a>
              </div>
       ";
              

*/