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

    <main class="contenedor-pagina contenedor-pagina-pago">
        <div class="contenedor-titulo-pagina">
            <div class="contenido-titulo-pagina container-fluid">
                <h2 class="titulo-pagina mb-0">Elige un metodo de pago</h2>
            </div>
        </div>

        <form class="contenedor-metodos-pago container-fluid" id="contenedor-metodos-pago" method="POST">
            <input class="btn-check" type="radio" name="tarjetaPago" id="tarjetaPago1">
            <label class="metodo-pago btn" for="tarjetaPago1">
                <img src="../img/visa.png" width="40" alt="">
                <h2>**** **** **** 1234</h2>
            </label>

            <input class="btn-check" type="radio" name="tarjetaPago" id="tarjetaPago2">
            <label class="metodo-pago btn" for="tarjetaPago2">
                <img src="../img/mastercard.png" width="40" alt="">
                <h2>**** **** **** 1234</h2>
            </label>

            <div class="contenedor-total-carrito">
                <div class="contenido-total-carrito container-fluid">
                    <div class="d-none d-lg-block">
                        <h2>Subtotal: <span id="SubtotalAPagar">12999.99</span></h2>
                        <h2>Descuento: <span>0.00</span></h2>
                        <hr>
                    </div>
                    <h2>Total: <span id="TotalaPagar" class="totalCarrito">5555</span></h2>
                    <button type="submit" class="btn btn-primario w-100 rounded-pill py-2 mt-4">Pagar</button>
                </div>               
            </div>
        </form>

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

    <!-- Jquery -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/pago.js"></script>
</body>
</html>