<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Venta.php";
        
        try {
            //Obtener Json
            $json = json_decode(file_get_contents('php://input'),true);
            
            // Conexion a la BD
            $mysqli = db::connect();
            
            $Venta = Venta::addVenta($mysqli, $json['idProductoVenta'], $json['idProductoTipo'], $json['idProductoNombre'], $json['idProductoCategoria'], $json['idProductoPrecio'], $json['idProductoCantidad'], $json['usuarioVendedor'], $json['idMetodoPago']);

            echo "Productos Comprados exitosamente";
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }