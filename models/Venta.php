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

        static public function addVenta($mysqli, $idProductoVenta, $idProductoTipo, $idProductoNombre, $idProductoCategoria, $idProductoPrecio, $idProductoCantidad, $usuarioVendedor, $idMetodoPago) { //FALTA JEJE
            try {
                $sql = "CALL SP_GestionVentas(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $idVenta = 0;
                $idVentaFecha = "2025-9-11";
                $usuarioCliente = $_SESSION['UsuID'];
                $activo = 2;
                $opcion = "I";

                $statement->bind_param(
                    "iiisidisiiiis",
                    $idVenta,
                    $idProductoVenta,
                    $idProductoTipo,
                    $idProductoNombre,
                    $idProductoCategoria,
                    $idProductoPrecio,
                    $idProductoCantidad,
                    $idVentaFecha,
                    $usuarioVendedor,
                    $usuarioCliente,
                    $idMetodoPago,
                    $activo,
                    $opcion);    

                    $statement->execute();
                    $result = $statement->get_result();

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

        static public function readProductoClienteComprados($mysqli) {
            try {
                $sql = "CALL SP_GestionVentas(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $idVenta = 0;
                $idProductoVenta = 0;
                $idProductoTipo = 0;
                $idProductoNombre = "";
                $idProductoCategoria = 0;
                $idProductoPrecio = 0;
                $idProductoCantidad = 0;
                $idVentaFecha = "2025-9-11";
                $usuarioVendedor = 0;
                $usuarioCliente = $_SESSION['UsuID'];
                $idMetodoPago = 0;
                $activo = 0;
                $opcion = "SPCC";

                $statement->bind_param(
                    "iiisidisiiiis",
                    $idVenta,
                    $idProductoVenta,
                    $idProductoTipo,
                    $idProductoNombre,
                    $idProductoCategoria,
                    $idProductoPrecio,
                    $idProductoCantidad,
                    $idVentaFecha,
                    $usuarioVendedor,
                    $usuarioCliente,
                    $idMetodoPago,
                    $activo,
                    $opcion);     

                    $statement->execute();
                    $result = $statement->get_result(); 

                    $Productos = array();

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $producto = $row;
                            $Productos[] = $producto;
                        }
                        return $Productos;
                    }
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function readProductoPedidos($mysqli) {
            try {
                $sql = "CALL SP_GestionReportes(?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $idCategoria = 0;
                $Fecha1 = "";
                $Fecha2 = "";
                $idUsuario = $_SESSION['UsuID'];
                $opcion = "C";

                $statement->bind_param(
                    "issis",
                    $idUsuario,
                    $Fecha1,
                    $Fecha2,
                    $idCategoria,
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

        static public function readProductoPedidosFiltro($mysqli, $Fecha1, $Fecha2, $idCategoria) {
            try {
                $sql = "CALL SP_GestionReportes(?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                if($idCategoria == "")
                {
                    $idCategoria = 0;
                }
                if($Fecha1 == "")
                {
                    $Fecha1 = "";
                    $Fecha2 = "";
                }
                if($Fecha2 == "")
                {
                    $Fecha1 = "";
                    $Fecha2 = "";
                }
                $idUsuario = $_SESSION['UsuID'];
                $opcion = "C";

                $statement->bind_param(
                    "issis",
                    $idUsuario,
                    $Fecha1,
                    $Fecha2,
                    $idCategoria,
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

        static public function readProductoVentas($mysqli) {
            try {
                $sql = "CALL SP_GestionReportes(?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $idCategoria = 0;
                $Fecha1 = "";
                $Fecha2 = "";
                $idUsuario = $_SESSION['UsuID'];
                $opcion = "V";

                $statement->bind_param(
                    "issis",
                    $idUsuario,
                    $Fecha1,
                    $Fecha2,
                    $idCategoria,
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

        static public function readProductoVentasFiltro($mysqli, $Fecha1, $Fecha2, $idCategoria) {
            try {
                $sql = "CALL SP_GestionReportes(?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                if($idCategoria == "")
                {
                    $idCategoria = 0;
                }
                if($Fecha1 == "")
                {
                    $Fecha1 = "";
                    $Fecha2 = "";
                }
                if($Fecha2 == "")
                {
                    $Fecha1 = "";
                    $Fecha2 = "";
                }
                $idUsuario = $_SESSION['UsuID'];
                $opcion = "V";

                $statement->bind_param(
                    "issis",
                    $idUsuario,
                    $Fecha1,
                    $Fecha2,
                    $idCategoria,
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

        static public function readProductoVentasAgrupadas($mysqli) {
            try {
                $sql = "CALL SP_GestionReportesAgrupados(?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $idCategoria = 0;
                $Fecha1 = "";
                $Fecha2 = "";
                $idUsuario = $_SESSION['UsuID'];
                $opcion = "V";

                $statement->bind_param(
                    "issis",
                    $idUsuario,
                    $Fecha1,
                    $Fecha2,
                    $idCategoria,
                    $opcion);   

                    $statement->execute();
                    $result = $statement->get_result(); 

                    $Productos = array();

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $producto = $row;
                            $Productos[] = $producto;
                        }
                        return $Productos;
                    }
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function readProductoVentasAgrupadasFiltro($mysqli, $Fecha1, $Fecha2, $idCategoria) {
            try {
                $sql = "CALL SP_GestionReportesAgrupados(?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                if($idCategoria == "")
                {
                    $idCategoria = 0;
                }
                if($Fecha1 == "")
                {
                    $Fecha1 = "";
                    $Fecha2 = "";
                }
                if($Fecha2 == "")
                {
                    $Fecha1 = "";
                    $Fecha2 = "";
                }
                $idUsuario = $_SESSION['UsuID'];
                $opcion = "V";

                $statement->bind_param(
                    "issis",
                    $idUsuario,
                    $Fecha1,
                    $Fecha2,
                    $idCategoria,
                    $opcion);   

                    $statement->execute();
                    $result = $statement->get_result(); 

                    $Productos = array();

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $producto = $row;
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