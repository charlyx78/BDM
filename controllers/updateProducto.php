<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once "../db.php";
        require_once "../models/Producto.php";

        try {//  NECESITO OBTENER AUN LA VALORACION
            $id = $_POST['idProducto'];
            $nombreProducto = $_POST['nombreProducto'];
            $categoriaProducto = $_POST['categoriaProducto'];
            $tipoVentaProducto = $_POST['tipoVentaProducto'];
            $precioProducto = $_POST['precioProducto'];
            $stockProducto = $_POST['stockProducto'];

            if ($_FILES['videoProducto']['error'] === UPLOAD_ERR_OK) {
                $datos = $_FILES['videoProducto'];
                $direccionVideo = "../videos/";  
            
                $nombreArchivo = basename($datos['name']);
                $rutaCompleta = $direccionVideo . $nombreArchivo;
            
                if (move_uploaded_file($datos['tmp_name'], $rutaCompleta)) {
                    echo "El archivo de video se ha subido correctamente.";
                    $videoProducto = $nombreArchivo;  
                } else {
                    echo "Error al mover el archivo de video.";
                }
            } else {
                echo "Error al subir el archivo de video.";
            }

            if ($_FILES['imagenProducto1']['error'] === UPLOAD_ERR_OK) {
                $blobImagenProducto1 = (file_get_contents($_FILES['imagenProducto1']['tmp_name']));
                $nombreImagenProducto1 = $_FILES['imagenProducto1']['name'];
                $tipoImagenProducto1 = $_FILES['imagenProducto1']['type'];
            } else {
                echo "Error al subir el archivo de imagen.";
            }
        
            if ($_FILES['imagenProducto2']['error'] === UPLOAD_ERR_OK) {
                $blobImagenProducto2 = (file_get_contents($_FILES['imagenProducto2']['tmp_name']));
                $nombreImagenProducto2 = $_FILES['imagenProducto2']['name'];
                $tipoImagenProducto2 = $_FILES['imagenProducto2']['type'];
            } else {
                echo "Error al subir el archivo de imagen.";
            }

            if ($_FILES['imagenProducto3']['error'] === UPLOAD_ERR_OK) {
                $blobImagenProducto3 = (file_get_contents($_FILES['imagenProducto3']['tmp_name']));
                $nombreImagenProducto3 = $_FILES['imagenProducto3']['name'];
                $tipoImagenProducto3 = $_FILES['imagenProducto3']['type'];
            } else {
                echo "Error al subir el archivo de imagen.";
            }

            $descripcionProducto = $_POST['descripcionProducto'];

            // Conexion a la BD
            $mysqli = db::connect();
            
            Producto::updateProducto(
                $mysqli,
                $id, 
                $nombreProducto, 
                $descripcionProducto, 
                $blobImagenProducto1,
                $blobImagenProducto2,
                $blobImagenProducto3,
                $nombreImagenProducto1,
                $tipoImagenProducto1,
                $nombreImagenProducto2, 
                $tipoImagenProducto2, 
                $nombreImagenProducto3, 
                $tipoImagenProducto3, 
                $videoProducto, 
                $categoriaProducto, 
                $tipoVentaProducto, 
                $precioProducto, 
                $stockProducto
            );

            echo "muy bien";
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }