<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Wishlist.php";
        
        try {
            $nombreWishlist = $_POST['nombreWishlist'];
            $descripcionWishlist = $_POST['descripcionWishlist'];

            if ($_FILES['imagenWishlist']['error'] === UPLOAD_ERR_OK) {
                $blobImagenWishlist= (file_get_contents($_FILES['imagenWishlist']['tmp_name']));
                $nombreImagenWishlist = $_FILES['imagenWishlist']['name'];
                $tipoImagenWishlist = $_FILES['imagenWishlist']['type'];
            }
            else {
                echo "Error al subir el archivo de imagen.";
            }

            $privacidadWishlist = $_POST['privacidadWishlist'];
            
            // Conexion a la BD
            $mysqli = db::connect();
            
            $categoria = Wishlist::addWishlist($mysqli, $nombreWishlist, $descripcionWishlist, $blobImagenWishlist, $nombreImagenWishlist, $tipoImagenWishlist, $privacidadWishlist);

            echo "Wishlist creada exitosamente";
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }