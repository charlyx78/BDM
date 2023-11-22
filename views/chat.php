<?php
session_start();
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

    <div class="contenedor-pagina-chat">
        <ul class="contactos list-group d-none d-lg-block" id="contactos">
        </ul>
        <div class="contenedor-chat">
            <div class="contenido-chat">
                <div class="contacto">
                    <div class="d-flex gap-4 align-items-center">
                        <a href="contactos.php">
                            <i class="bi bi-chevron-left fw-bold"></i>  
                        </a>
                        <img src="../img/avatar.svg" alt="">
                        <a href="account.php" id="linkContacto"><h2 class="m-0" id="headContacto"></h2><span class="fs-6 text-secondary" id="headProducto"></span></a>
                    </div>
                    <div class="btn btn-outline-dark rounded-circle" id="btnAbrirModalProducto" data-bs-toggle="modal" data-bs-target="#productoModal">
                        <i class="bi bi-box fs-4"></i>
                    </div>     
                </div>
                <div class="contenedor-mensajes position-relative">
                    <button class="btn position-fixed bottom-0" style="margin-bottom: 5em;" id="btnScroll"><i class="bi bi-arrow-down-circle-fill fs-2"></i></button>
                    <div id="mensajes"></div>
                    <!-- <div class="mensaje"><div class="rounded-pill mensaje-local rounded">Hola</div></div>
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
                    <div class="mensaje"><div class="rounded-pill mensaje-remoto rounded">Que onda</div></div> -->
                </div>
                <div class="contenedor-input-mensaje">
                    <form action="" id="formMensaje" class="d-flex gap-2">
                        <input type="text" name="mensaje" class="form-control" id="txtMensaje" placeholder="Escribe tu mensaje aqui..."></textarea>
                        <button type="submit" class="btn btn-primario"><i class="bi bi-send-fill text-light"></i></button>
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
                        <div class="imagen-producto" id="imagenProducto"></div>
                        <div class="informacion-producto">
                            <h4 class="text-secondary" id="categoriaProducto">Smartphones</h4>
                            <h2 id="nombreProducto">iPhone 14 Pro 128GB 4GB RAM</h2>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" id="formGenerarProducto" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="precioProducto" class="form-label">Establecer precio</label>
                            <input type="number" id="precioProducto" class="form-control mb-4">
                            <button type="submit" class="btn btn-primario">Enviar producto</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/chats.js"></script>

</body>
</html>