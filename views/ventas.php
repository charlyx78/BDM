<?php
session_start();
?>
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

    <br>
    <br>
    <br>
    <main class="container py-4">
        <h2 class="titulo-pagina">Mis Ventas</h2>

        <h5 class="fw-bold">Filtros</h5>
        <div class="card card-body filtros-busqueda mb-5">
            <form id="form-filtrar-ventas" method="post">
                <div class="row">
                    <div class="mb-2 col-6 col-lg-4">
                        <label for="fechaVenta1" class="form-label">Fecha Inicio</label>
                        <input type="date" name="fechaVenta1" id="fechaVenta1" class="form-control">
                    </div>
                    <div class="mb-2 col-6 col-lg-4">
                        <label for="fechaVenta2" class="form-label">Fecha Fin</label>
                        <input type="date" name="fechaVenta2" id="fechaVenta2" class="form-control">
                    </div>
                    <div class="mb-2 col-6 col-lg-4">
                        <label for="categoriaVenta" class="form-label">Categoria</label>
                        <select name="categoriaVenta" id="categoriaVenta" class="form-select">
                            <option value="">Selecciona una opcion...</option>
                        </select>                    
                    </div>
                    <div class="mb-2 col-12">
                        <input type="submit" class="btn btn-primario w-100" value="Buscar">
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-bordered" id="tablaReporteVentas">
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

        <table class="table table-bordered" id="tablaReporteVentasAgrupadas">
            <thead>
                <tr>
                    <td>Categoria</td>
                    <td>Vendido</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tecnologia</td>
                    <td>1256</td>
                </tr>
            </tbody>
        </table>
    </main>

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/reporteVentas.js"></script>

</body>
</html>