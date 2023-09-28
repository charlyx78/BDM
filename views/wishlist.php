<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Wishlist</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>

    <div class="contenedor-pagina">
        <div class="contenedor-titulo-pagina">
            <div class="contenido-titulo-pagina">
                <h2 class="titulo-pagina mb-0">Wishlists</h2>
                <button class="btn btn-primario" data-bs-toggle="modal" data-bs-target="#nuevaWishlistModal">Nueva lista</button>
            </div>
        </div>
    </div>

    <div class="container-fluid">

    <ul class="contenedor-wishlist">
        <li class="wishlist accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item mb-3">
                <div class="accordion-header" id="flush-headingOne">
                    <div class="btn-group contenedor-wishlist-header" role="group" aria-label="acordeon">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Wishlist 1    
                        </button>
                        <button type="button" class="btn btn-sm boton-wishlist" data-bs-toggle="modal" data-bs-target="#nuevaWishlistModal"><i class="bi bi-pencil text-primario fs-5 fw-bold"></i></button>
                        <button type="button" class="btn btn-sm boton-wishlist"><i class="bi bi-trash3 text-danger fs-5 fw-bold"></i></button>
                    </div>
                </div>  
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="producto-wishlist mb-2">
                            <div class="imagen-producto-wishlist rounded">
                            </div>
                            <div class="informacion-producto-wishlist">
                                <div class="d-flex flex-column">
                                    <h2>iPhone 14 pro</h2>
                                    <h4>12999.99</h4>
                                </div>
                                <div class="calificacion-producto-wishlist">
                                    <i class="bi bi-star-fill color-oro"></i>
                                    <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                                </div>
                                <!-- <div class="d-flex gap-1 align-items-center mb-1">
                                    <label for="cantidad-producto-wishlist form-label">Cantidad</label>
                                    <input type="number" class="form-control form-control-sm">
                                </div> -->
                                <div class="botones-producto-wishlist">
                                    <button type="button" class="btn btn-sm btn-outline-secundario w-100 mb-1 mb-lg-0">Agregar al carrito</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger w-100">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </li>
    </ul>

        <div class="modal fade" id="nuevaWishlistModal" tabindex="-1" aria-labelledby="nuevaWishlistModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="nuevaWishlistModalLabel">Nueva Wishlist</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" id="formAddWishlist" method="post">
                        <div class="mb-2">
                            <label for="nombreWishlist" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombreWishlist" id="nombreWishlist">
                        </div>
                        <div class="mb-2">
                            <label for="descripcionWishlist" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="descripcionWishlist" id="descripcionWishlist" rows="5"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="imagenWishlist" class="form-label">Imagen</label>
                            <input type="file" accept=".jpg,.png,.jpeg" id="imagenWishlist" class="form-control">
                        </div>
                        <div class="mb-4 d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="privacidadWishlist">
                                <label class="form-check-label" for="privacidadWishlist">
                                    Publica
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="privacidadWishlist">
                                <label class="form-check-label" for="privacidadWishlist">
                                    Privada
                                </label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <input type="submit" class="btn btn-primario w-100" value="Guardar">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="descripcionWishlistModal" tabindex="-1" aria-labelledby="descripcionWishlistModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="descripcionWishlistModalLabel">Descripcion Wishlist</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam culpa nesciunt voluptates, voluptate sint fugiat nisi? Ullam, enim sint soluta consequuntur molestias nam? Eum amet quod beatae autem! Voluptates, ab!</p>
                </div>
                </div>
            </div>
        </div>


    </div>
    <script src="../js/wishlist.js"></script>
</body>
</html>