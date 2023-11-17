<?php 
    class Carrito {
        private $id;
        private $usuario;
        private $producto;
        private $cantidad;
        private $precio;
        private $caducidad;
        private $activo;

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getUsuario() {
            return $this->usuario;
        }
        public function setUsuario($usuario) {
            $this->usuario= $usuario;
        }
        
        public function getProducto() {
            return $this->producto;
        }
        public function setProducto($producto) {
            $this->producto= $producto;
        }

        public function getCantidad() {
            return $this->cantidad;
        }
        public function setCantidad($cantidad) {
            $this->cantidad= $cantidad;
        }

        public function getPrecio() {
            return $this->precio;
        }
        public function setPrecio($precio) {
            $this->precio= $precio;
        }

        public function getCaducidad() {
            return $this->caducidad;
        }
        public function setCaducidad($caducidad) {
            $this->caducidad= $caducidad;
        }

        public function getActivo() {
            return $this->activo;
        }
        public function setActivo($activo) {
            $this->activo= $activo;
        } 

        public function __construct($usuario,$producto,$cantidad,$precio,$caducidad,$activo) {
            $this->usuario = $usuario;
            $this->producto = $producto;
            $this->cantidad = $cantidad;
            $this->precio = $precio;
            $this->caducidad = $caducidad;
            $this->activo = $activo;
        }

        static public function addCarrito($mysqli, $idProducto, $cantidad, $precio) {
            try {
            $sql = "CALL SP_GestionCarrito(?,?,?,?,?,?,?,?)";
            $statement = $mysqli->prepare($sql);

            $id = 0;
            $usuario = $_SESSION['UsuID'];
            $caducidad = "2025-9-11";
            $valoracion = 2;
            $activo = 2;
            $opcion = "I";

            $statement->bind_param(
                "iiiidsis",
                $idCarrito,
                $usuario,
                $idProducto,
                $cantidad,
                $precio,
                $caducidad,
                $activo,
                $opcion);

                $result = $statement->execute();

                if($result) {
                    echo 'Producto agregado a Carrito exitosamente';
                }
                else {
                    echo 'Error al agregar producto a Carrito';  
                }
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function readProductoCarrito($mysqli) {
            try {
                $sql = "CALL SP_GestionCarrito(?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $idCarrito = 0;
                $usuario = $_SESSION['UsuID'];
                $idProducto = 0;
                $cantidad = 0;
                $precio = 0;
                $caducidad = '';
                $activo = 2;
                $opcion = "SP";

                $statement->bind_param(
                    "iiiidsis",
                    $idCarrito,
                    $usuario,
                    $idProducto,
                    $cantidad,
                    $precio,
                    $caducidad,
                    $activo,
                    $opcion);    

                    $statement->execute();
                    $result = $statement->get_result(); 

                    $Productos = array();

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $producto = $row;
                            $producto['Imagen1'] = base64_encode($producto['Imagen1']);
                            $Productos[] = $producto;
                        }
                        return $Productos;
                    }
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function deleteProductoCarrito($mysqli, $idProducto) {
            try {
                $sql = "CALL SP_GestionCarrito(?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $idCarrito = 0;
                $usuario = $_SESSION['UsuID'];
                $cantidad = 0;
                $precio = 0;
                $caducidad = '';
                $activo = 2;
                $opcion = "DP";

                $statement->bind_param(
                    "iiiidsis",
                    $idCarrito,
                    $usuario,
                    $idProducto,
                    $cantidad,
                    $precio,
                    $caducidad,
                    $activo,
                    $opcion); 

                $result = $statement->execute();

                if($result) {
                    echo 'Producto eliminado del Carrito exitosamente';
                }
                else {
                    echo 'Error al eliminar producto del Carrito';  
                }
            }
            catch (Exception $exc) {
                echo ($exc->getMessage());
            }
        }

        static public function updateProductoCarritoRestar1($mysqli, $idProducto) {
            try {
                $sql = "CALL SP_GestionCarrito(?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $idCarrito = 0;
                $usuario = $_SESSION['UsuID'];
                $cantidad = 0;
                $precio = 0;
                $caducidad = '';
                $activo = 2;
                $opcion = "UR1";

                $statement->bind_param(
                    "iiiidsis",
                    $idCarrito,
                    $usuario,
                    $idProducto,
                    $cantidad,
                    $precio,
                    $caducidad,
                    $activo,
                    $opcion); 

                $result = $statement->execute();

                if($result) {
                    echo 'Producto eliminado del Carrito exitosamente';
                }
                else {
                    echo 'Error al eliminar producto del Carrito';  
                }
            }
            catch (Exception $exc) {
                echo ($exc->getMessage());
            }
        }

        static public function updateProductoCarritoSumar1($mysqli, $idProducto) {
            try {
                $sql = "CALL SP_GestionCarrito(?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $idCarrito = 0;
                $usuario = $_SESSION['UsuID'];
                $cantidad = 0;
                $precio = 0;
                $caducidad = '';
                $activo = 2;
                $opcion = "US1";

                $statement->bind_param(
                    "iiiidsis",
                    $idCarrito,
                    $usuario,
                    $idProducto,
                    $cantidad,
                    $precio,
                    $caducidad,
                    $activo,
                    $opcion); 

                $result = $statement->execute();

                if($result) {
                    echo 'Producto eliminado del Carrito exitosamente';
                }
                else {
                    echo 'Error al eliminar producto del Carrito';  
                }
            }
            catch (Exception $exc) {
                echo ($exc->getMessage());
            }
        }
    }