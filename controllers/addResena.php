<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once "../db.php";
        require_once "../models/Valoracion.php";
        
        try {
            //Obtener Json
            $json = json_decode(file_get_contents('php://input'),true);
            
            // Conexion a la BD
            $mysqli = db::connect();
            
            $addResena = Valoracion::addResena($mysqli, $json['ComentarioResena'], $json['CalificacionResena'], $json['idProducto']);

            $filasAfectadas = $mysqli->affected_rows;

            if ($filasAfectadas > 0) {
                echo json_encode(array('success' => 'Comentario publicado exitosamente'));
            } else {
                echo json_encode(array('error' => 'No puede volver a publicar un comentario de este producto'));
            }
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }