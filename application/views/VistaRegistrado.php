     
<body  class="imgFondo" >

<nav id="barraSuperior"class=" navbar navbar-expand-md navbar-dark">
  <!-- Brand -->
  <a href="<?php echo base_url(); ?>" ><?php echo"<img id='logo' class='nav-link' src='".base_url("imgs/escudocv.png")."'></a>"; ?>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

       <li class="nav-item">
        <a class="nav-link enlacesDrop elementosNav" href="<?php echo base_url(); ?>">Inicio</a>
      </li>

      <li class="nav-item">
        <a class="nav-link enlacesDrop elementosNav" href="<?php echo base_url(); ?>index.php/Buscador/Categoria">Categorias</a>
      </li>

    </ul>
    <ul class="navbar-center">
      <li  class="nav-content buscadorCatBus">
        <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">
          <input id="buscador2" name="buscador" class="form-control mr-sm-2" type="search" placeholder="Titulo, autor, categoria..." aria-label="Search">
        </form>
      </li>
    </ul>


    <ul class="navbar-nav justify-content-end ml-auto">
     
      <li class="nav-item ">
        <a id="botonInicio" href="" class="nav-link enlacesDrop elementosNav"   data-toggle="modal" data-target="#modalInicio">Iniciar sesión</a>
      </li>

    </ul>
  </div> 
</nav>


    <div class="row">
    
    </div>

    <div class="modal fade tamañoModal" id="modalInicio">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header cabeceraModal">
              <h4 class="modal-title">Inicio de sesion</h4>
              <button type="button" class="close botonCerrar" data-dismiss="modal">×</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body ">
                <?php echo form_open("Administrador/ComprobarUsuario");?>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                    </div>

                    <div class="form-group">
                        <label >Contraseña</label>
                        <input type="password" type="text" name="password" class="form-control" placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                    <input type="submit" class="btn btn-dark">
                    </div>
                </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer pieModal" style="background-image: url('<?php echo base_url(); ?>imgs/utilidadesFront/recorteLibro.png')">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>


        </div>
      </div>
<!--fin ventana modal-->
     <div  class="container" >
     <div class='row'>
        <div  class='col-md-11 col-sm-11 col-xs-11 offset-1'>
          <form name='formularioBuscador' action='<?php echo base_url(); ?>index.php/Buscador/buscador' class='form-inline' method='post' accept-charset='utf-8'>
            <input id='buscador3' name='buscador' class='form-control mr-sm-2' type='search' placeholder='Titulo, autor, categoria...' aria-label='Search'>
          </form>
        </div>
      </div>
            <h3 id="mensajeRegistrado" >Usted ha sido registrado, ahora debe esperar a que un administrador conceda su solicitud.</h3>
    </div>
   
     


