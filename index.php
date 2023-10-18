<?php
    // if(!isset($_SESSION["AUTH"])) {
    //     //Si la sesion de usuario no existe redirigir a login
    //     header("Location: /");
    //     exit;
    // }
    // require_once "./models/User.php";
    // require_once "db.php";
    // $idUser = $_SESSION["AUTH"];
    // $mysqli = db::connect();
    // $user = User::findUserById($mysqli,(int)$idUser);
    session_start();
    include("db.php");
    if(isset($_POST["submitLogin"]))
    {
        $correo = $_POST['usernameL'];
        $contra = $_POST['passwordL'];

        $query= "select * from Usuarios where UsuCorreo = '$correo' and UsuContra = '$contra'";
        $result= mysqli_query($con, $query);

        if($result)
        {
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                $_SESSION['UsuID'] = $row['PK_IdUsuario'];
                $_SESSION['UsuCorreo'] = $row['UsuCorreo'];
                $_SESSION['UsuApodo'] = $row['UsuApodo'];
                $_SESSION['UsuContra'] = $row['UsuContra'];

                $PK_RolUsu = $row['UsuFK_IdRol'];
                $query2= "select RolDescripcion from RolUsuario where PK_IdRol = '$PK_RolUsu'";
                $result2= mysqli_query($con, $query2);
                $row2 = $result2->fetch_assoc();
                $_SESSION['UsuRol'] = $row2['RolDescripcion'];

                $_SESSION['UsuNombre'] = $row['UsuNombres'];
                $_SESSION['UsuApellidos'] = $row['UsuApellidos'];

                $_SESSION['UsuFKSexo'] = $row['UsuFK_IdSexo'];
                $PK_Sexo = $row['UsuFK_IdSexo'];
                $query2= "select SexoDescripcion from Sexo where PK_IdSexo = '$PK_Sexo'";
                $result2= mysqli_query($con, $query2);
                $row2 = $result2->fetch_assoc();
                $_SESSION['UsuSexo'] = $row2['SexoDescripcion'];

                $_SESSION['UsuFechaNac'] = $row['UsuFechaNac'];
                $_SESSION['UsuFechaIng'] = $row['UsuFechaIng'];
                $_SESSION['UsuActivo'] = $row['UsuFK_IdActivo'];
                echo "<script type='text/javascript'> alert('Si existes')</script>";
                header("Location: ../BDM/views/home.php");
            }
            else{
                echo "<script type='text/javascript'> alert('No Existes')</script>";
            }
        }
        //echo "<script type='text/javascript'> alert('Sesion Iniciada LOGIN')</script>";
    }

    if(isset($_POST["submiReg"]))
    {
        $RegNombre = $_POST['namesR'];
        $RegApellidos = $_POST['lastnamesR'];
        $RegFechaNac = $_POST['birthdateR'];
        $RegSexo = $_POST['sexR'];
        $RegApodo = $_POST['usernameR'];
        $RegCorreo = $_POST['emailR'];
        $RegContra = $_POST['passwordR'];
        $RegRol = $_POST['accounttype'];
        $RegAvatar = "ImagenXD";
        $RegActivo = 2;

        $query = "select * from Usuarios where UsuCorreo = '$RegCorreo'";
            $result2= mysqli_query($con, $query);
            if(!$result2->num_rows > 0)
            {
                try{
                    $statement = $con->prepare("CALL SP_RegistrarUsuario (?,?,?,?,?,?,?,?,?,?)");
                    $statement->bind_param("sssisssisi", $RegCorreo, $RegApodo, $RegContra, $RegRol, $RegAvatar, $RegNombre, $RegApellidos, $RegSexo, $RegFechaNac, $RegActivo);
                    $statement->execute();
                    $statement->close();
                }
                catch(Exception $ex) {
                    echo "<script type='text/javascript'> alert('Error en Captura')</script>";
                }
            }
            else
            {
                echo "<script type='text/javascript'> alert('Ya Esta Registrado Este Correo')</script>";
            }
    }
?>
<!DOCTYPE html>
<html lang="es_mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Cursos </title>
    <?php include_once "estilosLanding.php" ?>
</head>
<body>
    <div class="contenedor-landing-page">
        <div class="container">
            <div class="contenido-landing-page">
                <div class="contenedor-texto-landing-page">
                    <div class="logo mb-4">
                        <img src="img/logo.png" width="60" alt="logo">
                        <h1>Trendigo</h1>
                    </div>
                    <h2 class="mb-4">La tienda online con los ultimos articulos en tendencia</h2>
                    <div class="landing-page-tags mb-5">
                        <h5>Articulos de tecnologia          
                        <div class="vr"></div>
                        Ropa y moda
                        <div class="vr"></div>
                        Juguetes
                        <div class="vr"></div>
                        Muebles
                        <div class="vr"></div>
                        Electrodomesticos
                        <div class="vr"></div>
                        Libros
                        <div class="vr"></div>
                        Productos de belleza y mas...
                    </div>
                    <div class="contenedor-botones-landing-page">
                        <button type="button" class="btn btn-secundario" data-bs-toggle="modal" data-bs-target="#modalLogin">Iniciar sesion</button>
                        <button type="button" class="btn btn-secundario" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrarse</button>
                    </div>
                </div>
                <div class="contenedor-imagen-landing-page">
                    <img src="img/iphone.png" alt="Producto en tendencia de ejemplo">
                </div>                
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLoginLabel">Inicia sesion</h5>
                    <button class="btn"><i class="bi bi-x-circle-fill text-danger" data-bs-dismiss="modal" aria-label="Close"></i></button>
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <!-- LOGINNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN -->
                    <form action="" id="formLogin" method="POST">
                        <div class="mb-2">
                            <label for="username" class="col-form-label">Nombre de usuario: </label>
                            <input type="text" class="form-control" name="usernameL" id="usernameL" placeholder="Nombre de usuario" maxlength="70">
                        </div>
                        <div class="mb-5">
                            <label for="password" class="col-form-label">Contraseña: </label>
                            <input type="password" class="form-control mb-4" name="passwordL" id="passwordL" placeholder="Contraseña" maxlength="40">
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <!-- a href="views/home.php" class="btn btn-secundario">Iniciar sesion</a> -->
                            <input type="submit" value="Iniciar Sesion" id="submitLogin" name="submitLogin" class="btn btn-secundario">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistroLabel">Crea una cuenta</h5>
                    <button class="btn"><i class="bi bi-x-circle-fill text-danger" data-bs-dismiss="modal" aria-label="Close"></i></button>
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <!-- REGISTROOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->
                    <form action="" id="formSignup" method="POST">
                        <div class="mb-2 row">
                            <div class="col">
                                <label for="names" class="col-form-label">Nombre (s): </label>
                                <input type="text" class="form-control" name="namesR" id="namesR" placeholder="Nombre (s)" maxlength="70">
                            </div>
                            <div class="col">
                                <label for="lastnames" class="col-form-label">Apellidos: </label>
                                <input type="text" class="form-control" name="lastnamesR" id="lastnamesR" placeholder="Apellidos"  maxlength="70">
                            </div>       
                        </div>
                        <div class="mb-2 row">
                            <div class="col">
                                <label for="birthdate" class="col-form-label">Fecha de nacimiento: </label>
                                <input type="date" class="form-control" name="birthdateR" id="birthdateR">
                            </div>
                            <div class="col">
                                <label for="sexR" class="col-form-label">Sexo: </label>
                                <select name="sexR" id="sexR" class="form-control">
                                    <option value="">Seleccionar...</option>
                                    <option value="1">Hombre</option>
                                    <option value="2">Mujer</option>
                                    <option value="3">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="username" class="col-form-label">Nombre de usuario: </label>
                            <input type="text" class="form-control" name="usernameR" id="usernameR" placeholder="Nombre de usuario"  maxlength="70">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="col-form-label">Correo: </label>
                            <input type="text" class="form-control" name="emailR" id="emailR" placeholder="Correo"  maxlength="40">
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <label for="password" class="col-form-label">Contraseña: </label>
                                <input type="password" class="form-control" name="passwordR" id="passwordR" placeholder="Contraseña" maxlength="40">
                            </div>
                            <div class="col">
                                <label for="confirmpassword" class="col-form-label">Confirmar contraseña: </label>
                                <input type="password" class="form-control" name="confirmpasswordR" id="confirmpasswordR" placeholder="Confirmar contraseña" maxlength="40">
                            </div>  
                        </div>
                        <div class="mb-5">
                            <p class="mb-2">Tipo de cuenta: </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accounttype" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="accounttypebuyer">Quiero comprar</label>
                            </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="accounttype" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="accounttypeselles">Quiero vender</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accounttype" id="inlineRadio3" value="3">
                                <label class="form-check-label" for="accounttypeadmin">Soy un administrador</label>
                            </div>
                        </div>    
                        <div class="d-flex justify-content-end">
                            <!-- <a href="views/home.php" class="btn btn-secundario">Registrarse</a> -->
                            <input type="submit" value="Iniciar Sesion" id="submiReg" name="submiReg" class="btn btn-secundario">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="js/landingPage.js"></script> -->
</body>
</html>