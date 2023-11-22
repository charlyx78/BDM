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

            if((isset($_FILES['videoProducto']))) {
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
            }
            else {
                $rutaCompleta = $_POST['videoProducto']; 
            }

            if(isset($_FILES['imagenProducto1'])){
                if ($_FILES['imagenProducto1']['error'] === UPLOAD_ERR_OK) {
                    $blobImagenProducto1 = (file_get_contents($_FILES['imagenProducto1']['tmp_name']));
                    $nombreImagenProducto1 = $_FILES['imagenProducto1']['name'];
                    $tipoImagenProducto1 = $_FILES['imagenProducto1']['type'];
                } else {
                    echo "Error al subir el archivo de imagen.";
                }

            }
            else {
                $blobImagenProducto1 = base64_decode($_POST['imagenProducto1']);
                $nombreImagenProducto1 = '';
                $tipoImagenProducto1 = '';
            }
        
            if(isset($_FILES['imagenProducto2'])){
                if ($_FILES['imagenProducto2']['error'] === UPLOAD_ERR_OK) {
                    $blobImagenProducto2 = (file_get_contents($_FILES['imagenProducto2']['tmp_name']));
                    $nombreImagenProducto2 = $_FILES['imagenProducto2']['name'];
                    $tipoImagenProducto2 = $_FILES['imagenProducto2']['type'];
                } else {
                    echo "Error al subir el archivo de imagen.";
                }
            }
            else {
                $blobImagenProducto2 = base64_decode($_POST['imagenProducto2']);
                $nombreImagenProducto2 = '';
                $tipoImagenProducto2 = '';
            }

            if(isset($_FILES['imagenProducto3'])){
                if ($_FILES['imagenProducto3']['error'] === UPLOAD_ERR_OK) {
                    $blobImagenProducto3 = (file_get_contents($_FILES['imagenProducto3']['tmp_name']));
                    $nombreImagenProducto3 = $_FILES['imagenProducto3']['name'];
                    $tipoImagenProducto3 = $_FILES['imagenProducto3']['type'];
                } else {
                    echo "Error al subir el archivo de imagen.";
                }
            }
            else {
                $blobImagenProducto3 = base64_decode($_POST['imagenProducto3']);
                $nombreImagenProducto3 = '';
                $tipoImagenProducto3 = '';
            }

            $descripcionProducto = $_POST['descripcionProducto'];
            $idAUsuario = isset($_POST['productoAUsuario']) ? $_POST['productoAUsuario'] : null;
            $activo = isset($_POST['activo']) ? $_POST['activo'] : 1;

            // Conexion a la BD
            $mysqli = db::connect();
            
            $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $statement = $mysqli->prepare($sql);

            $id = 0;
            $usuario = $_SESSION['UsuID'];
            $valoracion = 0;
            $opcion = "I";
            
            $statement->bind_param(
                "iissbbbssssssbiididisi",
                $id,
                $usuario,
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
                $rutaCompleta, 
                $categoriaProducto, 
                $tipoVentaProducto, 
                $precioProducto, 
                $stockProducto,
                $valoracion,
                $activo,
                $opcion,
                $idAUsuario);

                $statement->send_long_data(4, $blobImagenProducto1);
                $statement->send_long_data(5, $blobImagenProducto2);
                $statement->send_long_data(6, $blobImagenProducto3);
                $statement->send_long_data(13, $rutaCompleta);
            
            $result = $statement->execute();

            $sql2 = "SELECT LAST_INSERT_ID() AS ultimoId";
            $stmt2 = $mysqli->prepare($sql2);
            $stmt2->execute();
            $result2 = $stmt2->get_result(); 
            $ultimoId = $result2->fetch_assoc();
            echo json_encode($ultimoId);
        }
        catch(Exception $exc) {
            echo json_encode($exc->getMessage());
        }
    }