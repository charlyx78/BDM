<?php
    // class db {
    //     static public function connect() {
    //         $host = "127.0.0.1:3306";
    //         $db = "BaseMultimedia";
    //         $user = "root";
    //         $pass = "";
    //         try {
    //             $mysqli = new mysqli($host,$user,$pass,$db);
    //             if ($mysqli->connect_errno) {
    //                 $response = (object)array("status"=>500,"message"=>$mysqli->connect_error);
    //                 echo json_encode($response);
    //                 die("Error de conexión: " . $mysqli->connect_error);
    //             }
    //             else{
    //                 "Si se conecto pa";
    //             }

    //         } catch(Exception $e) {
    //             $response = (object)array("status"=>500,"message"=>"Error a conectarse a la base de datos, favor de crear la base de datos en el archivo database.sql o configurar el usuario y contraseña en el archivo db.php");
    //             echo json_encode($response);
    //             exit;
    //         }
    //         return $mysqli;
    //     }
      
    // }

$serverDB = "localhost:3307";
$userDB = "root";
$passwordDB = "Phineas2011!";
$databaseDB = "bdm";

    $con = mysqli_connect($serverDB, $userDB, $passwordDB, $databaseDB);

    if(!$con)
    {
        die("Conexion Fallida");
    }
?>