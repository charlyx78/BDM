<?php 
    class Venta {
        private $id;
        private $idPro;
        private $tipoPro;
        private $nombrePro;
        private $categoriaPro;
        private $precioPro;
        private $cantidadPro;
        private $fechaVenta;
        private $usuarioVendedor;
        private $usuarioCliente;
        private $MetPago;
        private $activo;

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getIdPro() {
            return $this->idPro;
        }
        public function setIdPro($id) {
            $this->idPro = $idPro;
        }

        public function getTipoPro() {
            return $this->tipoPro;
        }
        public function setTipoPro($tipoPro) {
            $this->tipoPro = $tipoPro;
        }

        public function getNombrePro() {
            return $this->nombrePro;
        }
        public function setNombrePro($nombrePro) {
            $this->nombrePro = $nombrePro;
        }

        public function getCategoriaPro() {
            return $this->categoriaPro;
        }
        public function setCategoriaPro($categoriaPro) {
            $this->categoriaPro = $categoriaPro;
        }

        public function getPrecioPro() {
            return $this->precioPro;
        }
        public function setPrecioPro($precioPro) {
            $this->precioPro = $precioPro;
        }

        public function getCantidadPro() {
            return $this->cantidadPro;
        }
        public function setCantidadPro($cantidadPro) {
            $this->cantidadPro = $cantidadPro;
        }

        public function getFechaVenta() {
            return $this->fechaVenta;
        }
        public function setFechaVenta($fechaVenta) {
            $this->fechaVenta = $fechaVenta;
        }

        public function getUsuarioVendedor() {
            return $this->usuarioVendedor;
        }
        public function setUsuarioVendedor($usuarioVendedor) {
            $this->usuarioVendedor = $usuarioVendedor;
        }

        public function getUsuarioCliente() {
            return $this->usuarioCliente;
        }
        public function setUsuarioCliente($usuarioCliente) {
            $this->usuarioCliente = $usuarioCliente;
        }

        public function getMetPago() {
            return $this->MetPago;
        }
        public function setMetPago($MetPago) {
            $this->MetPago = $MetPago;
        }

        public function getActivo() {
            return $this->activo;
        }
        public function setActivo($activo) {
            $this->activo= $activo;
        } 

        public function __construct($idPro,$tipoPro,$nombrePro,$categoriaPro,$precioPro,$cantidadPro,$fechaVenta,$usuarioVendedor,$usuarioCliente,$MetPago,$activo) {
            $this->idPro = $idPro;
            $this->tipoPro = $tipoPro;
            $this->nombrePro = $nombrePro;
            $this->categoriaPro = $categoriaPro;
            $this->precioPro = $precioPro;
            $this->cantidadPro = $cantidadPro;
            $this->fechaVenta = $fechaVenta;
            $this->usuarioVendedor = $usuarioVendedor;
            $this->usuarioCliente = $usuarioCliente;
            $this->MetPago = $MetPago;
            $this->activo = $activo;
        }

        static public function addVenta($mysqli, $idCliente) { //FALTA JEJE
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
    }