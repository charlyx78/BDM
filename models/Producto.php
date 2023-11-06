<?php
    class Producto {
        private $id;
        private $nombre;
        private $descripcion;
        private $categoria;
        private $tipo;
        private $precio;
        private $existencias;
        private $valoracion;
        private $imagen1;
        private $imagen2;
        private $imagen3;
        private $video;
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

        public function getCategoria() {
            return $this->categoria;
        }
        public function setCategoria($categoria) {
            $this->categoria= $categoria;
        }        

        public function getTipo() {
            return $this->tipo;
        }
        public function setTipo($tipo) {
            $this->tipo= $tipo;
        }        

        public function getPrecio() {
            return $this->precio;
        }
        public function setPrecio($precio) {
            $this->precio= $precio;
        }        

        public function getExistencias() {
            return $this->existencias;
        }
        public function setExistencias($existencias) {
            $this->existencias= $existencias;
        }        

        public function getValoracion() {
            return $this->valoracion;
        }
        public function setValoracion($valoracion) {
            $this->valoracion= $valoracion;
        }        

        public function getImagen1() {
            return $this->imagen1;
        }
        public function setImagen1($imagen1) {
            $this->imagen1= $imagen1;
        }        

        public function getImagen2() {
            return $this->imagen2;
        }
        public function setImagen2($imagen2) {
            $this->imagen2= $imagen2;
        }        

        public function getImagen3() {
            return $this->imagen3;
        }
        public function setImagen3($imagen3) {
            $this->imagen3= $imagen3;
        }        

        public function getVideo() {
            return $this->video;
        }
        public function setVideo($video) {
            $this->video= $video;
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

        public function __construct($nombre,$descripcion,$categoria,$tipo,$precio,$existencias,$valoracion,$imagen1,$imagen2,$imagen3,$video,$usuario,$activo) {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->categoria = $categoria;
            $this->tipo = $tipo;
            $this->precio = $precio;
            $this->existencias = $existencias;
            $this->valoracion = $valoracion;
            $this->imagen1 = $imagen1;
            $this->imagen2 = $imagen2;
            $this->imagen3 = $imagen3;
            $this->video = $video;
            $this->usuario = $usuario;
            $this->activo = $activo;
        }

        //Crea una instancia de Categoria con los datos enviados al servidor (con el $json)
        static public function parseJson($json) {
            //Asignamos a la variable usuario el valor del UsuId de la sesion activa
            $usuario = $_SESSION['UsuID'];
            $activo = 2;

            $categoria =  new Categoria(
                isset($json["nombreProducto"]) ? $json["nombreProducto"] : "",
                isset($json["descripcionProducto"]) ? $json["descripcionProducto"] : "",
                isset($json["categoriaProducto"]) ? $json["categoriaProducto"] : "",
                isset($json["tipoProducto"]) ? $json["tipoProducto"] : "",
                isset($json["precioProducto"]) ? $json["precioProducto"] : "",
                isset($json["existenciasProducto"]) ? $json["existenciasProducto"] : "",
                isset($json["valoracionProducto"]) ? $json["valoracionProducto"] : "",
                isset($json["imagen1Producto"]) ? $json["imagen1Producto"] : "",
                isset($json["imagen2Producto"]) ? $json["imagen2Producto"] : "",
                isset($json["imagen3Producto"]) ? $json["imagen3Producto"] : "",
                isset($json["videoProducto"]) ? $json["videoProducto"] : "",
                $usuario,
                $activo
            );
            return $categoria;
        }

        static public function addProducto($mysqli, $nombre, $descripcion, $imagen1, $imagen2, $imagen3, $video, $categoria, $tipo, $precio, $existencias) {
            try {
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);
                $id = 0;
                $usuario = $_SESSION['UsuID'];
                $valoracion = 0;
                $activo = 1;
                $opcion = "I";

                $statement->bind_param(
                    "iissbbbbiididis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $video,
                    $categoria,
                    $tipo,
                    $precio,
                    $existencias,
                    $valoracion,
                    $activo,
                    $opcion);
                $result = $statement->execute();
                echo $result;
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function readProductoUsuario($mysqli) {
            try {
                $id = 0;
                $usuario = $_SESSION['UsuID'];
                $nombre = "";
                $precio = "";
                $descripcion = "";
                $imagen1 = '';
                $imagen2 = '';
                $imagen3 = '';
                $video = '';
                $categoria = 0;
                $tipoProducto = 0;
                $existencias = 0;
                $valoracion = 0;
                $activo = 0;
                $opcion = "SU";
                
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param(
                    "iissbbbbiididis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $video,
                    $categoria,
                    $tipoProducto,
                    $precio,
                    $existencias,
                    $valoracion,
                    $activo,
                    $opcion);
                $statement->execute();
                $result = $statement->get_result(); 

                $productos = array();

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $producto = $row;
                        $productos[] = $producto;
                    }
                    return $productos;
                }
            }
            catch (Exception $exc) {
                throw new Exception("Error en la consulta: " . $exc->getMessage());
            }
        }
    }

?>