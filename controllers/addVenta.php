<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Venta.php";
        
        try {//TENGO QUE HACER EL "readCarrito" PARA TENER TODOS LOS PRODUCTOS DEL USUARIO QUE VA A PAGAR
            //POR CADA UNO DE ESE ARRAY DE CARRITOS, TENGO QUE HACER EL "addVenta"
            //Obtener Json
            $json = json_decode(file_get_contents('php://input'),true);
            
            // Conexion a la BD
            $mysqli = db::connect();
            
            $productoCarrito = Venta::addVenta($mysqli, $json['idProducto'], $json['cantidadProducto']);

            echo "Productos Vendidos Exitosamente";
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }