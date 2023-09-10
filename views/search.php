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
        <h2 class="titulo-pagina">Busqueda de: iPhone</h2>
        <h5 class="fw-bold">Filtros</h5>
        <div class="card card-body filtros-busqueda mb-3">
            <form action="">
                <div class="row">
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

        <div class="contenedor-productos-carrito">
                <a class="producto-carrito card" href="producto.php">
                    <div class="imagen-producto-carrito rounded">
                    </div>
                    <div class="informacion-producto-carrito">
                        <h4>iPhone 14 pro</h4>
                        <h5>12999.99</h5>
                    </div>
                </a>
            </div>

    </main>

</body>
</html>