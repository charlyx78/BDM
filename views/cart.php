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

    <div class="contenedor-titulo-pagina">
        <div class="contenido-titulo-pagina">
            <h2 class="titulo-pagina mb-0">Carrito</h2>
        </div>
    </div>

    <div class="contenedor-carrito">
        <div class="container-fluid contenedor-productos-carrito">
            <div class="producto-carrito" data-idproducto="1">
                <div class="imagen-producto-carrito rounded">
                </div>
                <div class="informacion-producto-carrito">
                    <div class="">
                        <h2>iPhone 14 Pro 128GB 4GB RAM</h2>
                        <h4 id="precioProducto1" class="precio-producto">12999.99</h4>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="d-flex gap-1 align-items-center">
                            <button class="btn btn-primario btn-sm boton-menos-cantidad" data-idproducto="inputCantidad1"><i class="bi bi-dash"></i></button>
                            <input name="inputCantidad1" class="form-control text-center input-cantidad" value="1">
                            <button class="btn btn-primario btn-sm boton-mas-cantidad" data-idproducto="inputCantidad1"><i class="bi bi-plus"></i></button>
                        </div>
                    </div>
                    <div class="total d-none d-lg-block">
                        <h4 class="total-producto">12999.99</h4>
                    </div>
                    <div class="eliminar d-none d-lg-block">
                        <button class="btn"><i class="bi bi-trash-fill text-danger fs-4"></i></button>
                    </div>
                </div>
                <div class="boton-quitar-producto d-block d-lg-none"><button class="btn"><i class="bi bi-x-circle-fill text-secondary fs-4"></i></button></div>
            </div>
            <div class="producto-carrito" data-idproducto="2">
                <div class="imagen-producto-carrito rounded">
                </div>
                <div class="informacion-producto-carrito">
                    <div class="">
                        <h2>iPhone 14 Pro 128GB 4GB RAM</h2>
                        <h4 id="precioProducto2" class="precio-producto">12999.99</h4>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="d-flex gap-1 align-items-center">
                            <button class="btn btn-primario btn-sm boton-menos-cantidad" data-idproducto="inputCantidad2"><i class="bi bi-dash"></i></button>
                            <input type="number" name="inputCantidad2" class="form-control text-center input-cantidad" value="1">
                            <button class="btn btn-primario btn-sm boton-mas-cantidad" data-idproducto="inputCantidad2"><i class="bi bi-plus"></i></button>
                        </div>
                    </div>
                    <div class="total d-none d-lg-block">
                        <h4 class="total-producto">12999.99</h4>
                    </div>
                    <div class="eliminar d-none d-lg-block">
                        <button class="btn"><i class="bi bi-trash-fill text-danger fs-4"></i></button>
                    </div>
                </div>
                <div class="boton-quitar-producto d-block d-lg-none"><button class="btn"><i class="bi bi-x-circle-fill text-secondary fs-4"></i></button></div>
            </div>
            <div class="producto-carrito" data-idproducto="3">
                <div class="imagen-producto-carrito rounded">
                </div>
                <div class="informacion-producto-carrito">
                    <div class="">
                        <h2>iPhone 14 Pro 128GB 4GB RAM</h2>
                        <h4 id="precioProducto3" class="precio-producto">12999.99</h4>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="d-flex gap-1 align-items-center">
                            <button class="btn btn-primario btn-sm boton-menos-cantidad" data-idproducto="inputCantidad3"><i class="bi bi-dash"></i></button>
                            <input type="number" name="inputCantidad3" class="form-control text-center input-cantidad" value="1">
                            <button class="btn btn-primario btn-sm boton-mas-cantidad" data-idproducto="inputCantidad3"><i class="bi bi-plus"></i></button>
                        </div>
                    </div>
                    <div class="total d-none d-lg-block">
                        <h4 class="total-producto">12999.99</h4>
                    </div>
                    <div class="eliminar d-none d-lg-block">
                        <button class="btn"><i class="bi bi-trash-fill text-danger fs-4"></i></button>
                    </div>
                </div>
                <div class="boton-quitar-producto d-block d-lg-none"><button class="btn"><i class="bi bi-x-circle-fill text-secondary fs-4"></i></button></div>
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
    </div>
        

    </main>

    <script src="../js/carrito.js"></script>
</body>
</html>