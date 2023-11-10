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

    <div class="contenedor-loader" id="loader">
        <div class="spinner-grow" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

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
                <tbody id="tablaProductos">

                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li> -->
                </ul>
            </nav>
        </div>
    </main>

    <div class="modal fade" id="nuevoProductoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="nuevoProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog producto-modal">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="nuevoProductoModalLabel">Nuevo Producto <span class="text-secondary fw-light ms-3" id="idpro"></span></h1>
                <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg text-light fw-bold"></i></button>
            </div>
            <div class="modal-body">
                <form id="formAddProducto" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="mb-2">
                            <label for="nombreProducto" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombreProducto" id="nombreProducto">
                        </div>
                        <div class="mb-2">
                            <label for="categoriaProducto" class="form-label">Categoria</label>
                            <select name="categoriaProducto" id="categoriaProducto" class="form-select">
                                <option value="">Selecciona una categoria...</option>
                            </select>                        
                        </div>
                        <div class="mb-2 col-6">
                            <label for="tipoVentaProducto" class="form-label">Tipo de venta</label>
                            <select name="tipoVentaProducto" id="tipoVentaProducto" class="form-select">
                                <option value="">Selecciona una opcion...</option>
                                <option value="1">Precio fijo</option>
                                <option value="2">Cotizable</option>
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
                            <label class="form-label" for="videoProducto">Video de producto</label>
                            <label for="videoProducto" class="preview-imagen-producto preview-video-producto">
                                <i class="bi bi-camera-video fs-4" id="iconoPreviewVideo"></i>
                                <video src="" id="previewVideo" class="w-100 h-100" style="display:none;" autoplay muted controls loop></video>
                            </label>
                            <input type="file" class="form-control d-none" name="videoProducto" id="videoProducto" accept=".mp4">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Imagenes de producto</label>
                        </div>
                        <div class="mb-2 col-4">
                            <label for="imagenProducto1" class="preview-imagen-producto" id="previewImagen1"><i class="bi bi-camera fs-4" id="iconoPreviewImagen1"></i></label>
                            <input type="file" class="form-control d-none" id="imagenProducto1" name="imagenProducto1" accept=".jpg,.png,jpeg">
                        </div>
                        <div class="mb-2 col-4">
                            <label for="imagenProducto2" class="preview-imagen-producto" id="previewImagen2"><i class="bi bi-camera fs-4" id="iconoPreviewImagen2"></i></label>
                            <input type="file" class="form-control d-none" id="imagenProducto2" name="imagenProducto2" accept=".jpg,.png,jpeg">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="imagenProducto3" class="preview-imagen-producto" id="previewImagen3"><i class="bi bi-camera fs-4" id="iconoPreviewImagen3"></i></label>
                            <input type="file" class="form-control d-none" id="imagenProducto3" name="imagenProducto3" accept=".jpg,.png,jpeg">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" name="descripcionProducto">Descripcion</label>
                            <textarea class="form-control" name="descripcionProducto" id="descripcionProducto" rows="5"></textarea>
                        </div>
                        <div class="mb-2">
                            <button type="submit" id="submitProducto" name="submitProducto" class="btn btn-primario w-100">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous">
    </script>
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/misProductos.js"></script>

</body>
</html>