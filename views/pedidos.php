<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Pedidos</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>

    <main class="container py-4">
        <h2 class="titulo-pagina">Mis pedidos</h2>

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
                    <div class="mb-2 col-6 col-lg-4">
                        <label for="nombreProducto" class="form-label">Nombre de producto</label>
                        <input type="text" name="nombreProducto" class="form-control">
                    </div>
                    <div class="mb-2 col-6 col-lg-4">
                        <label for="calificacionProducto" class="form-label">Calificacion de producto</label>
                        <input type="range" min="0" max="5" step="0.1" name="calificacionProducto" class="form-control">
                    </div>
                    <div class="mb-4 col-6 col-lg-4">
                        <label for="precioProducto" class="form-label">Precio de producto</label>
                        <input type="range" min="0" max="20000" step="1" name="precioProducto" class="form-control">
                    </div>
                    <div class="mb-2 col-12">
                        <input type="submit" class="btn btn-primario w-100" value="Buscar">
                    </div>
                </div>
            </form>
        </div>


        <div class="contenedor-pedidos card border-0">
            <div class="producto-wishlist card card-body mb-2">
                <div class="imagen-producto-wishlist rounded">
                </div>
                <div class="informacion-producto-wishlist">
                    <div class="d-flex flex-column">
                        <h4>iPhone 14 pro</h4>
                        <h5>12999.99</h5>
                    </div>
                    <div class="d-flex flex-column">
                        <p class="text-secondary m-0">Tecnologia</p>
                    </div>
                    <div class="calificacion-producto-wishlist">
                        <i class="bi bi-star-fill color-oro"></i>
                        <p class="m-0">4.5 <span class="text-secondary">(1523)</span></p>
                    </div>
                    <div class="d-flex gap-1 align-items-center mb-2">
                        <p class="text-secondary m-0">Fecha de compra: <span class="fw-bold">11/09/2023</span></p>
                    </div>
                    <div class="d-lg-flex gap-2">
                        <button type="button" class="btn btn-primario btn-sm w-100 mb-1 mb-lg-0">Volver a comprar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>