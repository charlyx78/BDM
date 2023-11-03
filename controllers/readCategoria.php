<?php 
    session_start();

    require_once "../db.php";
    require_once "../models/Categoria.php";

    try {
        header('Content-Type: application/json');

        // Conexion a la BD
        $mysqli = db::connect();
                
        $result = Categoria::readCategoria($mysqli);

        echo json_encode($result);
    }
    catch(Exception $exc) {
        $json_response = ["success" => false, "error" => $exc->getMessage()];  
    }

