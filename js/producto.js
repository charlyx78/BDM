$(document).ready(async() => {
    
    let Resena = 0;
    getSiYaComproProducto();

    urlParametros = new URLSearchParams(window.location.search);
    idProducto = urlParametros.get("idProducto");
    
    //Se guarda en una variable la respuesta del controlador findProducto
    let response = await fetch('../controllers/findProducto.php?idProducto=' + idProducto, {
        method: 'GET'
    });
    //Espera a obtener la respuesta y la convierte la respuesta en un JSON
    let responseJSON = await response.json();

    $('#categoriaProducto').text(responseJSON.Categoria);
    $('#nombreProducto').text(responseJSON.Nombre);

    if(responseJSON.Tipo == "Precio fijo"){
        $('#campoCantidad').show();
        $('#precioProducto').text('$' + responseJSON.Precio);
        $('.btnPedirCotizacion').hide();
        $('.btnAgregarCarrito').show();
    }
    else {
        $('#campoCantidad').hide();
        $('#precioProducto').text('Precio cotizable');
        $('.btnPedirCotizacion').show();
        $('.btnPedirCotizacion').attr('href', 'chat.php?idUsuario=' + responseJSON.IDVendedor + '&idProducto=' + responseJSON.ID);
        $('.btnAgregarCarrito').hide();
    }
    
    $('#valoracionProducto').text(responseJSON.Calificacion);
    $('#stockProducto').text(responseJSON.CantidadInventario)
    $('.textoDescProd').text(responseJSON.Descripcion);
    $('#vendedorProducto').text(responseJSON.Vendedor);
    $('#vendedorProducto').attr('href', 'account.php?idUsuario=' + responseJSON.IDVendedor);

    $('#videoProducto').attr('src', responseJSON.Video);
    $('.muestra-multimedia2').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen1 + "')");
    $('.thumbnail-multimedia2').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen1 + "')");

    $('.muestra-multimedia3').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen2 + "')");
    $('.thumbnail-multimedia3').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen2 + "')");

    $('.muestra-multimedia4').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen3 + "')");
    $('.thumbnail-multimedia4').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen3 + "')");

    getWishlist();
    getComentarios();
    $('#loader').hide();
    
    
    $('#formAddProductoWishlist').submit((e) => {
        e.preventDefault();
        let idWishlist = $('#wishlist').val();
        
        var formData = {
            idProducto: idProducto,
            idWishlist : idWishlist
        };

        fetch('../controllers/addProductoWishlist.php', {
            method: 'POST',
            body: JSON.stringify(formData) ,
            headers: {
                'Content-Type': 'application/json'
            }
        })   
        .then(()=> {
            Swal.fire(
                'Exito!',
                'Producto agregado a wishlist correctamente',
                'success'
                )
                .then(() => {
                    $('#wishlistModal').modal('hide')
                })
            }) 
        })
        
    const formAddProductoACarrito = document.getElementById("formAddProductoACarrito");
    formAddProductoACarrito.addEventListener("submit", e=> {
        e.preventDefault();
        const CantidadAgregar = document.getElementById("CantidadAgregar");

        var formData = {
            idProducto: idProducto,
            cantidadProducto: CantidadAgregar.value,
            precioProducto: responseJSON.Precio
        };

        if(CantidadAgregar.value <= 0){
            Swal.fire(
                'Error',
                'Cantidad a agregar no puede ser 0',
                'error'
                )        }
        else if(CantidadAgregar.value > responseJSON.CantidadInventario) {
            Swal.fire(
                'Error',
                'No hay cantidad suficiente en el inventario',
                'error'
                )
        }
        else {
            //alert("Agregado al Carrito " + CantidadAgregar.value)
            console.log(JSON.stringify(formData));
            fetch('../controllers/addCarrito.php', {
                method: 'POST',
                body: JSON.stringify(formData) ,
                headers: {
                    'Content-Type': 'application/json'
                }
            })   
            .then(()=> {
                Swal.fire(
                    'Exito!',
                    'Producto agregado a Carrito correctamente',
                    'success'
                    )
                    .then(() => {
                        $('#CantidadAgregar').val("")
                    })
                }) 
        }
    })

    $('#form-resena').submit((e) => {//Hay que hacer el Forms
        e.preventDefault();

        const ComentarioResena = document.getElementById("contenidoComentario");
        const CalificacionResena = document.querySelector('input[name="star-input"]:checked').value;

        var formData = {
            ComentarioResena: ComentarioResena.value,
            CalificacionResena: CalificacionResena,
            idProducto: idProducto
        };

        console.log(JSON.stringify(formData));
        fetch('../controllers/addResena.php', {
            method: 'POST',
            body: JSON.stringify(formData) ,
            headers: {
                'Content-Type': 'application/json'
            }
        })   
        .then((response)=> {
            Swal.fire(
                'Exito!',
                'Resena Agregada Correctamente',
                'success'
                )
                .then(() => {
                    ComentarioResena.value = '';
                    CalificacionResena.value = 0;
                    $('#comentarioModal').modal('hide')
                    getComentarios();
                })
            }) 
    })

async function getComentarios() {
    //Se limpia la tabla
    $('.comentarios').html('');
    
    try {
        //Se guarda en una variable la respuesta del controlador readCategorias
        let response = await fetch('../controllers/readValoracion.php?idProducto='+idProducto);

        //Espera a obtener la respuesta y la convierte la respuesta en un JSON
        let responseJSON = await response.json();

        //Itera cada dato de este para imprimirlo en la tabla del HTML
        await responseJSON.forEach(val => {
            $('.comentarios').append(`
            <div class="comentario">
                <div class="contenido-comentario"><p class="p-0">${val.Comentario}</p></div>
                <div class="d-flex align-items-center gap-4">
                    <div class="calificacion-comentario"><h4 class="text-secondary"><i class="bi bi-star-fill me-2"></i>${val.Calificacion}</h4></div>
                    <div class="usuario-fecha-comentario">
                        <a class="text-secondary" href="account.php?idUsuario=${val.IDCliente}">${val.Cliente}</a>
                        <h4 class="text-secondary">-</h4>
                        <h4 class="text-secondary">${val.Fecha}</h4>
                    </div>
                </div>
            </div>`);  
        });
    }
    catch(exception){
        // alert('No existen productos registrados en esta cuenta. Continue para crearlos')
        $('#loader').hide();
    }   
}    


async function getWishlist() {
    //Se limpia la tabla
    $('#wishlist').html('');
    
    try {
        //Se guarda en una variable la respuesta del controlador readCategorias
        let response = await fetch('../controllers/readWishlist.php');

        //Espera a obtener la respuesta y la convierte la respuesta en un JSON
        let responseJSON = await response.json();

        //Itera cada dato de este para imprimirlo en la tabla del HTML
        await responseJSON.forEach(wish => {
            $('#wishlist').append(`
            <option value="${wish.ID}">
                ${wish.Nombre}  
            </option>`);  
        });
    }
    catch(exception){
        // alert('No existen productos registrados en esta cuenta. Continue para crearlos')
        $('#btnAgregarWishlist').addClass('disabled')
        $('#loader').hide();
    }   
}

async function getSiYaComproProducto() {
    try {
        let response = await fetch('../controllers/readProductosClienteComprados.php');

        //Espera a obtener la respuesta y la convierte la respuesta en un JSON
        let responseJSON = await response.json();

        urlParametros = new URLSearchParams(window.location.search);
        idProducto = urlParametros.get("idProducto");

        await responseJSON.forEach(proCarr => {

            var formData = {//Datos a Pasar
                IdProductoComprado: proCarr.IdProducto
            };

            let idJsonString = JSON.stringify(proCarr.IdProducto)
            if(idJsonString == idProducto){
                Resena = 1;
            }
        })
        if(Resena == 0) {
            $('#btnAnadirResena').addClass('disabled')
        }
        $('#loader').hide();
        console.log(Resena);
    }
    catch(exception){
        if(Resena == 0) {
            $('#btnAnadirResena').addClass('disabled')
        }
        $('#loader').hide();
    }
}

// const formAddProductoACarrito = document.getElementById("formAddProductoACarrito");
// formAddProductoACarrito.addEventListener("submit", e=> {
//     e.preventDefault();

//     const CantidadAgregar = document.getElementById("CantidadAgregar");

//     if(CantidadAgregar.value.length <= 0){
//         alert("Cantidad a Agregar Vacia");
//     }
//     else {
//         alert("Agreagdo al Carrito")
//     }
// })
})
// const btnHeaderComentarios = document.getElementById('headerComentarios');
// let rotado = false;
// btnHeaderComentarios.addEventListener('click', () => {
//     const iconoChevron = document.getElementById('iconoChevron');
//     if(!rotado){
//         iconoChevron.style.transform = 'rotate(180deg)';
//         iconoChevron.style.transition = 'ease 0.2s';
//         rotado = true;
//     }
//     else {
//         iconoChevron.style.transform = 'rotate(0deg)';
//         iconoChevron.style.transition = 'ease 0.2s';
//         rotado = false;
//     }

// })