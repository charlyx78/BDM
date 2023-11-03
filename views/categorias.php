<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Categorias</title>
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
        </div>
    </main>

    <div class="modal fade" id="nuevaCategoriaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="nuevaCategoriaModalLabel" aria-hidden="true">
        <div class="modal-dialog producto-modal">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="nuevaCategoriaModalLabel">Nueva Categoria <span class="text-secondary fw-light ms-3" id="idcat"></span></h1>
                <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg text-light fw-bold"></i></button>
            </div>
            <div class="modal-body">
                <form id="formAddCategoria" method="post">
                    <div class="row">
                        <div class="mb-2">
                            <label for="nombreCategoria" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombreCategoria" id="nombreCategoria">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" name="descripcionCategoria">Descripcion</label>
                            <textarea class="form-control" name="descripcionCategoria" id="descripcionCategoria" rows="5"></textarea>
                        </div>
                        <div class="mb-2">
                            <button type="submit" id="submitCategoria" name="submitCategoria" class="btn btn-primario w-100">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/categorias.js"></script>

</body>
</html>