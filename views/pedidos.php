<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Pedidos</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>

    <div class="contenedor-pagina-pedidos">
        <div class="contenedor-pagina container-fluid">
            <div class="contenedor-titulo-pagina">
                <div class="contenido-titulo-pagina">
                    <h2 class="titulo-pagina mb-0">Mis pedidos</h2>
                    <button class="btn" type="button" onclick="mostrarFiltros('sidebarFiltrosPedidos')"><i class="bi bi-sliders fs-5"></i></button>
                </div>
            </div>

            <div class="contenedor-pedido">
                <ul class="contenedor-productos-pedido">
                    <li class="producto-pedido" data-idproducto="1">
                        <div class="imagen-producto-pedido rounded">
                        </div>
                        <div class="informacion-producto-pedido">
                            <h2 class="nombre-producto-pedido">iPhone 14 Pro 128GB 4GB RAM</h2>
                            <h4 class="fecha-producto-pedido text-secondary"><span>Fecha:</span>27/09/2023</h4>
                            <h4 class="cantidad-producto-pedido text-secondary"><span>Cantidad:</span>5</h4>
                            <h4 class="precio-producto-pedido text-secondary"><span>Total:</span>$12999.99</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="sidebar-menu-filtros" id="sidebarFiltrosPedidos">
            <form action="">
                <div class="row">
                    <div class="mb-2 col-12">
                        <label for="fechaPedido" class="form-label">Fecha de compra</label>
                        <input type="date" name="fechaPedido" class="form-control">
                    </div>
                    <div class="mb-2 col-12">
                        <label for="horaPedido" class="form-label">Hora de compra</label>
                        <input type="time" name="horaPedido" class="form-control">
                    </div>
                    <div class="mb-2 col-12">
                        <label for="categoriaPedido" class="form-label">Categoria</label>
                        <select name="categoriaPedido" id="" class="form-select">
                            <option value="">Selecciona una categoria</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="mb-2 col-12">
                        <label for="productoPedido" class="form-label">Nombre de producto</label>
                        <input type="text" name="productoPedido" class="form-control">
                    </div>
                    <div class="mb-2 col-12">
                        <label for="calificacionPedido" class="form-label">Calificacion</label>
                        <select name="calificacionPedido" id="" class="form-select">
                            <option value="">Selecciona una calificacion</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>                    
                    </div>
                    <div class="mb-5 col-12">
                        <label for="precioPedido" class="form-label">Precio</label>
                        <input type="number" name="precioPedido" class="form-control">
                    </div>
                    <div class="mb-2 mt-1 w-100">
                        <button class="btn btn-primario w-100" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    <script src="../js/sidebarFiltros.js"></script>

</body>
</html>