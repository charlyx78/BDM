<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Mensaje.php";
        
        try {
            //Obtener Json
            $json = json_decode(file_get_contents('php://input'),true);
            
            // Conexion a la BD
            $mysqli = db::connect();
            
            $destinatario = $json['destinatario'];
            $mensaje = $json['mensaje'];
            $isProducto = $json['isProducto'];
            $producto = $json['producto'];

            $mensaje = Mensaje::addMensaje($mysqli, $destinatario, $mensaje, $isProducto, $producto);


            echo "Mensaje agregado exitosamente";
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }