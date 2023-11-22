getCategorias();

$(document).ready(() => {

    getVentasReporte();
    getVentasReporteAgrupado();

    $('#form-filtrar-ventas').submit((e) => {//Hay que hacer el Forms
        e.preventDefault();
        getVentasReportesFiltros();
        getVentasReportesAgrupadosFiltros();
    })



    async function getVentasReporte() {

        //Se limpia la tabla
        $('#tablaReporteVentas').html('');
        $('#tablaReporteVentas').append(`
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
                `);

        try {
            let response = await fetch('../controllers/readVentasReporte.php');
    
            //Espera a obtener la respuesta y la convierte la respuesta en un JSON
            let responseJSON = await response.json();

            await responseJSON.forEach(proCarr => {
                $('#tablaReporteVentas').append(`
                <tbody>
                <tr>
                    <td>${proCarr.FechaVenta}</td>
                    <td>${proCarr.NombreCategoria}</td>
                    <td>${proCarr.NombreProducto}</td>
                    <td>${proCarr.Calificacion}</td>
                    <td>$${proCarr.PrecioProducto}</td>
                    <td>${proCarr.Existencias}</td>
                </tr>
            </tbody>
                `);
            })
        }
        catch(exception){

        }
    }

    async function getVentasReportesFiltros() {

        //Se limpia la tabla
        $('#tablaReporteVentas').html('');
        $('#tablaReporteVentas').append(`
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
                `);

        const Fecha1 = document.getElementById("fechaVenta1");
        const Fecha2 = document.getElementById("fechaVenta2");
        const Categoria = document.getElementById("categoriaVenta");

        var formData = {
            Fecha1: Fecha1.value,
            Fecha2: Fecha2.value,
            Categoria: Categoria.value
        };
        console.log(JSON.stringify(formData));
        
        try {
            let response = await fetch('../controllers/readVentasReporteFiltros.php', { //FALTA CREAR EL CONTROLADOR
                method: 'POST',
                body: JSON.stringify(formData),
            });
    
            //Espera a obtener la respuesta y la convierte la respuesta en un JSON
            let responseJSON = await response.json();

            await responseJSON.forEach(proCarr => {
                $('#tablaReporteVentas').append(`
                <tbody>
                <tr>
                    <td>${proCarr.FechaVenta}</td>
                    <td>${proCarr.NombreCategoria}</td>
                    <td>${proCarr.NombreProducto}</td>
                    <td>${proCarr.Calificacion}</td>
                    <td>$${proCarr.PrecioProducto}</td>
                    <td>${proCarr.Existencias}</td>
                </tr>
            </tbody>
                `);
            })
                    
        }
        catch(exception){

        }
    }

    async function getVentasReporteAgrupado() {

        //Se limpia la tabla
        $('#tablaReporteVentasAgrupadas').html('');
        $('#tablaReporteVentasAgrupadas').append(`
        <thead>
                <tr>
                    <td>Categoria</td>
                    <td>Vendido</td>
                </tr>
        </thead>
                `);

        try {
            let response = await fetch('../controllers/readVentasReporteAgrupadas.php');
    
            //Espera a obtener la respuesta y la convierte la respuesta en un JSON
            let responseJSON = await response.json();
            console.log(JSON.stringify(responseJSON));

            await responseJSON.forEach(proCarr => {
                $('#tablaReporteVentasAgrupadas').append(`
                <tbody>
                <tbody>
                <tr>
                    <td>${proCarr.NombreCategoria}</td>
                    <td>${proCarr.CantidadCat}</td>
                </tr>
            </tbody>
            </tbody>
                `);
            })
        }
        catch(exception){

        }
    }

    async function getVentasReportesAgrupadosFiltros() {

        //Se limpia la tabla
        $('#tablaReporteVentasAgrupadas').html('');
        $('#tablaReporteVentasAgrupadas').append(`
        <thead>
                <tr>
                    <td>Categoria</td>
                    <td>Vendido</td>
                </tr>
        </thead>
                `);

        const Fecha1 = document.getElementById("fechaVenta1");
        const Fecha2 = document.getElementById("fechaVenta2");
        const Categoria = document.getElementById("categoriaVenta");

        var formData = {
            Fecha1: Fecha1.value,
            Fecha2: Fecha2.value,
            Categoria: Categoria.value
        };
        
        try {
            let response = await fetch('../controllers/readVentasReportesAgrupadosFiltros.php', { //FALTA CREAR EL CONTROLADOR
                method: 'POST',
                body: JSON.stringify(formData),
            });
    
            //Espera a obtener la respuesta y la convierte la respuesta en un JSON
            let responseJSON = await response.json();

            await responseJSON.forEach(proCarr => {
                $('#tablaReporteVentasAgrupadas').append(`
                <tbody>
                <tbody>
                <tr>
                    <td>${proCarr.NombreCategoria}</td>
                    <td>${proCarr.CantidadCat}</td>
                </tr>
            </tbody>
            </tbody>
                `);
            })
                    
        }
        catch(exception){

        }
    }

})


async function getCategorias() {
    //Se limpia la tabla
    $('#categoriaVenta').html('');
    $('#categoriaVenta').append(`
    <option value="">--Selecciona una categoria</option>`);  
    //Se guarda en una variable la respuesta del controlador readCategorias
    let response = await fetch('../controllers/readCategoria.php');
    //Espera a obtener la respuesta y la convierte la respuesta en un JSON
    let responseJSON = await response.json();
    //Itera cada dato de este para imprimirlo en la tabla del HTML
    await responseJSON.forEach(cat => {
        $('#categoriaVenta').append(`
        <option value="${cat.PK_IdCategoria}">${cat.CatNombre}</option>`);  
    });
}