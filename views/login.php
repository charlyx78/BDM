<!DOCTYPE html>
<html lang="es_mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php  include_once "estilos.php" ?>
</head>
<body>
    <div class="contenedor-login">
        <div class="contenedor-hero-login">
            <div class="contenido-hero-login">
                <div class="logo">
                    <h2>LYNX</h2>
                </div>
                <div class="eslogan">
                    <ul>
                        <li><h3>Vision</h3></li>
                        <li><h3>Elegancia</h3></li>
                        <li><h3>Calidad</h3></li>
                    </ul>
                </div>
                <h1 class="texto-hero-login">La tienda online con más prestigio de México</h1>
            </div>
        </div>
        <div class="contenedor-formulario-login">
            <form action="#" id="formLogin" method="post">

                <h2>Iniciar Sesion</h2>

                <label for="username" class="col-form-label">Nombre de usuario: </label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario" maxlength="70" required>

                <label for="password" class="col-form-label">Contraseña: </label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" maxlength="40" required>

                <button class="btn btn-primary" role="button" type="submit" >Iniciar Sesion</button>
                <label for="">No te has registrado hacer clic <a href="/views/signup.php">aquí</a></label>

            </form>
        </div>
    </div>

    <script src="/js/login.js"></script>
</body>
</html>