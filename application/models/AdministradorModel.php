<?php
     //include_once('Seguridad.php');
    
    class AdministradorModel extends CI_Model{ 

       public function __construct() {
            parent::__construct();
            $this->load->library("session");
        }
         public function getAll() {
           
            
            $r = $this->db->query("SELECT * FROM usuarios"); 
            
            $usuarios = array();
           foreach ($r -> result()as $usu) {
           	$usuarios[]=$usu;
          
           }
            
            
            return $usuarios;
        }




             function InsertarUsuarios($nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion) {
                
                $this->db->query("INSERT INTO usuarios(nombre,apellidos,nick,contrasena,correo,telefono,tipo,idInstituto ,codigoConfirmacion)
                VALUES ('$nombre','$apellidos','$nick','$contrasena','$correo','$telefono', '$tipo','$idInstituto','$codigoConfirmacion')");
                return $this->db->affected_rows();
            
        }
              function BorrarUsuarios($id) {
                $this->db->query("DELETE FROM usuarios where id='$id'");
                return $this->db->affected_rows();
            }

             function ModificarUsuarios($id,$nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion) {
                $this->db->query("UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', nick='$nick', contrasena='$contrasena', telefono='$telefono', tipo='$tipo', idInstituto='$idInstituto' , codigoConfirmacion='$codigoConfirmacion'  WHERE id='$id' ");
                return $this->db->affected_rows();
            }

            

                   
           
     }
    

   