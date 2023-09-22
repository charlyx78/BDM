<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Ventas</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>

    <main class="container py-4">
        <h2 class="titulo-pagina">Mis Ventas</h2>

        <h5 class="fw-bold">Filtros</h5>
        <div class="card card-body filtros-busqueda mb-5">
            <form action="">
                <div class="row">
                    <div class="mb-2 col-6 col-lg-4">
                        <label for="fechaPedido" class="form-label">Fecha</label>
                        <input type="date" name="fechaPedido" class="form-control">
                    </div>
                    <div class="mb-2 col-6 col-lg-4">
                        <label for="categoriaPedido" class="form-label">Categoria</label>
                        <select name="categoriaPedido" id="" class="form-select">
                            <option value="">Selecciona una opcion...</option>
                            <option value="">Tecnologia</option>
                            <option value="">Moda</option>
                            <option value="">Belleza</option>
                        </select>                    
                    </div>
                    <div class="mb-4 col-6 col-lg-4">
                        <label for="nombreProducto" class="form-label">Nombre de producto</label>
                        <input type="text" name="nombreProducto" class="form-control">
                    </div>
                    <div class="mb-2 col-12">
                        <input type="submit" class="btn btn-primario w-100" value="Buscar">
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Fecha</td>
                    <td>Categoria</td>
                    <td>Producto</td>
                    <td>Calificacion</td>
                    <td>Precio</td>
                    <td>Existencia actual</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>13/09/2023</td>
                    <td>Tecnologia</td>
                    <td>iPhone 14 Pro</td>
                    <td>4.5</td>
                    <td>12999.99</td>
                    <td>1256</td>
                </tr>
            </tbody>
        </table>
    </main>

</body>
</html>