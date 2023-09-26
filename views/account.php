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
                        <h3 class="m-0 fw-bold">Carlos Ruiz</h3>
                        <h5 class="m-0">Comprador</h5>
                    </div>
                </div>
            </div>
            <div class="contenedor-formulario-perfil">
                <div class="container-fluid">
                    <form action="#" id="formSignup" method="post">
                        <div class="mb-2 row">
                            <div class="col">
                                <label for="names" class="col-form-label">Nombre (s): </label>
                                <input type="text" class="form-control" name="names" id="names" placeholder="Nombre (s)" maxlength="70" required>
                            </div>
                            <div class="col">
                                <label for="lastnames" class="col-form-label">Apellidos: </label>
                                <input type="text" class="form-control" name="lastnames" id="lastnames" placeholder="Apellidos"  maxlength="70" required>
                            </div>       
                        </div>
                        <div class="mb-2 row">
                            <div class="col">
                                <label for="birthdate" class="col-form-label">Fecha de nacimiento: </label>
                                <input type="date" class="form-control" name="birthdate" id="birthdate" required>
                            </div>
                            <div class="col">
                                <label for="sex" class="col-form-label">Sexo: </label>
                                <select name="sex" id="sex" class="form-control">
                                    <option value="">Hombre</option>
                                    <option value="">Mujer</option>
                                    <option value="">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="username" class="col-form-label">Nombre de usuario: </label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario"  maxlength="70" required>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="col-form-label">Correo: </label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo"  maxlength="40" disabled>
                        </div>
                        <div class="mb-5 row">
                            <div class="col">
                                <label for="password" class="col-form-label">Contraseña: </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" maxlength="40" required>
                            </div>
                            <div class="col">
                                <label for="confirmpassword" class="col-form-label">Confirmar contraseña: </label>
                                <input type="password" class="form-control" name="confirmpassword" id="password" placeholder="Confirmar contraseña" maxlength="40" required>
                            </div>  
                        </div>    
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secundario w-100">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
        
    </div>

</body>
</html>