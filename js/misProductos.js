$(document).ready(async () => {

    isEditando = false;
    nombreProducto = $("#nombreProducto");
    categoriaProducto = $("#categoriaProducto");
    tipoVentaProducto = $("#tipoVentaProducto");
    precioProducto = $("#precioProducto");
    stockProducto = $("#stockProducto");
    stockUnidadMedida = $("#stockUnidadMedida");
    descripcionProducto = $("#descripcionProducto");
    imagenProducto1 = $("#imagenProducto1");
    imagenProducto2 = $("#imagenProducto2");
    imagenProducto3 = $("#imagenProducto3");
    videoProducto = $("#videoProducto");
    
    tipoVentaProducto.on('change', function () {
        if(tipoVentaProducto.val() == 2) {
            precioProducto.val(0)
            precioProducto.prop( "disabled", true )
        }
        else {
            precioProducto.prop( "disabled", false )
        }
    })

    //Al abrir el modal desde el boton de nueva categoria se resetean los campos del formulario y se cambia la variable isEditando a false 
    $('#btnAbrirModal').click(() => {
        isEditando = false;
        $('#idpro').val('');
        nombreProducto.val('');
        categoriaProducto.val('');
        tipoVentaProducto.val('');
        precioProducto.val('');
        stockProducto.val('');
        descripcionProducto.val('');
        imagenProducto1.val('');
        imagenProducto2.val('');
        imagenProducto3.val('');
        videoProducto.val('');
    })

    $('#formAddProducto').on('submit', function(e) {
        e.preventDefault();

    
        if(nombreProducto.val() != "" &&
            categoriaProducto.val() != "" &&
            tipoVentaProducto.val() != "" &&
            precioProducto.val() != "" &&
            stockProducto.val() != "" &&
            descripcionProducto != "" ) 
            {

            if(!isEditando) {//ADD PRODUCTO
                var formData = new FormData(this);
                console.log(JSON.stringify(formData));
                fetch('../controllers/addProducto.php', {
                    method: 'POST',
                    body: formData
                })
                .then((response) => {
                    console.log(response)
                    //Alerta de confirmacion
                    Swal.fire(
                        'Exito!',
                        'Producto agregado correctamente',
                        'success'
                    ).then(async() => {
                        //Cierra el modal y se resetean los campos del formulario de este
                        $('#nuevoProductoModal').modal('hide')
                        nombreProducto.val("");
                        categoriaProducto.val("");
                        tipoVentaProducto.val("");
                        precioProducto.val("");
                        stockProducto.val("");
                        descripcionProducto.val("");
                        imagenProducto1.val("");
                        imagenProducto2.val("");
                        imagenProducto3.val("");
                        videoProducto.val("");
            
                        previewVideo.style.display = 'none';
                        previewVideo.style.backgroundImage = '';
                        iconoPreviewVideo.style.display = 'block';
            
                        previewImagen1.style.backgroundImage = '';
                        iconoPreviewImagen1.style.display = 'block';
            
                        previewImagen2.style.backgroundImage = '';
                        iconoPreviewImagen2.style.display = 'block';
            
                        previewImagen3.style.backgroundImage = '';
                        iconoPreviewImagen3.style.display = 'block';
            
                        //Vuelve a imprimir todos los productos
                        $('#loader').show();
                        await getProductos(1,7);
                    });
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
            else{
                var formData = new FormData(this);
                console.log(JSON.stringify(formData));
                fetch('../controllers/updateProducto.php', {
                    method: 'POST',
                    body: formData
                })
                .then((response) => {
                    //Alerta de confirmacion
                    Swal.fire(
                        'Exito!',
                        'Producto actualizado correctamente',
                        'success'
                    ).then(async() => {
                        //Cierra el modal y se resetean los campos del formulario de este
                        $('#nuevoProductoModal').modal('hide')
                        nombreProducto.val("");
                        categoriaProducto.val("");
                        tipoVentaProducto.val("");
                        precioProducto.val("");
                        stockProducto.val("");
                        descripcionProducto.val("");
                        imagenProducto1.val("");
                        imagenProducto2.val("");
                        imagenProducto3.val("");
                        videoProducto.val("");
            
                        previewVideo.style.display = 'none';
                        previewVideo.style.backgroundImage = '';
                        iconoPreviewVideo.style.display = 'block';
            
                        previewImagen1.style.backgroundImage = '';
                        iconoPreviewImagen1.style.display = 'block';
            
                        previewImagen2.style.backgroundImage = '';
                        iconoPreviewImagen2.style.display = 'block';
            
                        previewImagen3.style.backgroundImage = '';
                        iconoPreviewImagen3.style.display = 'block';

                        //Vuelve a imprimir todas las categorias
                        $('#loader').show();
                        await getProductos(1,7);
                    });
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
        } 
        else {
            Swal.fire(
                'Advertencia',
                'Llena todos los campos para continuar',
                'warning'
            );
        }
    })
    //Se imprimen todos los productos al iniciar el HTML
    await getProductos(1,7);
})



getCategorias();
previewInputs();

async function getProductos(paginaActual, categoriasPorPagina) {

    const inicio = (paginaActual - 1) * categoriasPorPagina;
    const fin = inicio + categoriasPorPagina;

    //Se limpia la tabla
    $('#tablaProductos').html('');

    
    try {
        //Se guarda en una variable la respuesta del controlador readCategorias
        let response = await fetch('../controllers/readProductoUsuario.php');

        //Espera a obtener la respuesta y la convierte la respuesta en un JSON
        let responseJSON = await response.json();
    
        const productosAMostrar = responseJSON.slice(inicio, fin);
    
        //Itera cada dato de este para imprimirlo en la tabla del HTML
        await productosAMostrar.forEach(pro => {
            $('#tablaProductos').append(`
            <tr>
                <td>${pro.PK_IdProducto}</td>
                <td>${pro.ProNombre}</td>
                <td>${pro.ProPrecio == null ? 'Precio cotizable' : '$' + pro.ProPrecio}</td>
                <td>${pro.ProExistencias}</td>
                <td>${pro.ProFK_IdTipoP === 1 ? 'Precio fijo' : 'Cotizable'}</td>
                <td>${pro.ProFechaRegistro}</td>
                <td><span class="badge rounded-pill ${pro.ProFK_IdActivo === 2 ? 'bg-success' : 'bg-secondary'} fs-6">${pro.ProFK_IdActivo === 2 ? 'Activo' : 'Inactivo'}</span></td>
                <td class="text-center"><button class="btn btn-secundario btn-editar-producto" data-idpro="${pro.PK_IdProducto}" data-bs-toggle="modal" data-bs-target="#nuevoProductoModal"><i class="bi bi-pencil"></i></button></td>
                <td class="text-center"><button class="btn btn-danger btn-eliminar-producto" data-idpro="${pro.PK_IdProducto}"><i class="bi bi-trash3"></i></button></td>
            </tr>`);  
        });
        //Una vez terminada la impresion de los datos de la respuesta del controlador "agregarProducto", se le asigna un evento a cada boton de editar
        $('.btn-editar-producto').on('click', async function() {
            isEditando = true;
    
            //Se obtiene el valor del atributo "data-ipro" (practicamente el id del producto seleccionado)
            var id = $(this).data('idpro');
    
            //Se crea un objeto que contenga dicho id
            var formData = {
                idProducto: id
            };
    
            //Guardamos en una variable la respuesta del controlador para encontrar una categoria por su id "findProducto"
                let response = await fetch('../controllers/findProducto.php', { //FALTA CREAR EL CONTROLADOR
                    method: 'POST',
                    body: JSON.stringify(formData),
                });
    
            //Convierte la respuesta del controlador en un JSON 
                let responseJSON = await response.json();
                console.log(responseJSON);
                FormDataUpdate = responseJSON;
            
            //Asignamos el valor del span que se encuentra en el header del modal al de el id del producto que obtuvimos previamente con "findProducto"
                $('#idpro').val(responseJSON.ID);
    
            //Asignamos a los campos del formulario los valores del producto seleccionado
            const nombreProducto = $("#nombreProducto");
            const categoriaProducto = $("#categoriaProducto");
            const tipoVentaProducto = $("#tipoVentaProducto");
            const precioProducto = $("#precioProducto");
            const stockProducto = $("#stockProducto");
            const stockUnidadMedida = $("#stockUnidadMedida");
            const descripcionProducto = $("#descripcionProducto");
            const imagenProducto1 = $("#imagenProducto1");
            const imagenProducto2 = $("#imagenProducto2");
            const imagenProducto3 = $("#imagenProducto3");
            const videoProducto = $("#videoProducto");
    
            nombreProducto.val(responseJSON.Nombre);
            categoriaProducto.val(responseJSON.IdCategoria);
            tipoVentaProducto.val(responseJSON.IdTipoP);
            precioProducto.val(responseJSON.Precio);
            stockProducto.val(responseJSON.CantidadInventario);
            descripcionProducto.val(responseJSON.Descripcion);
            // imagenProducto1.val(responseJSON.ProIma1);
            // imagenProducto2.val(responseJSON.ProIma2);
            // imagenProducto3.val(responseJSON.ProIma3);
            // videoProducto.val(responseJSON.ProVideo);
            
            previewVideo.style.display = 'block';
            previewVideo.src = responseJSON.Video;     
            previewImagen1.style.backgroundImage = "url('data:image/png;base64," + responseJSON.Imagen1 + "')";
            previewImagen2.style.backgroundImage = "url('data:image/png;base64," + responseJSON.Imagen2 + "')";
            previewImagen3.style.backgroundImage = "url('data:image/png;base64," + responseJSON.Imagen3 + "')";
        })
    
        //Se le asigna un evento a cada boton de editar
        $('.btn-eliminar-producto').on('click', async function() {
    
            //Se obtiene el valor del atributo "data-idpro" (practicamente el id del producto seleccionado)
            var id = $(this).data('idpro');
    
            //Se crea un objeto que contenga dicho id
            var formData = {
                idProducto: id
            };
    
            //Alerta de advertencia y confirmacion para eliminar el producto seleccionada
            Swal.fire({
                title: 'Advertencia!',
                text: '¿Estás segur@ de eliminar este producto?',
                icon: 'warning',
                showCancelButton: true
            })
            .then((result) => {
                if (result.isConfirmed) {
                    //Se ejecuta el controlador deleteProducto FALTA CREARLO
                        fetch('../controllers/deleteProducto.php', {
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
                                'Producto eliminado correctamente',
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
    catch(exception){
        alert('No existen productos registrados en esta cuenta. Continue para crearlos')
        $('#loader').hide();
    }
    

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

async function getCategorias() {
    //Se limpia la tabla
    $('#categoriaProducto').html('');
    $('#categoriaProducto').append(`
    <option value="">--Selecciona una categoria</option>`);  
    //Se guarda en una variable la respuesta del controlador readCategorias
    let response = await fetch('../controllers/readCategoria.php');
    //Espera a obtener la respuesta y la convierte la respuesta en un JSON
    let responseJSON = await response.json();
    //Itera cada dato de este para imprimirlo en la tabla del HTML
    await responseJSON.forEach(cat => {
        $('#categoriaProducto').append(`
        <option value="${cat.PK_IdCategoria}">${cat.CatNombre}</option>`);  
    });
}

function previewInputs() {
    const inputImagenProducto1 = document.getElementById('imagenProducto1');
    const previewImagen1 = document.getElementById('previewImagen1');
    const iconoPreviewImagen1 = document.getElementById('iconoPreviewImagen1');
    inputImagenProducto1.addEventListener('change', () => {
        const [file] = inputImagenProducto1.files
        if (file) {
            previewImagen1.style.backgroundImage = 'url(' + URL.createObjectURL(file) + ')';
        }
    }) 
    
    const inputImagenProducto2 = document.getElementById('imagenProducto2');
    const previewImagen2 = document.getElementById('previewImagen2');
    const iconoPreviewImagen2 = document.getElementById('iconoPreviewImagen2');
    inputImagenProducto2.addEventListener('change', () => {
        const [file] = inputImagenProducto2.files
        if (file) {
            previewImagen2.style.backgroundImage = 'url(' + URL.createObjectURL(file) + ')';
        }
    }) 
    
    const inputImagenProducto3 = document.getElementById('imagenProducto3');
    const previewImagen3 = document.getElementById('previewImagen3');
    const iconoPreviewImagen3 = document.getElementById('iconoPreviewImagen3');
    inputImagenProducto3.addEventListener('change', () => {
        const [file] = inputImagenProducto3.files
        if (file) {
            previewImagen3.style.backgroundImage = 'url(' + URL.createObjectURL(file) + ')';
        }
    }) 
    
    const inputVideoProducto = document.getElementById('videoProducto');
    const previewVideo = document.getElementById('previewVideo');
    const iconoPreviewVideo = document.getElementById('iconoPreviewVideo');
    inputVideoProducto.addEventListener('change', () => {
        const [file] = inputVideoProducto.files;
        if (file) {
            previewVideo.style.display = 'block';
            previewVideo.src = URL.createObjectURL(file);
        }
    }) 
}

