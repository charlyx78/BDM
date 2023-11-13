<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once "../db.php";
        require_once "../models/Producto.php";

        try {   
            header('Content-Type: application/json');
            $json = json_decode(file_get_contents('php://input'),true);

            if ($json) {
                // Sanitizar JSON
                $filters = [
                    'opcionView' => FILTER_SANITIZE_STRING,
                ];
                $options = [
                    'opcionView' =>  [ 'flags' => FILTER_NULL_ON_FAILURE ],
                ];
                $json_safe = [];
                foreach($json as $key=>$value) {
                    $json_safe[$key] = filter_var($value, $filters[$key], $options[$key]);
                }

                // Conexion a la BD
                $mysqli = db::connect();
                
                $opcion = "SR";
                        
                $result = Producto::readProducto($mysqli, $opcion);

                if($result) {
                    echo json_encode($result);
                    exit;
                }
            }
            else {
                echo ("JSON INVALIDO");
            }
        }
        catch(Exception $exc) {
            $json_response = ["success" => false, "error" => $exc->getMessage()];  
        }
        
    }