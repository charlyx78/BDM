<?php
session_start();
include("../db.php");

if(isset($_POST["submitUpdate"]))
    {
        $UpdNombre = $_POST['namesU'];
        $UpdApellidos = $_POST['lastnamesU'];
        $UpdFechaNac = $_POST['birthdateU'];
        $UpdSexo = $_POST['sexU'];
        $UpdApodo = $_POST['usernameU'];
        $UpdCorreo = $_POST['emailU'];
        $UpdContra = $_POST['passwordU'];
        $UpdAvatar = "ImagenXD";
        $UpdIdActual = $_SESSION['UsuID'];
               
        $statement = $con->prepare("CALL SP_ActualizarUsuario (?,?,?,?,?,?,?,?,?)");
        $statement->bind_param("ssssssisi", $UpdCorreo, $UpdApodo, $UpdContra, $UpdAvatar, $UpdNombre, $UpdApellidos, $UpdSexo, $UpdFechaNac, $UpdIdActual);
        $statement->execute();
        $statement->close();

        $_SESSION['UsuCorreo'] = $UpdCorreo;
        $_SESSION['UsuApodo'] = $UpdApodo;
        $_SESSION['UsuContra'] = $UpdContra;

        $_SESSION['UsuNombre'] = $UpdNombre;
        $_SESSION['UsuApellidos'] = $UpdApellidos;

        $_SESSION['UsuFKSexo'] = $UpdSexo;
        $query2= "select SexoDescripcion from Sexo where PK_IdSexo = '$UpdSexo'";
        $result2= mysqli_query($con, $query2);
        $row2 = $result2->fetch_assoc();
        $_SESSION['UsuSexo'] = $row2['SexoDescripcion'];

        $_SESSION['UsuFechaNac'] = $UpdFechaNac;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>

    <div class="contenedor-pagina-cuenta">
        <div class="contenedor-informacion-perfil">
            <div class="container-fluid">         
                <div class="d-flex align-items-center flex-column gap-2">
                    <form action="">
                        <div class="foto-perfil rounded-circle"></div>
                        <div class="position-relative">
                            <div class="position-absolute contenedor-boton-editar-foto">
                                <label for="foto-perfil" class="btn btn-primario rounded-circle boton-editar-foto"><i class="bi bi-pencil-fill"></i></label>
                                <input type="file" class="d-none" name="foto-perfil" id="foto-perfil">
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <h3 class="m-0 fw-bold"><?php echo $_SESSION['UsuNombre'] ?></h3>
                        <h5 class="m-0"><?php echo $_SESSION['UsuRol'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="contenedor-formulario-perfil">
                <div class="contenido-formulario-perfil container-fluid">
                    <!-- UPDATEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE -->
                    <form action="" id="formUpdate" method="post">
                        <div class="mb-2 row">
                            <div class="col">
                                <label for="names" class="col-form-label">Nombre (s): </label>
                                <input type="text" class="form-control" name="namesU" id="namesU" value="<?php echo $_SESSION['UsuNombre'] ?>" maxlength="70" required>
                            </div>
                            <div class="col">
                                <label for="lastnames" class="col-form-label">Apellidos: </label>
                                <input type="text" class="form-control" name="lastnamesU" id="lastnamesU" value="<?php echo $_SESSION['UsuApellidos'] ?>"  maxlength="70" required>
                            </div>       
                        </div>
                        <div class="mb-2 row">
                            <div class="col">
                                <label for="birthdate" class="col-form-label">Fecha de nacimiento: </label>
                                <input type="date" class="form-control" value="<?php echo $_SESSION['UsuFechaNac'] ?>" name="birthdateU" id="birthdateU" required>
                            </div>
                            <div class="col">
                                <label for="sexU" class="col-form-label">Sexo: </label>
                                <select name="sexU" id="sexU" class="form-control">
                                    <option value="<?php echo $_SESSION['UsuFKSexo'] ?>"><?php echo $_SESSION['UsuSexo'] ?></option>
                                    <option value="1">Hombre</option>
                                    <option value="2">Mujer</option>
                                    <option value="3">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="username" class="col-form-label">Nombre de usuario: </label>
                            <input type="text" class="form-control" name="usernameU" id="usernameU" value="<?php echo $_SESSION['UsuApodo'] ?>"  maxlength="70" required>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="col-form-label">Correo: </label>
                            <input type="email" class="form-control" name="emailU" id="emailU" value="<?php echo $_SESSION['UsuCorreo'] ?>"  maxlength="40" required>
                        </div>
                        <div class="mb-5 row">
                            <div class="col">
                                <label for="password" class="col-form-label">Contraseña: </label>
                                <input type="password" class="form-control" name="passwordU" id="passwordU" value="<?php echo $_SESSION['UsuContra'] ?>" maxlength="40" required>
                            </div>
                            <div class="col">
                                <label for="confirmpassword" class="col-form-label">Confirmar contraseña: </label>
                                <input type="password" class="form-control" name="confirmpasswordU" id="passwordU" placeholder="Confirmar contraseña" maxlength="40" required>
                            </div>  
                        </div>    
                        <div class="d-flex justify-content-end">
                            <!-- <button type="button" class="btn btn-secundario w-100">Guardar cambios</button> -->
                            <input type="submit" value="Guardar Cambios" id="submitUpdate" name="submitUpdate" class="btn btn-secundario w-100">
                        </div>
                    </form>
                </div>
            </div>        
        </div>
        
    </div>

</body>
</html>