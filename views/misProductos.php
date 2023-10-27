<?php
session_start();
?>
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

    <main class="contenedor-pagina">

        <div class="contenedor-titulo-pagina container-fluid">
            <div class="contenido-titulo-pagina">
                <h2 class="titulo-pagina mb-0">Mis productos</h2>
                <button class="btn btn-primario" data-bs-toggle="modal" data-bs-target="#nuevoProductoModal">Nuevo producto</button>
            </div>
        </div>

        <div class="container-fluid mis-productos p-0 overflow-x-scroll">
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Inventario</th>
                        <th>Tipo de venta</th>
                        <th>Fecha de registro</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1903184</td>
                        <td>iPhone 14 Pro</td>
                        <td>$14999.99</td>
                        <td>134 pzas</td>
                        <td>Precio fijo</td>
                        <td>27/10/2023 15:35</td>
                        <td><span class="badge rounded-pill bg-success fs-6">En venta</span></td>
                        <td class="text-center"><button class="btn btn-secundario" data-bs-toggle="modal" data-bs-target="#nuevoProductoModal"><i class="bi bi-pencil"></i></button></td>
                        <td class="text-center"><button class="btn btn-danger"><i class="bi bi-trash3"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal fade" id="nuevoProductoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="nuevoProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="nuevoProductoModalLabel">Nuevo Producto</h1>
                <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg text-light fw-bold"></i></button>
            </div>
            <div class="modal-body">
                <form action="#" id="formAddProducto" method="post">
                    <div class="row">
                        <div class="mb-2">
                            <label for="nombreProducto" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombreProducto" id="nombreProducto">
                        </div>
                        <div class="mb-2">
                            <label for="categoriaProducto" class="form-label">Categoria</label>
                            <select name="categoriaProducto" id="categoriaProducto" class="form-select">
                                <option value="">Selecciona una categoria...</option>
                                <option value="Tecnologia">Tecnologia</option>
                                <option value="Belleza">Belleza</option>
                            </select>                        
                        </div>
                        <div class="mb-2 col-6">
                            <label for="tipoVentaProducto" class="form-label">Tipo de venta</label>
                            <select name="tipoVentaProducto" id="tipoVentaProducto" class="form-select">
                                <option value="">Selecciona una opcion...</option>
                                <option value="Precio fijo">Precio fijo</option>
                                <option value="Cotizable">Cotizable</option>
                            </select>  
                        </div>
                        <div class="mb-2 col-6">
                            <label for="precioProducto" class="form-label">Precio</label>
                            <div class="input-group input-group">
                                <input class="form-control" type="number" name="precioProducto" id="precioProducto" aria-label="Precio" aria-label="Precio" aria-describedby="button-addon3">
                                <p class="input-group-text m-0" id="button-addon3">$</a>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="stockProducto" class="form-label">Stock</label>
                            <div class="input-group input-group">
                                <input class="form-control" type="number" name="stockProducto" id="stockProducto" aria-label="Precio" aria-label="Precio" aria-describedby="button-addon4">
                                <select class="input-group-text form-select" id="stockUnidadMedida">
                                    <option value="">Unidad de medida</option>
                                    <option value="Piezas">Piezas</option>
                                    <option value="Kilogramos">Kilogramos</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" name="videoProducto">Video de producto</label>
                            <label for="videoProducto" class="preview-imagen-producto preview-video-producto">
                                <i class="bi bi-camera-video fs-4" id="iconoPreviewVideo"></i>
                                <video src="" id="previewVideo" class="w-100 h-100" style="display:none;" autoplay muted controls loop></video>
                            </label>
                            <input type="file" class="form-control d-none" id="videoProducto" accept=".mp4">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Imagenes de producto</label>
                        </div>
                        <div class="mb-2 col-4">
                            <label for="imagenProducto1" class="preview-imagen-producto" id="previewImagen1"><i class="bi bi-camera fs-4" id="iconoPreviewImagen1"></i></label>
                            <input type="file" class="form-control d-none" id="imagenProducto1" accept=".jpg,.png,jpeg">
                        </div>
                        <div class="mb-2 col-4">
                            <label for="imagenProducto2" class="preview-imagen-producto" id="previewImagen2"><i class="bi bi-camera fs-4" id="iconoPreviewImagen2"></i></label>
                            <input type="file" class="form-control d-none" id="imagenProducto2" accept=".jpg,.png,jpeg">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="imagenProducto3" class="preview-imagen-producto" id="previewImagen3"><i class="bi bi-camera fs-4" id="iconoPreviewImagen3"></i></label>
                            <input type="file" class="form-control d-none" id="imagenProducto3" accept=".jpg,.png,jpeg">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" name="descripcionProducto">Descripcion</label>
                            <textarea class="form-control" name="descripcionProducto" id="descripcionProducto" rows="5"></textarea>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primario w-100">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <script src="../js/misProductos.js"></script>
</body>
</html>