<?php 
    class Wishlist {
        private $id;
        private $nombre;
        private $descripcion;
        private $imagen;
        private $nombreImagen;
        private $tipoImagen;
        private $tipo;
        private $activo;
        private $usuario;

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

        public function getImagen() {
            return $this->imagen;
        }
        public function setImagen($imagen) {
            $this->imagen= $imagen;
        } 

        public function getNombreImagen() {
            return $this->nombreImagen;
        }
        public function setNombreImagen($nombreImagen) {
            $this->nombreImagen= $nombreImagen;
        } 

        public function getTipoImagen() {
            return $this->tipoImagen;
        }
        public function setTipoImagen($tipoImagen) {
            $this->tipoImagen= $tipoImagen;
        } 

        public function getTipo() {
            return $this->tipo;
        }
        public function setTipo($tipo) {
            $this->tipo= $tipo;
        } 

        public function getActivo() {
            return $this->activo;
        }
        public function setActivo($activo) {
            $this->activo= $activo;
        } 

        public function getUsuario() {
            return $this->usuario;
        }
        public function setUsuario($usuario) {
            $this->usuario= $usuario;
        } 

        public function __construct($nombre,$descripcion,$imagen,$tipo,$activo) {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->imagen = $imagen;
            $this->tipo = $tipo;
            $this->activo = $activo;
            $this->usuario = $usuario;
        }

        static public function addWishlist($mysqli, $nombre, $descripcion, $imagen, $nombreImagen, $tipoImagen, $tipo) {
            try {
                $sql = "CALL SP_GestionWishlist(?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $id = 0;
                $usuario = $_SESSION['UsuID'];
                $activo = 2;
                $producto = 0;
                $opcion = "I";

                $statement->bind_param(
                    "iissbsisiis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen,
                    $nombreImagen,
                    $tipo,
                    $tipoImagen,
                    $activo,
                    $producto,
                    $opcion);

                $statement->send_long_data(4, $imagen);

                $result = $statement->execute();

                if($result) {
                    echo 'Wishlit creada exitosamente';
                }
                else {
                    echo 'Error al crear wishlist';  
                }
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function addProductoWishlist($mysqli, $idLista, $idProducto) {
            try {
                $sql = "CALL SP_GestionWishlist(?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $usuario = 0;
                $nombre = '';
                $descripcion = '';
                $imagen = '';
                $nombreImagen = '';
                $tipo = 0;
                $tipoImagen = '';
                $activo = 2;
                $opcion = "IP";

                $statement->bind_param(
                    "iissbsisiis",
                    $idLista,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen,
                    $nombreImagen,
                    $tipo,
                    $tipoImagen,
                    $activo,
                    $idProducto,
                    $opcion
                );

                $statement->send_long_data(4, $imagen);

                $result = $statement->execute();

                if($result) {
                    echo 'Producto agregado a wishlist exitosamente';
                }
                else {
                    echo 'Error al agregar producto a wishlist';  
                }
            }
            catch (Exception $exc) {
                echo ($exc->getMessage());
            }
        }

        static public function readWishlist($mysqli, $usuario, $opcion) {
            try {
                $sql = "CALL SP_GestionWishlist(?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $id = 0;
                $nombre = '';
                $descripcion = '';
                $imagen = '';
                $nombreImagen = '';
                $tipoImagen = '';
                $tipo = '';
                $activo = 0;
                $producto = 0;

                $statement->bind_param(
                    "iissbsisiis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen,
                    $nombreImagen,
                    $tipo,
                    $tipoImagen,
                    $activo,
                    $producto,
                    $opcion);

                    $statement->execute();
                    $result = $statement->get_result(); 

                    $wishlists = array();

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $wishlist = $row;
                            $wishlist['Imagen'] = base64_encode($wishlist['Imagen']);
                            $wishlists[] = $wishlist;
                        }
                        return $wishlists;
                    }
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function readProductoWishlist($mysqli, $id) {
            try {
                $sql = "CALL SP_GestionWishlist(?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);
                $usuario = 0;
                $nombre = '';
                $descripcion = '';
                $imagen = '';
                $nombreImagen = '';
                $tipoImagen = '';
                $tipo = '';
                $activo = 0;
                $producto = 0;
                $opcion = "SP";

                $statement->bind_param(
                    "iissbsisiis",
                    $id,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen,
                    $nombreImagen,
                    $tipo,
                    $tipoImagen,
                    $activo,
                    $producto,
                    $opcion);

                    $statement->execute();
                    $result = $statement->get_result(); 

                    $wishlists = array();

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $wishlist = $row;
                            $wishlist['Imagen1'] = base64_encode($wishlist['Imagen1']);
                            $wishlists[] = $wishlist;
                        }
                        return $wishlists;
                    }
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function updateProductoWishlist($mysqli, $idLista, $nombre, $descripcion, $imagen, $nombreImagen, $tipo, $tipoImagen) {
            try {
                $sql = "CALL SP_GestionWishlist(?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $usuario = $_SESSION['UsuID'];
                $activo = 1;
                $idProducto = 0;
                $opcion = "U";

                $statement->bind_param(
                    "iissbsisiis",
                    $idLista,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen,
                    $nombreImagen,
                    $tipo,
                    $tipoImagen,
                    $activo,
                    $idProducto,
                    $opcion
                );

                $statement->send_long_data(4, $imagen);

                $result = $statement->execute();

                if($result) {
                    echo 'Producto eliminado a wishlist exitosamente';
                }
                else {
                    echo 'Error al eliminar producto a wishlist';  
                }
            }
            catch (Exception $exc) {
                echo ($exc->getMessage());
            }
        }

        static public function deleteWishlist($mysqli, $idLista) {
            try {
                $sql = "CALL SP_GestionWishlist(?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $usuario = 0;
                $nombre = '';
                $descripcion = '';
                $imagen = '';
                $nombreImagen = '';
                $tipo = 0;
                $tipoImagen = '';
                $activo = 1;
                $idProducto = 0;
                $opcion = "D";

                $statement->bind_param(
                    "iissbsisiis",
                    $idLista,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen,
                    $nombreImagen,
                    $tipo,
                    $tipoImagen,
                    $activo,
                    $idProducto,
                    $opcion
                );

                $statement->send_long_data(4, $imagen);

                $result = $statement->execute();

                if($result) {
                    echo 'Producto eliminado a wishlist exitosamente';
                }
                else {
                    echo 'Error al eliminar producto a wishlist';  
                }
            }
            catch (Exception $exc) {
                echo ($exc->getMessage());
            }
        }

        static public function deleteProductoWishlist($mysqli, $idLista) {
            try {
                $sql = "CALL SP_GestionWishlist(?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $usuario = 0;
                $nombre = '';
                $descripcion = '';
                $imagen = '';
                $nombreImagen = '';
                $tipo = 0;
                $tipoImagen = '';
                $activo = 1;
                $idProducto = 0;
                $opcion = "DP";

                $statement->bind_param(
                    "iissbsisiis",
                    $idLista,
                    $usuario,
                    $nombre,
                    $descripcion,
                    $imagen,
                    $nombreImagen,
                    $tipo,
                    $tipoImagen,
                    $activo,
                    $idProducto,
                    $opcion
                );

                $statement->send_long_data(4, $imagen);

                $result = $statement->execute();

                if($result) {
                    echo 'Producto eliminado de la wishlist exitosamente';
                }
                else {
                    echo 'Error al eliminar producto de la wishlist';  
                }
            }
            catch (Exception $exc) {
                echo ($exc->getMessage());
            }
        }
    }