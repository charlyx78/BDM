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

    <div class="contenedor-pagina">
        <div class="contenedor-titulo-pagina">
            <div class="contenido-titulo-pagina">
                <h2 class="titulo-pagina mb-0">Mis pedidos</h2>
                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltros" aria-expanded="false" aria-controls="collapseFiltros"><i class="bi bi-sliders fs-5"></i></button>
            </div>
        </div>

        <div class="container-fluid filtros-busqueda mb-5 collapse" id="collapseFiltros">
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
                        <label for="calificacionProducto" class="form-label">Calificacion</label>
                        <input type="range" min="0" max="5" step="0.1" name="calificacionProducto" class="form-control">
                    </div>
                    <div class="mb-4 col-6 col-lg-4">
                        <label for="precioProducto" class="form-label">Precio</label>
                        <input type="range" min="0" max="20000" step="1" name="precioProducto" class="form-control">
                    </div>
                    <div class="mb-2 col-12">
                        <input type="submit" class="btn btn-primario w-100" value="Buscar">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="contenedor-pedido">
        <ul class="container-fluid contenedor-productos-pedido">
            <li class="producto-pedido" data-idproducto="1">
                <div class="imagen-producto-pedido rounded">
                </div>
                <div class="informacion-producto-pedido">
                    <h2 class="nombre-producto-pedido">iPhone 14 Pro 128GB 4GB RAM</h2>
                    <h4 class="fecha-producto-pedido text-secondary"><span>Fecha:</span>27/09/2023</h4>
                    <h4 class="cantidad-producto-pedido text-secondary"><span>Cantidad:</span>5</h4>
                    <h4 class="precio-producto-pedido text-secondary"><span>Total:</span>$12999.99</h4>
                </div>
            </li>
        </ul>
</body>
</html>