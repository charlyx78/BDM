<?php 
    session_start();

    require_once "../db.php";
    require_once "../models/Wishlist.php";

    try {
        header('Content-Type: application/json');

        // Conexion a la BD
        $mysqli = db::connect();
                
        if(isset($_REQUEST['idUsuario'])) {
            $result = Wishlist::readWishlist($mysqli, $_REQUEST['idUsuario']);
        }
        else {
            $result = Wishlist::readWishlist($mysqli, $_SESSION['UsuID']);
        }

        echo json_encode($result);
    }
    catch(Exception $exc) {
        $json_response = ["success" => false, "error" => $exc->getMessage()];  
    }
