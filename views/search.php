<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Busqueda</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>

    <div class="contenedor-pagina">
        <div class="contenedor-titulo-pagina">
            <div class="contenido-titulo-pagina">
                <h2 class="titulo-pagina mb-0">Busqueda de: iPhone 14</h2>
                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltros" aria-expanded="false" aria-controls="collapseFiltros"><i class="bi bi-sliders fs-5"></i></button>
            </div>
        </div>

        <div class="container-fluid filtros-busqueda mb-5 collapse" id="collapseFiltros">
            <form action="">
                <div class="row">
                    <div class="mb-2 col-12 col-lg-6">
                        <label for="nombreProducto" class="form-label">Nombre del producto</label>
                        <input type="number" name="nombreProducto" class="form-control">
                    </div>
                    <div class="mb-2 col-12 col-lg-6">
                        <label for="nombreVendedor" class="form-label">Nombre del vendedor</label>
                        <input type="number" name="nombreVendedor" class="form-control">
                    </div>
                    <div class="mb-2 col-6 col-lg-3">
                        <label for="precioMinimo" class="form-label">Precio minimo</label>
                        <input type="number" name="precioMinimo" class="form-control">
                    </div>
                    <div class="mb-2 col-6 col-lg-3">
                        <label for="precioMaximo" class="form-label">Precio maximo</label>
                        <input type="number" name="precioMaximo" class="form-control">
                    </div>
                    <div class="mb-2 col-6 col-lg-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="masVendidos">
                            <label class="form-check-label" for="masVendidos">
                                Mas vendidos
                            </label>
                        </div>
                    </div>
                    <div class="mb-2 col-6 col-lg-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="mejorCalificados">
                            <label class="form-check-label" for="mejorCalificados">
                                Mejor calificados
                            </label>
                        </div>
                    </div>
                    <div class="mb-2 mt-1 w-100">
                        <button class="btn btn-primario w-100" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>

        <ul class="contenedor-productos-busqueda">
            <li class="producto-busqueda-item">
                <a class="producto-busqueda" href="producto.php">
                    <div class="imagen-producto-busqueda">
                    </div>
                    <div class="informacion-producto-busqueda">
                        <h6 class="text-secondary">Smarthphones</h6>
                        <h2>iPhone 14 pro</h2>
                        <h4>12999.99</h4>
                        <div class="calificacion-producto-busqueda">
                            <i class="bi bi-star-fill color-oro"></i>
                            <p class="m-0 text-secondary">4.5 <span>(1523)</span></p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="producto-busqueda-item">
                <a class="producto-busqueda" href="producto.php">
                    <div class="imagen-producto-busqueda">
                    </div>
                    <div class="informacion-producto-busqueda">
                        <h6 class="text-secondary">Smarthphones</h6>
                        <h2>iPhone 14 pro</h2>
                        <h4>12999.99</h4>
                        <div class="calificacion-producto-busqueda">
                            <i class="bi bi-star-fill color-oro"></i>
                            <p class="m-0 text-secondary">4.5 <span>(1523)</span></p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="producto-busqueda-item">
                <a class="producto-busqueda" href="producto.php">
                    <div class="imagen-producto-busqueda">
                    </div>
                    <div class="informacion-producto-busqueda">
                        <h6 class="text-secondary">Smarthphones</h6>
                        <h2>iPhone 14 pro</h2>
                        <h4>12999.99</h4>
                        <div class="calificacion-producto-busqueda">
                            <i class="bi bi-star-fill color-oro"></i>
                            <p class="m-0 text-secondary">4.5 <span>(1523)</span></p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="producto-busqueda-item">
                <a class="producto-busqueda" href="producto.php">
                    <div class="imagen-producto-busqueda">
                    </div>
                    <div class="informacion-producto-busqueda">
                        <h6 class="text-secondary">Smarthphones</h6>
                        <h2>iPhone 14 pro</h2>
                        <h4>12999.99</h4>
                        <div class="calificacion-producto-busqueda">
                            <i class="bi bi-star-fill color-oro"></i>
                            <p class="m-0 text-secondary">4.5 <span>(1523)</span></p>
                        </div>
                    </div>
                </a>
            </li>     
        </ul>


    </div>


</body>
</html>