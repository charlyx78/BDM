<?php 
    session_start();

    require_once "../db.php";
    require_once "../models/Mensaje.php";

    try {
        header('Content-Type: application/json');

        // Conexion a la BD
        $mysqli = db::connect();
                
        if(isset($_REQUEST["idUsuario"]) && isset($_REQUEST["idProducto"])) {
            $result = Mensaje::readMensaje($mysqli, $_REQUEST["idUsuario"], $_REQUEST["idProducto"]);
        }

        echo json_encode($result);
    }
    catch(Exception $exc) {
        $json_response = ["success" => false, "error" => $exc->getMessage()];  
    }

