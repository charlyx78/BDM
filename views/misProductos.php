<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Mis productos</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>

    <main class="container py-4">
        <h2 class="titulo-pagina">
            Mis productos
            <button class="btn btn-primario" data-bs-toggle="modal" data-bs-target="#nuevoProductoModal">Nuevo producto</button>
        </h2>

        <div class="producto-wishlist card card-body mb-2">
            <div class="imagen-producto-wishlist rounded">
            </div>
            <div class="informacion-producto-wishlist">
                <div class="d-flex flex-column">
                    <h5>iPhone 14 pro</h5>
                </div>
                <div class="d-lg-flex gap-2">
                    <a href="producto.php" class="btn btn-secondary btn-sm w-100 mb-1 mb-lg-0">Ver pagina</a>
                    <button type="button" class="btn btn-primario btn-sm w-100 mb-1 mb-lg-0" data-bs-toggle="modal" data-bs-target="#nuevoProductoModal">Editar</button>
                    <button type="button" class="btn btn-danger btn-sm w-100">Eliminar</button>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="nuevoProductoModal" tabindex="-1" aria-labelledby="nuevoProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="nuevoProductoModalLabel">Nuevo Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="mb-2">
                            <label for="nombreProducto" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombreProducto">
                        </div>
                        <div class="mb-2">
                            <label for="categoriaProducto" class="form-label">Categoria</label>
                            <select name="categoriaProducto" id="" class="form-select">
                                <option value="">Selecciona una categoria...</option>
                                <option value="">Tecnologia</option>
                                <option value="">Belleza</option>
                            </select>                        
                        </div>
                        <div class="mb-2 col-6">
                            <label for="tipoVentaProducto" class="form-label">Tipo de venta</label>
                            <select name="tipoVentaProducto" id="" class="form-select">
                                <option value="">Selecciona una opcion...</option>
                                <option value="">Precio fijo</option>
                                <option value="">Cotizable</option>
                            </select>  
                        </div>
                        <div class="mb-2 col-6">
                            <label for="precioProducto" class="form-label">Precio</label>
                            <div class="input-group input-group">
                                <input class="form-control" type="number" name="precioProducto" aria-label="Precio" aria-label="Precio" aria-describedby="button-addon3">
                                <p class="input-group-text m-0" id="button-addon3">$</a>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="stockProducto" class="form-label">Stock</label>
                            <div class="input-group input-group">
                                <input class="form-control" type="number" name="stockProducto" aria-label="Precio" aria-label="Precio" aria-describedby="button-addon4">
                                <select class="input-group-text form-select" id="button-addon4">
                                    <option value="">Unidad de medida</option>
                                    <option value="">Piezas</option>
                                    <option value="">Kilogramos</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" name="videoProducto">Video de producto</label>
                            <input type="file" class="form-control" id="videoProducto" accept=".mp4">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Imagenes de producto</label>
                        </div>
                        <div class="mb-2 col-4">
                            <input type="file" class="form-control" id="imagenProducto1" accept=".jpg,.png,jpeg">
                        </div>
                        <div class="mb-2 col-4">
                            <input type="file" class="form-control" id="imagenProducto2" accept=".jpg,.png,jpeg">
                        </div>
                        <div class="mb-3 col-4">
                            <input type="file" class="form-control" id="imagenProducto3" accept=".jpg,.png,jpeg">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" name="descripcionProducto">Descripcion</label>
                            <textarea class="form-control" name="descripcionProducto" id="descripcionProducto" rows="5"></textarea>
                        </div>
                        <div class="mb-2">
                            <input type="submit" class="btn btn-primario w-100" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</body>
</html>