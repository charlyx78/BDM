<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Wishlist.php";
        
        try {
            //Obtener Json
            $json = json_decode(file_get_contents('php://input'),true);
            
            // Conexion a la BD
            $mysqli = db::connect();
            
            $productoWishlist = Wishlist::addProductoWishlist($mysqli, $json['idWishlist'], $json['idProducto']);

            echo "Producto agregado a wishlist exitosamente";
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }