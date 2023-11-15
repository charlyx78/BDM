<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once "../db.php";

        try {
            $idProducto = $_POST['idProducto'];
            $cantidadProducto = $_POST['cantidadProducto'];
            $precioProducto = $_POST['precioProducto'];

            // Conexion a la BD
            $mysqli = db::connect();
            
            $sql = "CALL SP_GestionCarrito(?,?,?,?,?,?,?,?)";
            $statement = $mysqli->prepare($sql);

            $idCarrito = 1;
            $usuario = $_SESSION['UsuID'];
            $caducidad = "2025-9-11";
            $valoracion = 2;
            $activo = 2;
            $opcion = "I";

            $statement->bind_param(
                "iiiidsis",
                $idCarrito,
                $usuario,
                $idProducto,
                $cantidadProducto,
                $precioProducto,
                $caducidad,
                $activo,
                $opcion);
                $statement->execute();
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }