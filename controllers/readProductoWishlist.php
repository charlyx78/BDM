<?php 
    session_start();

    require_once "../db.php";
    require_once "../models/Wishlist.php";

    try {
        //Obtener Json
        $json = json_decode(file_get_contents('php://input'),true);

        // Conexion a la BD
        $mysqli = db::connect();
                
        $result = Wishlist::readProductoWishlist($mysqli, $json['idWishlist']);

        echo json_encode($result);
    }
    catch(Exception $exc) {
        $json_response = ["success" => false, "error" => $exc->getMessage()];  
    }
