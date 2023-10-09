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

    <div class="contenedor-pagina-chat">
        <ul class="contactos list-group d-none d-lg-block">
            <div class="contenedor-titulo-pagina">
                <div class="contenido-titulo-pagina">
                    <h2 class="titulo-pagina mb-3">Contactos</h2>
                </div>   
                <form action="">
                    <input type="text" class="form-control" placeholder="Buscar contacto...">
                </form>       
            </div>
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
        <div class="contenedor-chat">
            <div class="contenido-chat">
                <div class="contacto">
                    <div class="d-flex gap-4 align-items-center">
                        <a href="contactos.php">
                            <i class="bi bi-chevron-left fw-bold"></i>  
                        </a>
                        <img src="../img/avatar.svg" alt="">
                        <a href="account.php"><h2>Mario Salinas</h2></a>
                    </div>
                    <div class="btn btn-outline-dark rounded-circle" data-bs-toggle="modal" data-bs-target="#productoModal">
                        <i class="bi bi-box fs-4"></i>
                    </div>     
                </div>
                <div class="contenedor-mensajes">
                    <div class="mensaje"><div class="rounded-pill mensaje-local rounded">Hola</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-remoto rounded">Que onda</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-local rounded">Hola</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-remoto rounded">Que onda</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-local rounded">Hola</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-remoto rounded">Que onda</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-local rounded">Hola</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-remoto rounded">Que onda</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-local rounded">Hola</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-remoto rounded">Que onda</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-local rounded">Hola</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-remoto rounded">Que onda</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-local rounded">Hola</div></div>
                    <div class="mensaje"><div class="rounded-pill mensaje-remoto rounded">Que onda</div></div>
                </div>
                <div class="contenedor-input-mensaje">
                    <form action="" class="d-flex gap-2">
                        <textarea name="mensaje" class="form-control" rows="1" placeholder="Escribe tu mensaje aqui..."></textarea>
                        <button type="button" class="btn btn-primario"><i class="bi bi-send-fill text-light"></i></button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    
    <div class="modal fade" id="productoModal" tabindex="-1" aria-labelledby="productoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="producto">
                        <div class="imagen-producto"></div>
                        <div class="informacion-producto">
                            <h4 class="text-secondary">Smartphones</h4>
                            <h2>iPhone 14 Pro 128GB 4GB RAM</h2>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="precioProducto" class="form-label">Establecer precio</label>
                            <input type="number" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primario">Enviar producto</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>