<?php 
    require_once "../db.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST')  {
        try {
            // Conexión a la BD
            $mysqli = db::connect(); 

            $nombreProducto = isset($_POST["nombreProducto"]) ? '%' . $_POST["nombreProducto"] . '%' : "%%";
            $nombreVendedor = isset($_POST["nombreVendedor"]) ? '%' . $_POST["nombreVendedor"] . '%' : "%%";
            $precioMinimo = isset($_POST["precioMinimo"]) ? $_POST["precioMinimo"] : 0;
            $precioMaximo = isset($_POST["precioMaximo"]) ? $_POST["precioMaximo"] : 0;
            $masVendido = isset($_POST["masVendidos"]) ? $_POST["masVendidos"] : 0;
            $mejorCalificados = isset($_POST["mejorCalificados"]) ? $_POST["mejorCalificados"] : 0;

            $sql = "CALL sp_busquedaProducto(?,?,?,?,?,?)";

            $statement = $mysqli->prepare($sql);

            // Enlazar parámetros
            $statement->bind_param("ssddii", $nombreProducto, $nombreVendedor, $precioMinimo, $precioMaximo, $masVendido, $mejorCalificados);        

            $statement->execute();
            $result = $statement->get_result(); 
        
            $productos = array();

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $producto = $row;
                    $producto['Imagen1'] = base64_encode($producto['Imagen1']);
                    $producto['Imagen2'] = base64_encode($producto['Imagen2']);
                    $producto['Imagen3'] = base64_encode($producto['Imagen3']);
                    $productos[] = $producto;
                }
                echo json_encode($productos);
            } 
            else {
                echo json_encode(array('error' => 'No se encontraron productos.'));
            }        
        }
        catch(Exception $exc) {
            echo json_encode(array('error' => $exc->getMessage()));
        }
    }
    else 
    {
        // Conexión a la BD
        $mysqli = db::connect();
    
        $nombreProducto = '%' . $_REQUEST['nombreProducto'] . '%';
        $activo=2;
        $sql = "SELECT * FROM vw_productos WHERE Nombre LIKE ? AND Activo=?";

        $statement = $mysqli->prepare($sql);
    
        // Enlazar parámetro
        $statement->bind_param("si", $nombreProducto, $activo);
    
        $statement->execute();
        $result = $statement->get_result(); 
    
        $productos = array();

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $producto = $row;
                $producto['Imagen1'] = base64_encode($producto['Imagen1']);
                $producto['Imagen2'] = base64_encode($producto['Imagen2']);
                $producto['Imagen3'] = base64_encode($producto['Imagen3']);
                $productos[] = $producto;
            }
            echo json_encode($productos);
        }
    }
?>