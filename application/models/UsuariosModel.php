<?php
class UsuariosModel extends CI_Model{

// ------- COMPRUEBO EL LOGIN CON LOS PARAMETROS DEL CONTROLADOR -------------------- //
  
    

    public function ComprobarTipo0($nombre, $pass){
        $query = $this->db->query("SELECT id FROM usuarios WHERE nombre='$nombre' AND contrasena='$pass' and tipo='69'");

            
           
        return $query->num_rows();
    }
    public function ComprobarTipo1($nombre, $pass){
        $query = $this->db->query("SELECT id FROM usuarios WHERE nombre='$nombre' AND contrasena='$pass' and tipo='1'");

            
           
        return $query->num_rows();
    }

      public function ComprobarTipo2($nombre, $pass){
        $query = $this->db->query("SELECT id FROM usuarios WHERE nombre='$nombre' AND contrasena='$pass' and tipo='2'");

            
           
        return $query->num_rows();
    }
     
//Prueba de funcion que te devuelve un array con el id el nombre y el tipo de la persona que se conecto
    public function ComprobarTipo($nick,$contrasena){
       
        $r = $this->db->query(" SELECT id,nombre,tipo FROM usuarios WHERE nick='$nick' OR correo='$nick' AND contrasena='$contrasena' ");
        
    
        return $r->result_array();  
    }
//Funcion que devuelve si un usuario existe en la tabla de datos
    public function ComprobarUsuario($nick,$contrasena){
        $query = $this->db->query(" SELECT id FROM usuarios WHERE nick='$nick' OR correo='$nick' AND contrasena='$contrasena' ");
        return $query->num_rows();
    }
    //Funcion que te devuelve el tipo del usuario que se logueo
    public function tipo($nick,$contrasena){
        $r = $this->db->query("SELECT tipo FROM usuarios WHERE nick='$nick' OR correo='$nick' AND contrasena='$contrasena' ");
        $a= $r->result_array();
        return $a[0]['tipo'];
    }

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
                
                $r = $this->db->query("select max(id) as id from usuarios");
                $row =$r->result()[0];
                $idM=$row->id+1;
                $this->db->query("INSERT INTO usuarios(id,nombre,apellidos,nick,contrasena,correo,telefono,tipo,idInstituto ,codigoConfirmacion)
                VALUES ('$idM','$nombre','$apellidos','$nick','$contrasena','$correo','$telefono', '$tipo','$idInstituto','$codigoConfirmacion')");
                return $this->db->affected_rows();
            
        }
              function BorrarUsuarios($id) {
                $this->db->query("DELETE FROM usuarios where id='$id'");
                return $this->db->affected_rows();
            }

             function ModificarUsuarios($id,$nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion) {
                $this->db->query("UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', nick='$nick', contrasena='$contrasena',correo='$correo', telefono='$telefono', tipo='$tipo', idInstituto='$idInstituto' , codigoConfirmacion='$codigoConfirmacion'  WHERE id='$id' ");
                return $this->db->affected_rows();
            }

            

                   

    



}
