<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Gestion de productos</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>

    <div class="contenedor-loader d-none" id="loader">
        <div class="spinner-grow" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <main class="contenedor-pagina">
        <div class="contenedor-titulo-pagina container-fluid">
            <div class="contenido-titulo-pagina">
                <h2 class="titulo-pagina mb-0">Categorias</h2>
                <button class="btn btn-primario" data-bs-toggle="modal" id="btnAbrirModal" data-bs-target="#nuevaCategoriaModal">Nueva categoria</button>
            </div>
        </div>

        <div class="container-fluid mis-productos p-0 overflow-x-scroll">
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>Categorias</th>
                        <th>Descripcion</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tablaCategorias">
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
    
</body>
</html>