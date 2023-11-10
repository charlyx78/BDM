<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once "../db.php";
        require_once "../models/Producto.php";

        try {
            $nombreProducto = $_POST['nombreProducto'];
            $categoriaProducto = $_POST['categoriaProducto'];
            $tipoVentaProducto = $_POST['tipoVentaProducto'];
            $precioProducto = $_POST['precioProducto'];
            $stockProducto = $_POST['stockProducto'];

            $videoProducto = file_get_contents($_FILES['videoProducto']['tmp_name']);
            
            $blobImagenProducto1 = file_get_contents($_FILES['imagenProducto1']['tmp_name']);
            $nombreImagenProducto1 = $_FILES['imagenProducto1']['name'];
            $tipoImagenProducto1 = $_FILES['imagenProducto1']['type'];

            $blobImagenProducto2 = file_get_contents($_FILES['imagenProducto2']['tmp_name']);
            $nombreImagenProducto2 = $_FILES['imagenProducto2']['name'];
            $tipoImagenProducto2 = $_FILES['imagenProducto2']['type'];

            $blobImagenProducto3 = file_get_contents($_FILES['imagenProducto3']['tmp_name']);
            $nombreImagenProducto3 = $_FILES['imagenProducto3']['name'];
            $tipoImagenProducto3 = $_FILES['imagenProducto3']['type'];

            $descripcionProducto = $_POST['descripcionProducto'];

            // Conexion a la BD
            $mysqli = db::connect();
            
            Producto::addProducto(
                $mysqli, 
                $nombreProducto, 
                $descripcionProducto, 
                $blobImagenProducto1,
                $nombreImagenProducto1,
                $tipoImagenProducto1,
                $blobImagenProducto2,
                $nombreImagenProducto2, 
                $tipoImagenProducto2, 
                $blobImagenProducto3, 
                $nombreImagenProducto3, 
                $tipoImagenProducto3, 
                $videoProducto, 
                $categoriaProducto, 
                $tipoVentaProducto, 
                $precioProducto, 
                $stockProducto
            );
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }