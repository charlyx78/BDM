<?php 
    session_start();

    require_once "../db.php";
    require_once "../models/Wishlist.php";

    try {
        header('Content-Type: application/json');

        // Conexion a la BD
        $mysqli = db::connect();
                
        $result = Wishlist::readWishlist($mysqli);

        echo json_encode($result);
    }
    catch(Exception $exc) {
        $json_response = ["success" => false, "error" => $exc->getMessage()];  
    }
