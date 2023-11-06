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
            $imagenProducto1 = file_get_contents($_FILES['imagenProducto1']['tmp_name']);
            $imagenProducto2 = file_get_contents($_FILES['imagenProducto2']['tmp_name']);
            $imagenProducto3 = file_get_contents($_FILES['imagenProducto3']['tmp_name']);
            $descripcionProducto = $_POST['descripcionProducto'];

            // Conexion a la BD
            $mysqli = db::connect();
            
            Producto::addProducto($mysqli, $nombreProducto, $descripcionProducto, $imagenProducto1, $imagenProducto2, $imagenProducto3, $videoProducto, $categoriaProducto, $tipoVentaProducto, $precioProducto, $stockProducto);
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }