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

    <div class="contenedor-loader" id="loader">
        <div class="spinner-grow" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div class="contenedor-pagina container-fluid">
        <div class="contenedor-producto">
            <div class="contenedor-info-producto">
                <div class="informacion-producto">
                    <h5 class="text-secondary" id="categoriaProducto">Smarthphones</h5>
                    <h2 class="nombre-producto" id="nombreProducto">iPhone 14 Pro 128GB 4GB RAM</h2>
                    <div class="d-flex justify-content-between align-items-end precio-calificacion">
                        <h2 class="precio-producto" id="precioProducto">$12999.99</h2>
                        <h5><i class="bi bi-star-fill color-secundario me-2"></i><span id="valoracionProducto"></span></h5>
                    </div>
                </div>
                <div class="d-none d-lg-block">
                    <!-- <h5 class="disponibilidad-producto">Unidades disponibles: <span>65</span> </h5> -->
                    <form action="#" id="formAddProductoACarrito" class="modulo-producto" method="post">
                        <!-- <div class="d-flex align-items-end gap-3 mb-3">
                            <label for="cantidad-producto" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="CantidadAgregar">
                        </div> -->
                        <div class="botones-producto">
                            <button type="submit" class="btn btn-primario d-inline-block rounded-pill mb-3">Agregar al carrito</button>
                            <button type="button" class="btn btn-terciario d-inline-block rounded-pill" data-bs-toggle="modal" data-bs-target="#wishlistModal">
                                Agregar a wishlist
                                <i class="bi bi-bookmark ms-3"></i>
                            </button>
                        </div>
                    </form>
                    <div class="descripcion-producto modulo-producto">
                        <p class='textoDescProd'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit, ad incidunt quos earum sed voluptate voluptatibus architecto, possimus cumque quod consequatur quidem laborum expedita fuga quo ipsum facilis. Natus, nostrum.</p>   
                    </div>

                    <div class="contenedor-comentarios">
                        <p class="m-0">
                            <a class="header-comentarios" data-bs-toggle="collapse" href="#collapseComentarios" role="button" aria-expanded="false" aria-controls="collapseComentarios">
                                Reseñas (5)
                                <i class="bi bi-chevron-down"></i>

                            </a>
                        </p>
                        <div class="collapse pt-4" id="collapseComentarios">
                            <a class="boton-escribir-comentario" data-bs-toggle="modal" data-bs-target="#comentarioModal">Escribe una reseña</a>
                            <div class="comentario">
                                <div class="titulo-comentario"><h2>Excelente producto</h2></div>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>4.5</h4></div>
                                    <div class="usuario-fecha-comentario">
                                        <h4 class="text-secondary">Mario Salinas</h4>
                                        <h4 class="text-secondary">-</h4>
                                        <h4 class="text-secondary">23/09/2023</h4>
                                    </div>
                                </div>
                                <div class="contenido-comentario"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi numquam molestias reiciendis sit expedita consequuntur voluptate eius velit soluta minus porro sint suscipit alias libero quod, dicta obcaecati at!</p></div>
                            </div>
                            <div class="comentario">
                                <div class="titulo-comentario"><h2>Excelente producto</h2></div>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>4.5</h4></div>
                                    <div class="usuario-fecha-comentario">
                                        <h4 class="text-secondary">Mario Salinas</h4>
                                        <h4 class="text-secondary">-</h4>
                                        <h4 class="text-secondary">23/09/2023</h4>
                                    </div>
                                </div>
                                <div class="contenido-comentario"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi numquam molestias reiciendis sit expedita consequuntur voluptate eius velit soluta minus porro sint suscipit alias libero quod, dicta obcaecati at!</p></div>
                            </div>
                            <div class="comentario">
                                <div class="titulo-comentario"><h2>Excelente producto</h2></div>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>4.5</h4></div>
                                    <div class="usuario-fecha-comentario">
                                        <h4 class="text-secondary">Mario Salinas</h4>
                                        <h4 class="text-secondary">-</h4>
                                        <h4 class="text-secondary">23/09/2023</h4>
                                    </div>
                                </div>
                                <div class="contenido-comentario"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi numquam molestias reiciendis sit expedita consequuntur voluptate eius velit soluta minus porro sint suscipit alias libero quod, dicta obcaecati at!</p></div>
                            </div>
                            <div class="comentario">
                                <div class="titulo-comentario"><h2>Excelente producto</h2></div>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>4.5</h4></div>
                                    <div class="usuario-fecha-comentario">
                                        <h4 class="text-secondary">Mario Salinas</h4>
                                        <h4 class="text-secondary">-</h4>
                                        <h4 class="text-secondary">23/09/2023</h4>
                                    </div>
                                </div>
                                <div class="contenido-comentario"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi numquam molestias reiciendis sit expedita consequuntur voluptate eius velit soluta minus porro sint suscipit alias libero quod, dicta obcaecati at!</p></div>
                            </div>
                            <div class="comentario">
                                <div class="titulo-comentario"><h2>Excelente producto</h2></div>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>4.5</h4></div>
                                    <div class="usuario-fecha-comentario">
                                        <h4 class="text-secondary">Mario Salinas</h4>
                                        <h4 class="text-secondary">-</h4>
                                        <h4 class="text-secondary">23/09/2023</h4>
                                    </div>
                                </div>
                                <div class="contenido-comentario"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi numquam molestias reiciendis sit expedita consequuntur voluptate eius velit soluta minus porro sint suscipit alias libero quod, dicta obcaecati at!</p></div>
                            </div>
                        </div>         
                    </div>
                </div>
            </div>
            <div class="contenedor-multimedia-producto">
                <div class="modulo-producto">
                    <div id="carouselProducto" class="carousel slide carousel-fade ">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="muestra-multimedia muestra-multimedia1">
                                    <video src="../img/video-producto.mp4" id="videoProducto" autoplay controls muted loop></video>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="muestra-multimedia muestra-multimedia2"></div>
                            </div>
                            <div class="carousel-item">
                                <div class="muestra-multimedia muestra-multimedia3"></div>
                            </div>
                            <div class="carousel-item">
                                <div class="muestra-multimedia muestra-multimedia4"></div>
                            </div>
                        </div>
                    </div>
                    <div class="contenedor-thumbnails-productos">
                        <div class="contenido-thumbnails-productos">
                            <div class="thumbnail-multimedia thumbnail-multimedia1" data-bs-target="#carouselProducto" data-bs-slide-to="0"></div>
                            <div class="thumbnail-multimedia thumbnail-multimedia2" data-bs-target="#carouselProducto" data-bs-slide-to="1"></div>
                            <div class="thumbnail-multimedia thumbnail-multimedia3" data-bs-target="#carouselProducto" data-bs-slide-to="2"></div>
                            <div class="thumbnail-multimedia thumbnail-multimedia4" data-bs-target="#carouselProducto" data-bs-slide-to="3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid contenedor-info-producto2 d-block d-lg-none">
                <!-- <h5 class="disponibilidad-producto">Unidades disponibles: <span>65</span> </h5> -->
                <form action="#" id="formAddProductoACarrito" class="modulo-producto" method="post">
                    <!-- <div class="d-flex align-items-end gap-3 mb-3">
                        <label for="cantidad-producto" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="CantidadAgregar">
                    </div> -->
                    <div class="botones-producto">
                        <button type="submit" class="btn btn-primario d-inline-block rounded-pill mb-3">Agregar al carrito</button>
                        <button type="button" class="btn btn-terciario d-inline-block rounded-pill" data-bs-toggle="modal" data-bs-target="#wishlistModal">
                            Agregar a wishlist
                            <i class="bi bi-bookmark ms-3"></i>
                        </button>
                    </div>
                </form>
                <div class="descripcion-producto modulo-producto">
                    <p class='textoDescProd'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit, ad incidunt quos earum sed voluptate voluptatibus architecto, possimus cumque quod consequatur quidem laborum expedita fuga quo ipsum facilis. Natus, nostrum.</p>   
                </div>

                <div class="contenedor-comentarios">
                    <p class="m-0">
                        <a class="header-comentarios" id="headerComentarios" data-bs-toggle="collapse" href="#collapseComentarios" role="button" aria-expanded="false" aria-controls="collapseComentarios">
                            Reseñas (5) 
                            <i class="bi bi-chevron-down" id="iconoChevron"></i>
                        </a>
                    </p>
                    <div class="collapse pt-4" id="collapseComentarios">
                        <a class="boton-escribir-comentario" data-bs-toggle="modal" data-bs-target="#comentarioModal">Escribe una reseña</a>
                        <div class="comentario">
                            <div class="titulo-comentario"><h2>Excelente producto</h2></div>
                            <div class="d-flex align-items-center gap-4">
                                <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>4.5</h4></div>
                                <div class="usuario-fecha-comentario">
                                    <h4 class="text-secondary">Mario Salinas</h4>
                                    <h4 class="text-secondary">-</h4>
                                    <h4 class="text-secondary">23/09/2023</h4>
                                </div>
                            </div>
                            <div class="contenido-comentario"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi numquam molestias reiciendis sit expedita consequuntur voluptate eius velit soluta minus porro sint suscipit alias libero quod, dicta obcaecati at!</p></div>
                        </div>
                        <div class="comentario">
                            <div class="titulo-comentario"><h2>Excelente producto</h2></div>
                            <div class="d-flex align-items-center gap-4">
                                <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>4.5</h4></div>
                                <div class="usuario-fecha-comentario">
                                    <h4 class="text-secondary">Mario Salinas</h4>
                                    <h4 class="text-secondary">-</h4>
                                    <h4 class="text-secondary">23/09/2023</h4>
                                </div>
                            </div>
                            <div class="contenido-comentario"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi numquam molestias reiciendis sit expedita consequuntur voluptate eius velit soluta minus porro sint suscipit alias libero quod, dicta obcaecati at!</p></div>
                        </div>
                        <div class="comentario">
                            <div class="titulo-comentario"><h2>Excelente producto</h2></div>
                            <div class="d-flex align-items-center gap-4">
                                <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>4.5</h4></div>
                                <div class="usuario-fecha-comentario">
                                    <h4 class="text-secondary">Mario Salinas</h4>
                                    <h4 class="text-secondary">-</h4>
                                    <h4 class="text-secondary">23/09/2023</h4>
                                </div>
                            </div>
                            <div class="contenido-comentario"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi numquam molestias reiciendis sit expedita consequuntur voluptate eius velit soluta minus porro sint suscipit alias libero quod, dicta obcaecati at!</p></div>
                        </div>
                        <div class="comentario">
                            <div class="titulo-comentario"><h2>Excelente producto</h2></div>
                            <div class="d-flex align-items-center gap-4">
                                <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>4.5</h4></div>
                                <div class="usuario-fecha-comentario">
                                    <h4 class="text-secondary">Mario Salinas</h4>
                                    <h4 class="text-secondary">-</h4>
                                    <h4 class="text-secondary">23/09/2023</h4>
                                </div>
                            </div>
                            <div class="contenido-comentario"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi numquam molestias reiciendis sit expedita consequuntur voluptate eius velit soluta minus porro sint suscipit alias libero quod, dicta obcaecati at!</p></div>
                        </div>
                        <div class="comentario">
                            <div class="titulo-comentario"><h2>Excelente producto</h2></div>
                            <div class="d-flex align-items-center gap-4">
                                <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>4.5</h4></div>
                                <div class="usuario-fecha-comentario">
                                    <h4 class="text-secondary">Mario Salinas</h4>
                                    <h4 class="text-secondary">-</h4>
                                    <h4 class="text-secondary">23/09/2023</h4>
                                </div>
                            </div>
                            <div class="contenido-comentario"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi numquam molestias reiciendis sit expedita consequuntur voluptate eius velit soluta minus porro sint suscipit alias libero quod, dicta obcaecati at!</p></div>
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="comentarioModal" tabindex="-1" aria-labelledby="comentarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="comentarioModalLabel">Escribe una reseña</h1>
                    <button class="btn"><i class="bi bi-x-circle-fill text-danger" data-bs-dismiss="modal" aria-label="Close"></i></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="tituloComentario" class="form-label">Titulo</label>
                            <input type="text" name="tituloComentario" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="contenidoComentario" class="form-label">Comentario</label>
                            <textarea name="contenidoComentario" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="star-input" class="form-label m-0">Calificacion</label>
                            <div class="star-rating">
                                <input class="radio-input" type="radio" id="star5" name="star-input" value="5" />
                                <label class="radio-label" class for="star5" title="5 stars">5 stars</label>
                                <input class="radio-input" type="radio" id="star4" name="star-input" value="4" />
                                <label class="radio-label" for="star4" title="4 stars">4 stars</label>
                                <input class="radio-input" type="radio" id="star3" name="star-input" value="3" />
                                <label class="radio-label" for="star3" title="3 stars">3 stars</label>
                                <input class="radio-input" type="radio" id="star2" name="star-input" value="2" />
                                <label class="radio-label" for="star2" title="2 stars">2 stars</label>
                                <input class="radio-input" type="radio" id="star1" name="star-input" value="1" />
                                <label class="radio-label" for="star1" title="1 star">1 star</label>
                            </div>
                        </div>                  
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primario">Publicar comentario</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="wishlistModal" tabindex="-1" aria-labelledby="wishlistModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="wishlistModalLabel">Agregar a wishlist</h1>
                    <button class="btn"><i class="bi bi-x-circle-fill text-danger" data-bs-dismiss="modal" aria-label="Close"></i></button>
                </div>
                <div class="modal-body">
                    <form action="" id="formAddProductoWishlist">
                        <div class="mb-3">
                            <label for="wishlist" class="form-label">Wishlist</label>
                            <select name="wishlist" class="form-select" id="wishlist"></select>
                        </div>
                        <button type="submit" class="btn btn-secundario">Agregar a la wishlist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "footer.php" ?>

    <!-- Jquery -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/producto.js"></script>
</body>
</html>