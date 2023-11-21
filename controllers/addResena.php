<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Valoracion.php";
        
        try {
            //Obtener Json
            $json = json_decode(file_get_contents('php://input'),true);
            
            // Conexion a la BD
            $mysqli = db::connect();
            
            $productoCarrito = Valoracion::addResena($mysqli, $json['TituloResena'], $json['ComentarioResena'], $json['CalificacionResena'], $json['idProducto']);

            echo "Resena agregada a Carrito exitosamente";
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }