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

    <main class="container py-4">
        <h2 class="titulo-pagina">
            Wishlist
            <button class="btn btn-primario" data-bs-toggle="modal" data-bs-target="#nuevaWishlistModal">Nueva lista</button>
        </h2>

        <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed bg-blanco contenedor-wishlist-header" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <div class=""><p class="me-5 mb-0">Wishlist de la casa de los famosos</p> </div>   
                        <div class="ms-auto me-0 contenedor-botones-wishlist">
                            <a href="#" class="btn btn-primario btn-sm boton-wishlist" data-bs-toggle="modal" data-bs-target="#descripcionWishlistModal">Ver descripcion</a>
                            <a href="#" class="btn btn-primario btn-sm boton-wishlist" data-bs-toggle="modal" data-bs-target="#nuevaWishlistModal">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm boton-wishlist" data-bs-toggle="modal" data-bs-target="#nuevaWishlistModal">Eliminar</a>
                        </div>             
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="producto-wishlist card card-body mb-2">
                            <div class="imagen-producto-wishlist rounded">
                            </div>
                            <div class="informacion-producto-wishlist">
                                <div class="d-flex flex-column">
                                    <h4>iPhone 14 pro</h4>
                                    <h5>12999.99</h5>
                                </div>
                                <div class="calificacion-producto-wishlist">
                                    <i class="bi bi-star-fill color-oro"></i>
                                    <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                                </div>
                                <div class="d-flex gap-1 align-items-center mb-1">
                                    <label for="cantidad-producto-wishlist form-label">Cantidad</label>
                                    <input type="number" class="form-control form-control-sm">
                                </div>
                                <div class="d-lg-flex gap-2">
                                    <button type="button" class="btn btn-primario btn-sm w-100 mb-1 mb-lg-0">Agregar al carrito</button>
                                    <button type="button" class="btn btn-danger btn-sm w-100">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <label for="descripcionWishlist" class="form-label">Wishlist</label>
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


    </main>
    <script src="../js/wishlist.js"></script>
</body>
</html>