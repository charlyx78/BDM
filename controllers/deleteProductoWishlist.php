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
            
                $result = Wishlist::deleteProductoWishlist($mysqli, $json["idProductoWishlist"]); 
                         
                if($result) {
                    echo json_encode($result);
                    exit;
                }
                else {
                    echo "no se pudo :(";
                }
            }
            else {
                echo '<script>alert("Los datos JSON no son válidos")</script>';
            }
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }