<?php 
    session_start();

    require_once "../db.php";
    require_once "../models/Venta.php";

    try {
        //Obtener Json
        $json = json_decode(file_get_contents('php://input'),true);

        // Conexion a la BD
        $mysqli = db::connect();
                
        $result = Venta::readProductoVentasAgrupadas($mysqli);

        echo json_encode($result);
    }
    catch(Exception $exc) {
        $json_response = ["success" => false, "error" => $exc->getMessage()];  
    }
