<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once "../db.php";
        require_once "../models/Producto.php";

        try {//  NECESITO OBTENER AUN LA VALORACION
            $id = $_POST['idpro'];
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
                    $rutaCompleta = ''; 
                }
            }

            if(isset($_FILES['imagenProducto1'])){
                if ($_FILES['imagenProducto1']['error'] === UPLOAD_ERR_OK) {
                    $blobImagenProducto1 = (file_get_contents($_FILES['imagenProducto1']['tmp_name']));
                    $nombreImagenProducto1 = $_FILES['imagenProducto1']['name'];
                    $tipoImagenProducto1 = $_FILES['imagenProducto1']['type'];
                } else {
                    $blobImagenProducto1 = '';
                    $nombreImagenProducto1 = '';
                    $tipoImagenProducto1 = '';
                }
            }
        
            if(isset($_FILES['imagenProducto2'])){
                if ($_FILES['imagenProducto2']['error'] === UPLOAD_ERR_OK) {
                    $blobImagenProducto2 = (file_get_contents($_FILES['imagenProducto2']['tmp_name']));
                    $nombreImagenProducto2 = $_FILES['imagenProducto2']['name'];
                    $tipoImagenProducto2 = $_FILES['imagenProducto2']['type'];
                } else {
                    $blobImagenProducto2 = '';
                    $nombreImagenProducto2 = '';
                    $tipoImagenProducto2 = '';
                }
            }

            if(isset($_FILES['imagenProducto3'])){
                if ($_FILES['imagenProducto3']['error'] === UPLOAD_ERR_OK) {
                    $blobImagenProducto3 = (file_get_contents($_FILES['imagenProducto3']['tmp_name']));
                    $nombreImagenProducto3 = $_FILES['imagenProducto3']['name'];
                    $tipoImagenProducto3 = $_FILES['imagenProducto3']['type'];
                } else {
                    $blobImagenProducto3 = '';
                    $nombreImagenProducto3 = '';
                    $tipoImagenProducto3 = '';
                }
            }

            $descripcionProducto = $_POST['descripcionProducto'];

            // Conexion a la BD
            $mysqli = db::connect();

            $opcion = "U";
                
                $sql = "CALL SP_GestionProductos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                //VALORACION TENGO QUE ENVIARLA
                $usuario = $_SESSION['UsuID'];
                $valoracion = 0;
                $activo = 0;
                $idAUsuario = 0;

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
            
                if ($result) {
                    echo "PRODUCTO ACTUALIZADO " . $id;
                } else {
                    echo "Error al actualizar el producto: " . $mysqli->error;
                }        
        }
        catch(Exception $exc) {
            echo ($exc->getMessage());
        }
    }