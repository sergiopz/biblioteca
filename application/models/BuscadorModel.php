<?php
    class BuscadorModel extends CI_Model {
        
        public function consulta($valor) {
           
           
          
            $r=$this->db->query("SELECT libros.id, libros.titulo FROM libros, instituto WHERE libros.idInstituto = instituto.id AND instituto.nombre like '%$valor%'

                                union

                                SELECT libros.id, libros.titulo FROM libros, editorial WHERE libros.idInstituto = editorial.id AND editorial.nombre like '%$valor%'

                                union

                                SELECT libros.id , libros.titulo FROM libros, librocategoria, categoria 
                                WHERE libros.id = libroCategoria.idLibro AND librocategoria.idCategoria = categoria.id AND categoria.nombre like '%$valor%'

                                union

                                SELECT libros.id , libros.titulo FROM libros, autoreslibros, autores
                                 WHERE libros.id = autoreslibros.idLibro AND autoreslibros.idAutor = autores.id AND autores.nombre 
                                 like '%$valor%'

                                union

                                SELECT id, titulo FROM libros where titulo like '%$valor%'"); 
                                            
            
       
           
            $busqueda=array();

            foreach($r->result()as $consulta){
            
                $busqueda[]=$consulta;

            } 


        return $busqueda;     
        }



        public function UltimosLibros() {
           
            
            $r = $this->db->query("SELECT id,titulo,descripcion FROM libros ORDER BY id DESC limit 6"); 
            
            $libros = array();
           foreach ($r -> result()as $li) {
            $libros[]=$li;
          
           }
            
            
            return $libros;
        }


            public function Categorias() {
           

            $r = $this->db->query("SELECT nombre ,id FROM categoria"); 
            
            $categoria = array();
           foreach ($r -> result()as $ca) {
            $categoria[]=$ca;
          
           }
            
            
            return $categoria;
        }
        public function Categorias2($id) {
           

            $r = $this->db->query("SELECT nombre FROM categoria where id='$id'"); 
            
            $categoria = array();
           foreach ($r -> result()as $ca) {
            $categoria[]=$ca;
          
           }
            
            
            return $categoria;
        }


            public function LibrosCategorias($LibrosCategorias) {
           
            
            $r = $this->db->query("SELECT libros.id , libros.titulo, libros.descripcion FROM libros, librocategoria, categoria WHERE libros.id = libroCategoria.idLibro AND librocategoria.idCategoria = categoria.id AND categoria.id = '$LibrosCategorias'"); 
            
            $listaBusqueda = array();
           foreach ($r -> result()as $ca) {
            $listaBusqueda[]=$ca;
          
           }
            
            
            return $listaBusqueda;
        }

         public function TituloVisor($id) {
           
            
            $r = $this->db->query("SELECT titulo,pdf from libros where id='$id'"); 

             $titulo = array();
           foreach ($r -> result()as $ti) {
            $titulo[]=$ti;
          
           }
            
           
            
            
            return $titulo;
        }
            
    }