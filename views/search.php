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
    <main class="container py-4">
        <h2 class="titulo-pagina">Resultados de busqueda de: iPhone</h2>
        <h5 class="fw-bold">Filtros</h5>
        <div class="card card-body filtros-busqueda mb-5">
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

        <div class="contenedor-productos-busqueda">
            <a class="producto-busqueda card card-body" href="producto.php">
                <div class="imagen-producto-busqueda rounded">
                </div>
                <div class="informacion-producto-busqueda">
                    <h4>iPhone 14 pro</h4>
                    <h5>12999.99</h5>
                    <div class="calificacion-producto-busqueda">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                </div>
            </a>
            <a class="producto-busqueda card card-body" href="producto.php">
                <div class="imagen-producto-busqueda rounded">
                </div>
                <div class="informacion-producto-busqueda">
                    <h4>iPhone 14 pro</h4>
                    <h5>12999.99</h5>
                    <div class="calificacion-producto-busqueda">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                </div>
            </a>
            <a class="producto-busqueda card card-body" href="producto.php">
                <div class="imagen-producto-busqueda rounded">
                </div>
                <div class="informacion-producto-busqueda">
                    <h4>iPhone 14 pro</h4>
                    <h5>12999.99</h5>
                    <div class="calificacion-producto-busqueda">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                </div>
            </a>
            <a class="producto-busqueda card card-body" href="producto.php">
                <div class="imagen-producto-busqueda rounded">
                </div>
                <div class="informacion-producto-busqueda">
                    <h4>iPhone 14 pro</h4>
                    <h5>12999.99</h5>
                    <div class="calificacion-producto-busqueda">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                </div>
            </a>
            <a class="producto-busqueda card card-body" href="producto.php">
                <div class="imagen-producto-busqueda rounded">
                </div>
                <div class="informacion-producto-busqueda">
                    <h4>iPhone 14 pro</h4>
                    <h5>12999.99</h5>
                    <div class="calificacion-producto-busqueda">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                </div>
            </a>
            <a class="producto-busqueda card card-body" href="producto.php">
                <div class="imagen-producto-busqueda rounded">
                </div>
                <div class="informacion-producto-busqueda">
                    <h4>iPhone 14 pro</h4>
                    <h5>12999.99</h5>
                    <div class="calificacion-producto-busqueda">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                </div>
            </a>
            <a class="producto-busqueda card card-body" href="producto.php">
                <div class="imagen-producto-busqueda rounded">
                </div>
                <div class="informacion-producto-busqueda">
                    <h4>iPhone 14 pro</h4>
                    <h5>12999.99</h5>
                    <div class="calificacion-producto-busqueda">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                </div>
            </a>
            <a class="producto-busqueda card card-body" href="producto.php">
                <div class="imagen-producto-busqueda rounded">
                </div>
                <div class="informacion-producto-busqueda">
                    <h4>iPhone 14 pro</h4>
                    <h5>12999.99</h5>
                    <div class="calificacion-producto-busqueda">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                </div>
            </a>
            <a class="producto-busqueda card card-body" href="producto.php">
                <div class="imagen-producto-busqueda rounded">
                </div>
                <div class="informacion-producto-busqueda">
                    <h4>iPhone 14 pro</h4>
                    <h5>12999.99</h5>
                    <div class="calificacion-producto-busqueda">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                </div>
            </a>
            <a class="producto-busqueda card card-body" href="producto.php">
                <div class="imagen-producto-busqueda rounded">
                </div>
                <div class="informacion-producto-busqueda">
                    <h4>iPhone 14 pro</h4>
                    <h5>12999.99</h5>
                    <div class="calificacion-producto-busqueda">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                </div>
            </a>
        </div>

    </main>

</body>
</html>