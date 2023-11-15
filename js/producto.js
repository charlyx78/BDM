$(document).ready(async() => {
    const urlParametros = new URLSearchParams(window.location.search);
    const idProducto = urlParametros.get("idProducto");
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

    console.log(idProducto);
    console.log(responseJSON);
})

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