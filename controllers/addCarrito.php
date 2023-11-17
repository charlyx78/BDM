<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Carrito.php";
        
        try {
            //Obtener Json
            $json = json_decode(file_get_contents('php://input'),true);
            
            // Conexion a la BD
            $mysqli = db::connect();
            
            $productoCarrito = Carrito::addCarrito($mysqli, $json['idProducto'], $json['cantidadProducto'], $json['precioProducto']);

            echo "Producto agregado a Carrito exitosamente";
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }