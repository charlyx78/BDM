function mostrarFiltros(nombreSidebar) {
    $('#' + nombreSidebar).toggle("slide");
}

getCategorias();

$(document).ready(() => {

    getPedidosReporte();

    $('#form-filtrar-pedidos').submit((e) => {//Hay que hacer el Forms
        e.preventDefault();
        getPedidosReporteFiltros();
    })



    async function getPedidosReporte() {

        //Se limpia la tabla
        $('#contenedor-pedido').html('');

        try {
            let response = await fetch('../controllers/readPedidosReporte.php');
    
            //Espera a obtener la respuesta y la convierte la respuesta en un JSON
            let responseJSON = await response.json();

            await responseJSON.forEach(proCarr => {
                let TotalProducto = + parseFloat(proCarr.PrecioProducto * proCarr.CantidadProducto);
                $('#contenedor-pedido').append(`
                <ul class="contenedor-productos-pedido">
                    <li class="producto-pedido" data-idproducto="${proCarr.IdProducto}">
                        <div class="imagen-producto-pedido rounded" style="background-image: url('data:image/png;base64,${proCarr.Imagen1}')">
                        </div>
                        <div class="informacion-producto-pedido">
                            <h2 class="nombre-producto-pedido">${proCarr.NombreProducto}</h2>
                            <h4 class="fecha-producto-pedido text-secondary"><span>Fecha:</span>${proCarr.FechaVenta}</h4>
                            <h4 class="cantidad-producto-pedido text-secondary"><span>Cantidad:</span>${proCarr.CantidadProducto}</h4>
                            <h4 class="precio-producto-pedido text-secondary"><span>Total:</span>$${TotalProducto}</h4>
                        </div>
                    </li>
                </ul>
                `);
            })

            $('#totalCarrito').html('$ ' + totalPagar);
                    
        }
        catch(exception){

        }
    }

    async function getPedidosReporteFiltros() {

        //Se limpia la tabla
        $('#contenedor-pedido').html('');

        const Fecha1 = document.getElementById("fechaPedido1");
        const Fecha2 = document.getElementById("fechaPedido2");
        const Categoria = document.getElementById("categoriaPedido");

        var formData = {
            Fecha1: Fecha1.value,
            Fecha2: Fecha2.value,
            Categoria: Categoria.value
        };
        console.log(JSON.stringify(formData));
        
        try {
            let response = await fetch('../controllers/readPedidosReporteFiltros.php', { //FALTA CREAR EL CONTROLADOR
                method: 'POST',
                body: JSON.stringify(formData),
            });
    
            //Espera a obtener la respuesta y la convierte la respuesta en un JSON
            let responseJSON = await response.json();

            await responseJSON.forEach(proCarr => {
                let TotalProducto = + parseFloat(proCarr.PrecioProducto * proCarr.CantidadProducto);
                $('#contenedor-pedido').append(`
                <ul class="contenedor-productos-pedido">
                    <li class="producto-pedido" data-idproducto="${proCarr.IdProducto}">
                        <div class="imagen-producto-pedido rounded" style="background-image: url('data:image/png;base64,${proCarr.Imagen1}')">
                        </div>
                        <div class="informacion-producto-pedido">
                            <h2 class="nombre-producto-pedido">${proCarr.NombreProducto}</h2>
                            <h4 class="fecha-producto-pedido text-secondary"><span>Fecha:</span>${proCarr.FechaVenta}</h4>
                            <h4 class="cantidad-producto-pedido text-secondary"><span>Cantidad:</span>${proCarr.CantidadProducto}</h4>
                            <h4 class="precio-producto-pedido text-secondary"><span>Total:</span>$${TotalProducto}</h4>
                        </div>
                    </li>
                </ul>
                `);
            })

            $('#totalCarrito').html('$ ' + totalPagar);
                    
        }
        catch(exception){

        }
    }
})


async function getCategorias() {
    //Se limpia la tabla
    $('#categoriaPedido').html('');
    $('#categoriaPedido').append(`
    <option value="">--Selecciona una categoria</option>`);  
    //Se guarda en una variable la respuesta del controlador readCategorias
    let response = await fetch('../controllers/readCategoria.php');
    //Espera a obtener la respuesta y la convierte la respuesta en un JSON
    let responseJSON = await response.json();
    //Itera cada dato de este para imprimirlo en la tabla del HTML
    await responseJSON.forEach(cat => {
        $('#categoriaPedido').append(`
        <option value="${cat.PK_IdCategoria}">${cat.CatNombre}</option>`);  
    });
}