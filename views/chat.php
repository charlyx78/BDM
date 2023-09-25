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
        <div class="contenedor-chat">
            <div class="contacto">
                <div class="d-flex gap-3 align-items-center">
                    <a href="contactos.php">
                        <i class="bi bi-chevron-left fw-bold"></i>  
                    </a>
                    <img src="../img/avatar.svg" width="40" alt="">
                    <a href="account.php"><h2>Mario Salinas</h2></a>
                </div>
                <div class="btn btn-outline-dark rounded-circle" data-bs-toggle="modal" data-bs-target="#productoModal">
                    <i class="bi bi-box fs-4"></i>
                </div>     
            </div>
            <div class="contenedor-mensajes">
                <!-- <div class="producto-carrito card">
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
                </div> -->
                    <!-- <div class="hr"></div> -->
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
            <div class="contenedor-input-mensaje">
                <form action="" class="d-flex gap-2">
                    <textarea name="mensaje" class="form-control" rows="1" placeholder="Escribe tu mensaje aqui..."></textarea>
                    <button type="button" class="btn btn-primario"><i class="bi bi-send-fill text-light"></i></button>
                </form>
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