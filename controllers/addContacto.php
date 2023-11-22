<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Contacto.php";
        
        try {
            //Obtener Json
            $json = json_decode(file_get_contents('php://input'),true);
            
            // Conexion a la BD
            $mysqli = db::connect();
            
            $idUsuario2 = $json['idUsuario'];
            $iProducto = $json['idProducto'];


            $contacto = Contacto::addContacto($mysqli, $idUsuario2, $iProducto);


            echo "Contacto agregado exitosamente";
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }