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
        <div class="container-fluid">
            <h2 class="titulo-pagina mb-0">Carrito</h2>
            <div class="contenedor-carrito mb-4">
                <div class="contenedor-productos-carrito">
                    <div class="producto-carrito" data-idProducto="1">
                        <div class="imagen-producto-carrito rounded">
                        </div>
                        <div class="informacion-producto-carrito">
                            <h2>iPhone 14 Pro 128GB 4GB RAM</h2>
                            <h4 id="precioProducto1">12999.99</h4>
                            <div class="d-flex align-items-center gap-2">
                                <div class="d-flex gap-1 align-items-center">
                                    <button class="btn btn-primario btn-sm rounded-circle" id="btnMenosCantidad" data-field="inputCantidad1"><i class="bi bi-dash"></i></button>
                                    <input type="number" name="inputCantidad1" class="form-control text-center" value="1">
                                    <button class="btn btn-primario btn-sm rounded-circle" id="btnMasCantidad" data-field="inputCantidad1"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="boton-quitar-producto"><button class="btn"><i class="bi bi-x-circle-fill text-danger fs-4"></i></button></div>
                    </div>
                </div>        
            </div>
        </div>
        
            <div class="contenedor-total-carrito">
                <div class="contenido-total-carrito container-fluid">
                    <!-- <h2>Subtotal: <span>12999.99</span></h2>
                    <h2>Descuento: <span>0.00</span></h2>
                    <hr> -->
                    <h2>Total: <span id="totalCarrito">0</span></h2>
                    <a href="pago.php" class="btn btn-primario w-100">Proceder al pago</a>
                </div>               
            </div>

    </main>

    <script src="../js/carrito.js"></script>
</body>
</html>