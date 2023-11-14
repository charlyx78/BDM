$(document).ready(async () => {
    //Se imprimen todos los productos al iniciar el HTML
    await getProductos(1,7);
})

async function getProductos(paginaActual, categoriasPorPagina) {

    const inicio = (paginaActual - 1) * categoriasPorPagina;
    const fin = inicio + categoriasPorPagina;

    //Se limpia la tabla
    $('#tablaProductos').html('');

    //Se guarda en una variable la respuesta del controlador readCategorias
    let response = await fetch('../controllers/readProductoAdmin.php');

    //Espera a obtener la respuesta y la convierte la respuesta en un JSON
    let responseJSON = await response.json();

    const productosAMostrar = responseJSON.slice(inicio, fin);

    //Itera cada dato de este para imprimirlo en la tabla del HTML
    await productosAMostrar.forEach(pro => {
        $('#tablaProductos').append(`
        <tr>
            <td>${pro.PK_IdProducto}</td>
            <td>${pro.ProNombre}</td>
            <td>$${pro.ProPrecio}</td>
            <td>${pro.ProExistencias}</td>
            <td>${pro.ProFK_IdTipoP === 1 ? 'Precio fijo' : 'Cotizable'}</td>
            <td>${pro.ProFechaRegistro}</td>
            <td><span class="badge rounded-pill ${pro.ProFK_IdActivo === 2 ? 'bg-success' : 'bg-secondary'} fs-6">${pro.ProFK_IdActivo === 2 ? 'Activo' : 'Inactivo'}</span></td>
            <td class="text-center"><button class="btn btn-danger btn-activar-producto" data-idpro="${pro.PK_IdProducto}"><i class="bi bi-trash3"></i></button></td>
        </tr>`);  
    });
    
        //Se le asigna un evento a cada boton de editar
        $('.btn-activar-producto').on('click', async function() {
    
            //Se obtiene el valor del atributo "data-idpro" (practicamente el id del producto seleccionado)
            var id = $(this).data('idpro');
    
            //Se crea un objeto que contenga dicho id
            var formData = {
                idProducto: id
            };
    
            //Alerta de advertencia y confirmacion para Activar el producto seleccionado
            Swal.fire({
                title: 'Confirmacion',
                text: '¿Estás segur@ de activar este producto?',
                icon: 'warning',
                showCancelButton: true
            })
            .then((result) => {
                if (result.isConfirmed) {
                    //Se ejecuta el controlador activateProducto
                     fetch('../controllers/activateProducto.php', {
                         method: 'POST',
                         body: JSON.stringify(formData),
                         headers: {
                             'Content-Type': 'application/json'
                         }
                     })
                     .then(() => {
                         //Alerta de confirmacion
                         Swal.fire(
                             'Exito!',
                             'Producto Activado correctamente',
                             'success'
                         )
                         .then(async() => {
                             //Vuelve a imprimir todos los productos
                             $('#loader').show();
                             await getProductos(1,7);
                         })
                     })
                     .catch(error => {
                         //Alerta de error
                         Swal.fire(
                             'Error',
                             error.message,
                             'error'
                         );
                     });
                }
            })
        })

    const totalCategorias = responseJSON.length;
    const totalPaginas = Math.ceil(totalCategorias/categoriasPorPagina);

    await imprimirPaginacion(totalPaginas);
    await eventoPaginacion();

    $('#loader').hide();
}

async function imprimirPaginacion(totalPaginas) {
    $('.pagination').html('');

    for(let i=0; i < totalPaginas; i++) {
        $('.pagination').append(`<li class="page-item"><a class="page-link" href="#" data-pagina="${i+1}">${i+1}</a></li>`);
    }
}
async function eventoPaginacion() {
    $('.pagination').on('click', 'a.page-link', async function() {
        var pagina = $(this).data('pagina');

        // Evita llamar a getCategorias nuevamente si ya se está ejecutando
        if (!$(this).hasClass('disabled')) {
            // Deshabilita los enlaces de paginación mientras se carga la nueva página
            $('.pagination a.page-link').addClass('disabled');
            await getProductos(pagina, 7);
            // Habilita los enlaces de paginación después de completar la carga
            $('.pagination a.page-link').removeClass('disabled');
        }    
    })
}