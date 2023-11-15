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
        private $nombreImagen1;
        private $tipoImagen1;
        private $imagen2;
        private $nombreImagen2;
        private $tipoImagen2;
        private $imagen3;
        private $nombreImagen3;
        private $tipoImagen3;
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

        public function getNombreImagen1() {
            return $this->nombreImagen1;
        }
        public function setNombreImagen1($nombreImagen1) {
            $this->nombreImagen1= $nombreImagen1;
        }        

        public function getTipoImagen1() {
            return $this->tipoImagen1;
        }
        public function setTipoImagen1($tipoImagen1) {
            $this->tipoImagen1= $tipoImagen1;
        }        

        public function getImagen2() {
            return $this->imagen2;
        }
        public function setImagen2($imagen2) {
            $this->imagen2= $imagen2;
        }     
        
        public function getNombreImagen2() {
            return $this->nombreImagen2;
        }
        public function setNombreImagen2($nombreImagen2) {
            $this->nombreImagen2= $nombreImagen2;
        }        

        public function getTipoImagen2() {
            return $this->tipoImagen2;
        }
        public function setTipoImagen2($tipoImagen2) {
            $this->tipoImagen2= $tipoImagen2;
        }        


        public function getImagen3() {
            return $this->imagen3;
        }
        public function setImagen3($imagen3) {
            $this->imagen3= $imagen3;
        }        

        public function getNombreImagen3() {
            return $this->nombreImagen3;
        }
        public function setNombreImagen3($nombreImagen3) {
            $this->nombreImagen3= $nombreImagen3;
        }        

        public function getTipoImagen3() {
            return $this->tipoImagen3;
        }
        public function setTipoImagen3($tipoImagen3) {
            $this->tipoImagen3= $tipoImagen3;
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

        public function __construct($nombre,$descripcion,$categoria,$tipo,$precio,$existencias,$valoracion,$imagen1,$nombreImagen1,$tipoImagen1,$imagen2,$nombreImagen2,$tipoImagen2,$imagen3,$nombreImagen3,$tipoImagen3,$video,$usuario,$activo) {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->categoria = $categoria;
            $this->tipo = $tipo;
            $this->precio = $precio;
            $this->existencias = $existencias;
            $this->valoracion = $valoracion;
            $this->imagen1 = $imagen1;
            $this->nombreImagen1 = $nombreImagen1;
            $this->tipoImagen1 = $tipoImagen1;
            $this->imagen2 = $imagen2;
            $this->nombreImagen2 = $nombreImagen2;
            $this->tipoImagen2 = $tipoImagen2;
            $this->imagen3 = $imagen3;
            $this->nombreImagen3 = $nombreImagen3;
            $this->tipoImagen3 = $tipoImagen3;
            $this->video = $video;
            $this->usuario = $usuario;
            $this->activo = $activo;
        }

        static public function addProducto($mysqli, $nombre, $descripcion, $imagen1, $imagen2, $imagen3, $nombreImagen1, $tipoImagen1, $nombreImagen2, $tipoImagen2, $nombreImagen3, $tipoImagen3, $video, $categoria, $tipo, $precio, $existencias) {
            try {
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $id = 0;
                $usuario = $_SESSION['UsuID'];
                $valoracion = 0;
                $activo = 1;
                $opcion = "I";

                $statement->bind_param(
                    "iissbbbssssssbiididis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $nombreImagen1,
                    $tipoImagen1,
                    $nombreImagen2,
                    $tipoImagen2,
                    $nombreImagen3,
                    $tipoImagen3,    
                    $video,
                    $categoria,
                    $tipo,
                    $precio,
                    $existencias,
                    $valoracion,
                    $activo,
                    $opcion);
                $result = $statement->execute();
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function readProducto($mysqli, $opcion) {
            try {
                $id = 0;
                $usuario = 0;
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
                
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param(
                    "iissbbbssssssbiididis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
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
                        $producto['Imagen1'] = base64_encode($producto['Imagen1']);
                        $producto['Imagen2'] = base64_encode($producto['Imagen2']);
                        $producto['Imagen3'] = base64_encode($producto['Imagen3']);
                        $productos[] = $producto;
                    }
                    return $productos;
                }
            }
            catch (Exception $exc) {
                throw new Exception("Error en la consulta: " . $exc->getMessage());
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
                
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param(
                    "iissbbbssssssbiididis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
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

        static public function readProductoAdmin($mysqli) {
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
                $opcion = "SAP";
                
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param(
                    "iissbbbssssssbiididis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
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
        
        static public function updateProducto($mysqli, $id, $nombre, $descripcion, $imagen1, $imagen2, $imagen3, $nombreImagen1, $tipoImagen1, $nombreImagen2, $tipoImagen2, $nombreImagen3, $tipoImagen3, $video, $categoria, $tipo, $precio, $existencias) {
            try {
                if($nombreImagen1 == "" && $nombreImagen2 == "" && $nombreImagen3 == "" && $video == "")
                {
                    $opcion = "USIMG";
                }
                else{
                    $opcion = "U";
                }
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                //VALORACION TENGO QUE ENVIARLA
                $usuario = $_SESSION['UsuID'];
                $valoracion = 5;
                $activo = 1;

                $statement->bind_param(
                    "iissbbbssssssbiididis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $nombreImagen1,
                    $tipoImagen1,
                    $nombreImagen2,
                    $tipoImagen2,
                    $nombreImagen3,
                    $tipoImagen3,    
                    $video,
                    $categoria,
                    $tipo,
                    $precio,
                    $existencias,
                    $valoracion,
                    $activo,
                    $opcion);

                $statement->send_long_data(4, $blobImagenProducto1);
                $statement->send_long_data(5, $blobImagenProducto2);
                $statement->send_long_data(6, $blobImagenProducto3);
                $statement->send_long_data(13, $rutaCompleta);

                $result = $statement->execute();
                echo $result;
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function findProducto($mysqli, $id) {
            try {
                $usuario = 0;
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
                $opcion = "SID";
                
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param(
                    "iissbbbssssssbiididis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
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
                $row = $result->fetch_assoc();
                $row['Imagen1'] = base64_encode($row['Imagen1']);
                $row['Imagen2'] = base64_encode($row['Imagen2']);
                $row['Imagen3'] = base64_encode($row['Imagen3']);

                return $row;
            }
            catch (Exception $exc) {
                throw new Exception("Error en la consulta: " . $exc->getMessage());
            }
        }

        static public function deleteProducto($mysqli, $id) {
            try {
                $usuario = 0;
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
                $opcion = "D";
                
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param(
                    "iissbbbssssssbiididis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
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
                $row = $result->fetch_assoc();

                return $row;
            }
            catch (Exception $exc) {
                throw new Exception("Error en la consulta: " . $exc->getMessage());
            }
        }

        static public function activateProducto($mysqli, $id) {
            try {
                $usuario = 0;
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
                $opcion = "A";
                
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param(
                    "iissbbbssssssbiididis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
                    $imagen3,
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
                $row = $result->fetch_assoc();

                return $row;
            }
            catch (Exception $exc) {
                throw new Exception("Error en la consulta: " . $exc->getMessage());
            }
        }
    }

?>