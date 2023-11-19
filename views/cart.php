<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>

    <main class="contenedor-pagina">

    <div class="contenedor-titulo-pagina container-fluid">
        <div class="contenido-titulo-pagina">
            <h2 class="titulo-pagina mb-0">Carrito</h2>
        </div>
    </div>

    <div class="contenedor-carrito container-fluid">
        <div class="contenedor-productos-carrito" id="contenedor-productos-carrito">
        </div>
        
        <div class="contenedor-total-carrito">
            <div class="contenido-total-carrito container-fluid">
                <!-- <h2>Subtotal: <span>12999.99</span></h2>
                <h2>Descuento: <span>0.00</span></h2>
                <hr> -->
                <h2>Total: <span id="totalCarrito" class="totalCarrito">0</span></h2>
                <a href="pago.php" class="btn btn-primario rounded-pill w-100">Proceder al pago</a>
            </div>               
        </div>
    </div>
        

    </main>

    <!-- Jquery -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/carrito.js"></script>
</body>
</html>