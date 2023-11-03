<?php 
    class Categoria {
        private $id;
        private $nombre;
        private $descripcion;
        private $usuario;
        private $activo;

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getNombre() {
            return $this->nombre;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }
        public function setDescripcion($descripcion) {
            $this->descripcion= $descripcion;
        }

        public function getUsuario() {
            return $this->usuario;
        }
        public function setUsuario($usuario) {
            $this->usuario= $usuario;
        }

        public function getActivo() {
            return $this->activo;
        }
        public function setActivo($activo) {
            $this->activo= $activo;
        }

        public function __construct($nombre,$descripcion,$usuario,$activo) {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->usuario = $usuario;
            $this->activo = $activo;
        }

        //Crea una instancia de Categoria con los datos enviados al servidor (con el $json)
        static public function parseJson($json) {
            //Asignamos a la variable usuario el valor del UsuId de la sesion activa
            $usuario = $_SESSION['UsuID'];
            $activo = 2;

            $categoria =  new Categoria(
                isset($json["nombreCategoria"]) ? $json["nombreCategoria"] : "",
                isset($json["descripcionCategoria"]) ? $json["descripcionCategoria"] : "",
                $usuario,
                $activo
            );
            return $categoria;
        }

        public function addCategoria($mysqli) {
            try {
                $sql = "CALL SP_GestionCategorias(?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);
                $id = 0;
                $opcion = "I";
                $statement->bind_param("issiis",$id,$this->nombre,$this->descripcion,$this->usuario,$this->activo,$opcion);
                $statement->execute();
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function readCategoria($mysqli) {
            try {
                $id = 0;
                $nombre = "";
                $descripcion = "";
                $usuario = 0;
                $activo = 2;
                $opcion = "S";
                
                $sql = "CALL SP_GestionCategorias(?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param("issiis",$id,$nombre,$descripcion,$usuario,$activo,$opcion);
                $statement->execute();
                $result = $statement->get_result(); 

                $categorias = array();

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $categoria = $row;
                        $categorias[] = $categoria;
                    }
                    return $categorias;
                }
            }
            catch (Exception $exc) {
                throw new Exception("Error en la consulta: " . $exc->getMessage());
            }
        }

        static public function findCategoria($mysqli, $id) {
            try {
                $nombre = "";
                $descripcion = "";
                $usuario = 0;
                $activo = 0;
                $opcion = "SID";
                
                $sql = "CALL SP_GestionCategorias(?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param("issiis",$id,$nombre,$descripcion,$usuario,$activo,$opcion);
                $statement->execute();
                $result = $statement->get_result(); 
                $row = $result->fetch_assoc();

                return $row;
            }
            catch (Exception $exc) {
                throw new Exception("Error en la consulta: " . $exc->getMessage());
            }
        }

        public function updateCategoria($mysqli, $id) {
            try {
                $sql = "CALL SP_GestionCategorias(?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);
                $activo = 2;
                $opcion = "U";
                $statement->bind_param("issiis",$id,$this->nombre,$this->descripcion,$this->usuario,$this->activo,$opcion);
                $statement->execute();
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function deleteCategoria($mysqli, $id) {
            try {
                $nombre = "";
                $descripcion = "";
                $usuario = 0;
                $activo = 0;
                $opcion = "D";
                
                $sql = "CALL SP_GestionCategorias(?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param("issiis",$id,$nombre,$descripcion,$usuario,$activo,$opcion);
                $statement->execute();
                $result = $statement->get_result(); 
                $row = $result->fetch_assoc();

                return $row;
            }
            catch (Exception $exc) {
                throw new Exception("Error en la consulta: " . $exc->getMessage());
            }
        }
        
    }
?>