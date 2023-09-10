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

    <main class="container py-4">
        <div id="carouselExample" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <h2 class="titulo-pagina">Mensajes</h2>
                    <ul class="list-group">
                        <li class="list-group-item py-3">
                            <a class="contacto" data-bs-target="#carouselExample" data-bs-slide="next">
                                <img src="../img/avatar.svg" width="40" alt="">
                                <div class="informacion-perfil-mensaje">
                                    <h5>Mario Salinas</h5>
                                    <p class="m-0 text-secondary text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iusto alias praesentium distinctio dolorem commodi voluptate laborum dolores nostrum aliquid, tempore harum. Quidem optio accusantium facilis eligendi debitis placeat consequatur.</p>
                                </div>                      
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="carousel-item">
                    <div class="card contenedor-chat">
                        <div class="card-header contacto">
                            <a data-bs-target="#carouselExample" data-bs-slide="previous">
                                <i class="bi bi-chevron-left fw-bold"></i>  
                            </a>
                            <img src="../img/avatar.svg" width="50" alt="">
                            <h5>Mario Salinas</h5>
                        </div>
                        <div class="card-body contenedor-mensajes">
                            <div class="producto-carrito card">
                                <div class="imagen-producto-carrito rounded">
                                </div>
                                <div class="informacion-producto-carrito">
                                    <h4>iPhone 14 pro</h4>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex gap-1 align-items-center">
                                            <form action="">
                                                <label for="cantidad-producto-carrito form-label">Establecer precio</label>
                                                <input type="number" class="form-control mb-2">
                                                <button class="btn btn-primario w-100" type="submit">Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr"></div>
                            <div class="mensaje"><div class="mensaje-local rounded">Hola</div></div>
                            <div class="mensaje"><div class="mensaje-remoto rounded">Que onda</div></div>
                            <div class="mensaje"><div class="mensaje-local rounded">Hola</div></div>
                            <div class="mensaje"><div class="mensaje-remoto rounded">Que onda</div></div>
                            <div class="mensaje"><div class="mensaje-local rounded">Hola</div></div>
                            <div class="mensaje"><div class="mensaje-remoto rounded">Que onda</div></div>
                            <div class="mensaje"><div class="mensaje-local rounded">Hola</div></div>
                            <div class="mensaje"><div class="mensaje-remoto rounded">Que onda</div></div>
                            <div class="mensaje"><div class="mensaje-local rounded">Hola</div></div>
                            <div class="mensaje"><div class="mensaje-remoto rounded">Que onda</div></div>
                            <div class="mensaje"><div class="mensaje-local rounded">Hola</div></div>
                            <div class="mensaje"><div class="mensaje-remoto rounded">Que onda</div></div>
                            <div class="mensaje"><div class="mensaje-local rounded">Hola</div></div>
                            <div class="mensaje"><div class="mensaje-remoto rounded">Que onda</div></div>

                        </div>
                        <div class="card-footer">
                            <form action="" class="d-flex gap-2">
                                <textarea name="mensaje" class="form-control" rows="1" placeholder="Escribe tu mensaje aqui..."></textarea>
                                <button type="button" class="btn btn-primario"><i class="bi bi-send-fill text-light"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>