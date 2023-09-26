<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Pago</title>
    <?php include_once "../estilos.php" ?>

</head>
<body>
    <?php include_once "navbar.php" ?>

    <main class="contenedor-pagina">
        <div class="contenedor-titulo-pagina">
            <div class="contenido-titulo-pagina">
                <h2 class="titulo-pagina mb-0">Elige un metodo de pago</h2>
            </div>
        </div>

        <div class="container-fluid">
            <ul class="contenedor-metodos-pago">
                <li class="metodo-pago">
                    <img src="../img/visa.png" width="40" alt="">
                    <h2>**** **** **** 1234</h2>
                </li>
                <li class="metodo-pago">
                    <img src="../img/mastercard.png" width="40" alt="">
                    <h2>**** **** **** 1234</h2>
                </li>
                <li class="metodo-pago agregar-metodo-pago" data-bs-toggle="modal" data-bs-target="#metodoPagoModal">
                    <h2>
                        <i class="bi bi-plus-lg me-3"></i>
                        Añadir metodo de pago
                    </h2>
                </li>
            </ul>
        </div>

        <div class="contenedor-total-carrito">
            <div class="contenido-total-carrito container-fluid">
                <!-- <h2>Subtotal: <span>12999.99</span></h2>
                <h2>Descuento: <span>0.00</span></h2>
                <hr> -->
                <h2>Total: <span id="totalCarrito">0</span></h2>
                <a href="pago.php" class="btn btn-primario w-100 rounded-pill">Pagar</a>
            </div>               
        </div>
    </main>

    <div class="modal fade" id="metodoPagoModal" tabindex="-1" aria-labelledby="metodoPagoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="metodoPagoModalLabel">Agrega un metodo de pago</h1>
                    <button class="btn"><i class="bi bi-x-circle-fill text-danger" data-bs-dismiss="modal" aria-label="Close"></i></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="numeroTarjeta" class="form-label">Numero de tarjeta</label>
                            <input type="number" name="numeroTarjeta" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nombreTarjeta" class="form-label">Nombre</label>
                            <input type="text" name="nombreTarjeta" class="form-control">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="fechaTarjeta" class="form-label">Fecha de expiracion</label>
                                    <input type="month" name="fechaTarjeta" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="cvvTarjeta" class="form-label">CVV</label>
                                    <input type="password" name="cvvTarjeta" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primario">Guardar</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>