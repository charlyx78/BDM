<?php 

    session_start();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Wishlist.php";

        try {
            //Obtener Json
            $json = json_decode(file_get_contents('php://input'),true);

            if ($json) {
                // Conexion a la BD
                $mysqli = db::connect();
            
                $result = Wishlist::deleteWishlist($mysqli, $json["idWishlist"]); 
                         
                if($result) {
                    echo json_encode($result);
                    exit;
                }
            }
            else {
                echo '<script>alert("Los datos JSON no son válidos")</script>';
            }
        }
        catch(Exception $exc) {
            $json_response = ["success" => false, "error" => $exc->getMessage()];  
        }
    }