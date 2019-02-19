<?php

    /*include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Peliculas extends Seguridad{*/
        include_once("Seguridad.php");

    class Institutos extends Seguridad  {

        public function __construct() {
            parent::__construct();
            $this->load->model("InstitutosModel");
        }

        
        public function VistaAjax() {
                if($this->security_check()){
            $this->load->model("InstitutosModel");
            $data["listaInstitutos"] = $this->InstitutosModel->getAll();
            $this->load->view("institutosAjax.php", $data);
            
        }
    }

        public function InsertarInstituto(){
                if($this->security_check()){

            $nombre = $this->input->get_post("nombre");
            $localidad = $this->input->get_post("localidad");
            $direccion = $this->input->get_post("direccion");
            $cp = $this->input->get_post("cp");
            $provincia = $this->input->get_post("provincia");
            
            $resultado = $this->InstitutosModel->InsertarInstituto($nombre, $localidad, $direccion, $cp, $provincia);
            if ($resultado == 0) {
                    $data["mensaje"] = "Error al insertar el instituto en la base de datos";   
            } else {
               $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "institutos";   // La tabla que queremos que se muestre automáticamente en la vista principal
                           $this->load->view("plantilla", $data);
            }
        }
        } 
    
        public function EliminarInstituto($id){
                if($this->security_check()){

            $resultado = $this->InstitutosModel->EliminarInstituto($id);
    
            if ($resultado) {
                $this->load->model("InstitutosModel");
                $data["listaInstitutos"] = $this->InstitutosModel->getAll();
                $this->load->view("header",$data);
            } else {
                echo "No se pudo eliminar el instituto.";
                $this->load->view("header");
            }
    
        }
    }

        public function ModificarInstituto(){
                if($this->security_check()){

            $id = $this->input->post('id');
            $nombre = $this->input->post("nombre");
            $localidad = $this->input->post("localidad");
            $direccion = $this->input->post("direccion");
            $cp = $this->input->post("cp");
            $provincia = $this->input->post("provincia");

            $resultado = $this->InstitutosModel->ModificarInstituto($id, $nombre, $localidad, $direccion, $cp, $provincia);

            if ($resultado==0) {
                $data['mensaje'] = "Instituto modificado con éxito";
                $this->load->model("InstitutosModel");
                $data["listaInstitutos"] = $this->InstitutosModel->getAll();
                $this->load->view("header",$data);
            } else {
                $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "institutos";   // La tabla que queremos que se muestre automáticamente en la vista principal
                           $this->load->view("plantilla", $data);
            }
  
        }
    }
}