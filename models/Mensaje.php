<?php 
    class Mensaje {
        static public function addMensaje($mysqli, $destinatario, $mensaje, $isProducto, $producto) {
            try {
                $sql = "CALL SP_GestionMensajes(?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $id = 0;
                $remitente = $_SESSION['UsuID'];
                $activo = 2;
                $opcion = "I";

                $statement->bind_param(
                    "iiisiisi",
                    $id,
                    $remitente,
                    $destinatario,
                    $mensaje,
                    $activo,
                    $isProducto,
                    $opcion,
                    $producto);
                $result = $statement->execute();
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function readMensaje($mysqli, $destinatario, $producto) {
            try {
                $sql = "CALL SP_GestionMensajes(?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $id = 0;
                $remitente = $_SESSION['UsuID'];
                $mensaje = 0;
                $activo = 2;
                $isProducto = 0;
                $opcion = "SU";

                $statement->bind_param(
                    "iiisiisi",
                    $id,
                    $remitente,
                    $destinatario,
                    $mensaje,
                    $activo,
                    $isProducto,
                    $opcion,
                    $producto);
                $statement->execute();
                $result = $statement->get_result(); 

                $mensajes = array();

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $mensaje = $row;
                        $mensajes[] = $mensaje;
                    }
                    return $mensajes;
                }
            }
            catch (Exception $exc) {
                throw new Exception("Error en la consulta: " . $exc->getMessage());
            }
        }
    }

    