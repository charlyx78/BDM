<?php 
    session_start();

    require_once "../db.php";
    require_once "../models/Valoracion.php";

    try {
        $mysqli = db::connect();
                
        if(isset($_REQUEST['idProducto'])){
            $result = Valoracion::readValoracion($mysqli, $_REQUEST['idProducto']);
        }

        echo json_encode($result);
    }
    catch(Exception $exc) {
        $json_response = ["success" => false, "error" => $exc->getMessage()];  
    }
