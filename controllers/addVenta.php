<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Venta.php";
        
        try {
            $idProductoVenta = $_POST['idProductoVenta'];
            $idProductoTipo = $_POST['idProductoTipo'];
            $idProductoNombre = $_POST['idProductoNombre'];
            $idProductoCategoria = $_POST['idProductoCategoria'];
            $idProductoPrecio = $_POST['idProductoPrecio'];
            $idProductoCantidad = $_POST['idProductoCantidad'];
            $usuarioVendedor = $_POST['usuarioVendedor'];
            $idMetodoPago = $_POST['idMetodoPago'];
            
            // Conexion a la BD
            $mysqli = db::connect();
            
            $Venta = Venta::addVenta($mysqli, $idProductoVenta, $idProductoTipo, $idProductoNombre, $idProductoCategoria, $idProductoPrecio, $idProductoCantidad, $usuarioVendedor, $idMetodoPago);

            echo "Productos Comprados exitosamente";
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }