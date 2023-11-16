$(document).ready(async() => {
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
    $('#precioProducto').text('$' + responseJSON.Precio);
    $('#valoracionProducto').text(responseJSON.Calificacion);
    $('.textoDescProd').text(responseJSON.Descripcion);

    $('#videoProducto').attr('src', responseJSON.Video);
    $('.muestra-multimedia2').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen1 + "')");
    $('.thumbnail-multimedia2').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen1 + "')");

    $('.muestra-multimedia3').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen2 + "')");
    $('.thumbnail-multimedia3').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen2 + "')");

    $('.muestra-multimedia4').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen3 + "')");
    $('.thumbnail-multimedia4').css('background-image', "url('data:image/png;base64," + responseJSON.Imagen3 + "')");

    getWishlist();

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

        if(CantidadAgregar.value.length <= 0){
            alert("Cantidad a Agregar Vacia");
        }
        else {
            //alert("Agregado al Carrito " + CantidadAgregar.value)
            console.log(JSON.stringify(formData));
            fetch('../controllers/addCarrito.php', {
                method: 'POST',
                body: formData
            })
            .then((response) => {
                console.log(response)
                //Alerta de confirmacion
                Swal.fire(
                    'Exito!',
                    'Producto agregado al Carrito',
                    'success'
                ).then(async() => {
                    //Se resetean los campos del formulario de este
                    CantidadAgregar.value = 0;
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
    })


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
        alert('No existen productos registrados en esta cuenta. Continue para crearlos')
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