
<?php
      
echo "<div class='formularioInsercion' style='display:inline'>
       <h1>Insertar un Libro</h1>";
   
echo form_open_multipart("Libros/InsertarLibro");


echo "
       <fieldset>
           
           Isbn : <input type='text' name='isbn'/><br/>
           Titulo : <input type='text' name='titulo'/><br/>
           Descripcion : <input type='text' name='descripcion'/><br/>
           Fecha : <input type='text' name='fecha'/><br/>
           Paginas : <input type='text' name='paginas'/><br/>
           idInstituto : <input type='text' name='idInstituto'/><br/>
           idUsuario : <input type='text' name='idUsuario'/><br/>
           idEditorial : <input type='text' name='idEditorial'/><br/>";
           
echo "
     <br/>
          </fieldset>";

echo"       
           <input  type='submit' name='Enviar' value='Insertar'/>
           </form>
   ";
       echo "<br></div>";

   echo "<a href='#' id='btnNuevoUsuario'>Nuevo</a>";
    
    echo " 
           <span>id</span>
           <span>nombre</span>          
            ";

     echo "<br>";   
     echo "<br>";   
       

       for ($i = 0; $i < count($listaLibros); $i++) {
           $libro = $listaLibros[$i];

           echo form_open("Libros/ModificarLibro");
           echo "
           <div class='info'>
              <input type='text' name='id' value='$libro->id'>
              <input type='text' name='isbn' value='$libro->isbn'>
              <input type='text' name='titulo' value='$libro->titulo'>
              <input type='text' name='descripcion' value='$libro->descripcion'>
              <input type='text' name='fecha' value='$libro->fecha'>
              <input type='text' name='paginas' value='$libro->paginas'>
                     <select name='idInstituto'>";
           for ($j = 0; $j < count($listaInstitutos); $j++) {
              $instituto = $listaInstitutos[$j]; 

                     if( $libro->idInstituto==$instituto->id ){ 
                            echo "<option  value='$instituto->id' selected >$instituto->nombre</option> ";                      
                     }else{
                            echo "<option  value='$instituto->id' >$instituto->nombre</option> ";
                     }
              }
          echo "     </select>";
          
       for ($j = 0; $j < count($listaAdministradores); $j++) {
              $administrador = $listaAdministradores[$j]; 

                     if( $libro->idUsuario==$administrador->id ){ 
                            echo "<input type='text'  value='$administrador->nombre' readonly>";
                            echo" <input type='hidden' name='idUsuario' value='$administrador->id' />";                      
                     }
              }

          echo"      <select name='idEditorial'>";  
          for ($j = 0; $j < count($listaEditoriales); $j++) {
              $editorial = $listaEditoriales[$j]; 

                     if( $libro->idEditorial==$editorial->id ){ 
                            echo "<option  value='$editorial->id' selected >$editorial->nombre</option> ";                      
                     }else{
                            echo "<option  value='$editorial->id' >$editorial->nombre</option> ";
                     }
              }
          echo"      </select>
              
              <input type='hidden' name='do' value='ModificarPeliculas' />
              <input type='Submit' name='Modificar' value='Modificar'/>
                
           " ;

             echo "<button><a href='".site_url('Libros/EliminarLibro/'.$libro->id)."'>Eliminar</a></button>
             </div>

             </form>
             ";
       } 

       echo "<div>
           
       <a href='".site_url("Libro/cerrar_sesion")."'>Cerrar sesión</a>

       </div>";