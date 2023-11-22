<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once "../db.php";
        require_once "../models/Producto.php";

        try {//  NECESITO OBTENER AUN LA VALORACION
            $id = $_POST['idProductoEdit'];
            $nombreProducto = $_POST['NombreProEdit'];
            $categoriaProducto = $_POST['CategoriaProEdit'];
            $tipoVentaProducto = $_POST['TipoProEdit'];
            $precioProducto = $_POST['PrecioProEdit'];
            $stockProducto = $_POST['StockProEdit'];

            if ($_FILES['VideoProEdit']['error'] === UPLOAD_ERR_OK) {
                $datos = $_FILES['VideoProEdit'];
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

            if ($_FILES['Imagen1ProEdit']['error'] === UPLOAD_ERR_OK) {
                $blobImagenProducto1 = (file_get_contents($_FILES['Imagen1ProEdit']['tmp_name']));
                $nombreImagenProducto1 = $_FILES['Imagen1ProEdit']['name'];
                $tipoImagenProducto1 = $_FILES['Imagen1ProEdit']['type'];
            } else {
                echo "Error al subir el archivo de imagen.";
            }
        
            if ($_FILES['Imagen2ProEdit']['error'] === UPLOAD_ERR_OK) {
                $blobImagenProducto2 = (file_get_contents($_FILES['Imagen2ProEdit']['tmp_name']));
                $nombreImagenProducto2 = $_FILES['Imagen2ProEdit']['name'];
                $tipoImagenProducto2 = $_FILES['Imagen2ProEdit']['type'];
            } else {
                echo "Error al subir el archivo de imagen.";
            }

            if ($_FILES['Imagen3ProEdit']['error'] === UPLOAD_ERR_OK) {
                $blobImagenProducto3 = (file_get_contents($_FILES['Imagen3ProEdit']['tmp_name']));
                $nombreImagenProducto3 = $_FILES['Imagen3ProEdit']['name'];
                $tipoImagenProducto3 = $_FILES['Imagen3ProEdit']['type'];
            } else {
                echo "Error al subir el archivo de imagen.";
            }

            $descripcionProducto = $_POST['DescripcionProEdit'];

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