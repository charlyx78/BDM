$(document).ready(async () => {
    $('#formAddProducto').on('submit', function(e) {
        e.preventDefault();
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
    
        var formData = new FormData(this);
        console.log(formData);
    

        if(nombreProducto.val() != "" &&
            categoriaProducto.val() != "" &&
            tipoVentaProducto.val() != "" &&
            precioProducto.val() != "" &&
            stockProducto.val() != "" &&
            descripcionProducto != "" &&
            imagenProducto1.val() != "" &&
            imagenProducto2.val() != "" &&
            imagenProducto3.val() != "" &&
            videoProducto.val() != "") {
            fetch('../controllers/addProducto.php', {
                method: 'POST',
                body: formData
            })
            .then(() => {
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

    //Se guarda en una variable la respuesta del controlador readCategorias
    let response = await fetch('../controllers/readProducto.php');

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
            <td>${pro.ProFK_IdTipoP = 1 ? 'Precio fijo' : 'Cotizable'}</td>
            <td>${pro.ProFechaRegistro}</td>
            <td><span class="badge rounded-pill ${pro.ProFK_IdActivo = 2 ? 'bg-success': 'bg-error'} fs-6">${pro.ProFK_IdActivo = 2 ? 'Activo': 'Inactivo'}</span></td>
            <td class="text-center"><button class="btn btn-secundario btn-editar-categoria" data-idcat="${pro.PK_IdProducto}" data-bs-toggle="modal" data-bs-target="#nuevaCategoriaModal"><i class="bi bi-pencil"></i></button></td>
            <td class="text-center"><button class="btn btn-danger btn-eliminar-categoria" data-idcat="${pro.PK_IdProducto}"><i class="bi bi-trash3"></i></button></td>
        </tr>`);  
    });

    $('#loader').hide();
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
            iconoPreviewImagen1.style.display = 'none';
        }
    }) 
    
    const inputImagenProducto2 = document.getElementById('imagenProducto2');
    const previewImagen2 = document.getElementById('previewImagen2');
    const iconoPreviewImagen2 = document.getElementById('iconoPreviewImagen2');
    inputImagenProducto2.addEventListener('change', () => {
        const [file] = inputImagenProducto2.files
        if (file) {
            previewImagen2.style.backgroundImage = 'url(' + URL.createObjectURL(file) + ')';
            iconoPreviewImagen2.style.display = 'none';
        }
    }) 
    
    const inputImagenProducto3 = document.getElementById('imagenProducto3');
    const previewImagen3 = document.getElementById('previewImagen3');
    const iconoPreviewImagen3 = document.getElementById('iconoPreviewImagen3');
    inputImagenProducto3.addEventListener('change', () => {
        const [file] = inputImagenProducto3.files
        if (file) {
            previewImagen3.style.backgroundImage = 'url(' + URL.createObjectURL(file) + ')';
            iconoPreviewImagen3.style.display = 'none';
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
            iconoPreviewVideo.style.display = 'none';
        }
    }) 
}

