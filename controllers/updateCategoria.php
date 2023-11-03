<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once "../db.php";
        require_once "../models/Categoria.php";

        try {
            //Obtener Json
            $json = json_decode(file_get_contents('php://input'),true);

            if ($json) {
                // Sanitizar JSON
                $filters = [
                    'idCategoria' => FILTER_SANITIZE_STRING,
                    'nombreCategoria' => FILTER_SANITIZE_STRING,
                    'descripcionCategoria' => FILTER_SANITIZE_STRING
                ];
                $options = [
                    'idCategoria' =>  [ 'flags' => FILTER_NULL_ON_FAILURE ],
                    'nombreCategoria' =>  [ 'flags' => FILTER_NULL_ON_FAILURE ],
                    'descripcionCategoria' =>  [ 'flags' => FILTER_NULL_ON_FAILURE ]
                ];
                $json_safe = [];
                foreach($json as $key=>$value) {
                    $json_safe[$key] = filter_var($value, $filters[$key], $options[$key]);
                }

                // Conexion a la BD
                $mysqli = db::connect();
                
                $categoria = Categoria::parseJson($json);

                echo json_encode($categoria);

                $categoria->updateCategoria($mysqli, $json['idCategoria']);
                $json_response = ["success" => true, "msg" => "Se ha actualizado una categoria"];
                header('Content-Type: application/json');
            }
            else {
                echo '<script>alert("Los datos JSON no son válidos")</script>';
            }
        }
        catch(Exception $exc) {
            echo json_encode(["success" => false, "error" => $exc->getMessage()]);
        }
    }

