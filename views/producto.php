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

    <div class="container-fluid contenedor-pagina">

        <div class="informacion-producto">
            <h5 class="text-secondary">Tecnologia</h5>
            <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
            <div class="d-flex justify-content-between align-items-end precio-calificacion">
                <h2 class="precio-producto">$12999.99</h2>
                <h5><i class="bi bi-star-fill color-secundario me-2"></i>4.9</h5>
            </div>
        </div>

    </div>

    <div class="modulo-producto">
        <div id="carouselProducto" class="carousel slide carousel-fade ">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="muestra-multimedia muestra-multimedia1">
                        <video src="../img/video-producto.mp4" autoplay controls muted loop></video>
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
                <div class="thumbnail-multimedia" data-bs-target="#carouselProducto" data-bs-slide-to="0"></div>
                <div class="thumbnail-multimedia" data-bs-target="#carouselProducto" data-bs-slide-to="1"></div>
                <div class="thumbnail-multimedia" data-bs-target="#carouselProducto" data-bs-slide-to="2"></div>
                <div class="thumbnail-multimedia" data-bs-target="#carouselProducto" data-bs-slide-to="3"></div>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        <!-- <h5 class="disponibilidad-producto">Unidades disponibles: <span>65</span> </h5> -->
        <form action="#" id="formAddProductoACarrito" class="modulo-producto" method="post">
            <!-- <div class="d-flex align-items-end gap-3 mb-3">
                <label for="cantidad-producto" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="CantidadAgregar">
            </div> -->
            <div class="botones-producto">
                <button type="submit" class="btn btn-primario d-inline-block rounded-pill mb-3">Agregar al carrito</button>
                <button type="button" class="btn btn-terciario d-inline-block rounded-pill">
                    Agregar a wishlist
                    <i class="bi bi-bookmark ms-3"></i>
                </button>
            </div>
        </form>
        <div class="descripcion-producto modulo-producto">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit, ad incidunt quos earum sed voluptate voluptatibus architecto, possimus cumque quod consequatur quidem laborum expedita fuga quo ipsum facilis. Natus, nostrum.</p>   
        </div>

        <div class="header-comentarios">
            
        </div>
    </div>





            <!-- <div class="hr"></div>

        </div>
        <div class="hr"></div>
            <div class="comentarios-producto">
                <h5 class="fw-bold mb-4">Comentarios</h5>
                <div class="comentario card card-body border-0 bg-blanco">
                    <div class="usuario-comentario d-flex align-items-center gap-3 mb-2">
                        <img src="../img/avatar.svg" width="35" alt="">
                        <div class="">
                            <h6 class="m-0">Mario Fernando Salinas Cavazos</h6>
                            <p class="fecha-comentario text-secondary m-0">05/09/2023 11:20</p>
                        </div>
                    </div>
                    <p class="comentario-texto m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, recusandae commodi tenetur sint quo, minus quam minima officiis aspernatur accusamus perferendis est at itaque ea vel, nam asperiores voluptatem consequatur.</p>
                </div>
            </div>
        </div> -->


    <script src="../js/producto.js"></script>
</body>
</html>