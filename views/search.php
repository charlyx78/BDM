<?php
session_start();
?>
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

    <div class="contenedor-pagina contenedor-pagina-search container-fluid">
        <div class="contenedor-busqueda">
            <div class="contenedor-titulo-pagina">
                <div class="contenido-titulo-pagina ">
                    <h2 class="titulo-pagina mb-0">Busqueda de: <span id="productoEnBusqueda"></span></h2>
                    <button class="btn" type="button" onclick="mostrarFiltros('sidebarFiltrosSearch')"><i class="bi bi-sliders fs-5"></i></button>
                </div>
            </div>

            <h5 class="mensaje-error" style="display:none;">No se encontraron productos :(</h5>
            <ul class="contenedor-productos-busqueda">   
            </ul>
        </div>
        

        <div class="sidebar-menu-filtros" id="sidebarFiltrosSearch">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold mb-4 fs-3 mt-3">Filtros</h2>
                <button class="btn d-lg-none" id="btnCerrarSidebar" onclick="mostrarFiltros('sidebarFiltrosSearch')"><i class="bi bi-x-lg text-secondary"></i></button>
            </div>
            <form id="formBusquedaAvanzadaProducto">
                <div class="row">
                    <div class="mb-2 col-12">
                        <label for="nombreProducto" class="form-label">Nombre del producto</label>
                        <input type="text" name="nombreProducto" class="form-control" placeholder="Escribe el nombre del producto">
                    </div>
                    <div class="mb-2 col-12">
                        <label for="nombreVendedor" class="form-label">Nombre del vendedor</label>
                        <input type="text" name="nombreVendedor" class="form-control" placeholder="Escribe el nombre del vendedor">
                    </div>
                    <div class="mb-2 col-12">
                        <label for="precioMinimo" class="form-label">Precio minimo</label>
                        <input type="number" value="0" name="precioMinimo" class="form-control">
                    </div>
                    <div class="mb-4 col-12">
                        <label for="precioMaximo" class="form-label">Precio maximo</label>
                        <input type="number" value="0" name="precioMaximo" class="form-control">
                    </div>
                    <div class="mb-2 col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="masVendidos" id="masVendidos">
                            <label class="form-check-label" for="masVendidos">
                                Mas vendidos
                            </label>
                        </div>
                    </div>
                    <div class="mb-5 col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="mejorCalificados" id="mejorCalificados">
                            <label class="form-check-label" for="mejorCalificados">
                                Mejor calificados
                            </label>
                        </div>
                    </div>
                    <div class="mb-2 mt-1 w-100">
                        <button class="btn btn-primario w-100" type="submit" name="busquedaAvanzadaProducto">Buscar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <?php include_once "footer.php" ?>


    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    <script src="../js/sidebarFiltros.js"></script>
    <script src="../js/searchProducto.js"></script>

</body>
</html>