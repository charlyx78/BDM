<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Contactos</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>
    
    <div class="container-fluid contenedor-pagina">
        <h2 class="titulo-pagina mb-0">
            <div>Contactos</div>
            <div>
                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBusqueda" aria-expanded="false" aria-controls="collapseBusqueda"><i class="bi bi-search fs-5"></i></button>
            </div>
        </h2>
        <div class="collapse" id="collapseBusqueda">
            <form action="">
                <input type="text" class="form-control" placeholder="Buscar contacto...">
            </form>
        </div>

        <ul class="contactos list-group">
            <li class="contacto-item list-group-item">
                <a href="chat.php" class="contacto">
                    <div class="imagen-contacto">
                    </div>
                    <div class="informacion-contacto">
                        <h2>Mario Salinas</h2>
                        <p class="m-0 text-secondary text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore impedit eligendi beatae esse nisi, provident nobis neque animi nesciunt architecto ullam recusandae eveniet harum voluptates sed blanditiis consequatur. Maxime, quaerat!</p>
                    </div>
                </a>
            </li>
            <li class="contacto-item list-group-item">
                <a href="chat.php" class="contacto">
                    <div class="imagen-contacto">
                    </div>
                    <div class="informacion-contacto">
                        <h2>Mario Salinas</h2>
                        <p class="m-0 text-secondary text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore impedit eligendi beatae esse nisi, provident nobis neque animi nesciunt architecto ullam recusandae eveniet harum voluptates sed blanditiis consequatur. Maxime, quaerat!</p>
                    </div>
                </a>
            </li>
            <li class="contacto-item list-group-item">
                <a href="chat.php" class="contacto">
                    <div class="imagen-contacto">
                    </div>
                    <div class="informacion-contacto">
                        <h2>Mario Salinas</h2>
                        <p class="m-0 text-secondary text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore impedit eligendi beatae esse nisi, provident nobis neque animi nesciunt architecto ullam recusandae eveniet harum voluptates sed blanditiis consequatur. Maxime, quaerat!</p>
                    </div>
                </a>
            </li>

        </ul>
    </div>

    <?php include_once "footer.php" ?> 
</body>
</html>