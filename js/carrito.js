$(document).ready(() => {

    getProductosCarrito();
    let totalPagar = 0.00;
    async function getProductosCarrito() {
    
        //Se limpia la tabla
        $('#contenedor-productos-carrito').html('');
    
        try {
            let response = await fetch('../controllers/readProductoCarrito.php');
    
            //Espera a obtener la respuesta y la convierte la respuesta en un JSON
            let responseJSON = await response.json();

            await responseJSON.forEach(proCarr => {
                $('#contenedor-productos-carrito').append(`
                <div class="producto-carrito" data-idproducto="1">
                    <div class="imagen-producto-carrito rounded");>
                    </div>
                    <div class="informacion-producto-carrito">
                        <div class="">
                            <h2>${proCarr.Nombre}</h2>
                            <h4 id="precioProducto1" class="precio-producto">$${proCarr.Precio}</h4>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="d-flex gap-1 align-items-center">
                                <button class="btn btn-primario btn-sm boton-menos-cantidad rounded-pill" data-idproductocarrito="${proCarr.IdProductoCarrito}"><i class="bi bi-dash"></i></button>
                                <input name="1" class="form-control text-center input-cantidad" value="${proCarr.Cantidad}">
                                <button class="btn btn-primario btn-sm boton-mas-cantidad rounded-pill" data-idproductocarrito="${proCarr.IdProductoCarrito}"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                        <div class="total d-none d-lg-block">
                            <h4 class="total-producto">$${proCarr.Precio * proCarr.Cantidad}</h4>
                        </div>
                        <div class="eliminar d-none d-lg-block">
                            <button class="btn"><i class="bi bi-trash-fill text-danger fs-4 boton-eliminar-productoCarrito" data-idproductocarrito="${proCarr.IdProductoCarrito}"></i></button>
                        </div>
                    </div>
                    <div class="boton-quitar-producto d-block d-lg-none"><button class="btn"><i class="bi bi-x-circle-fill text-secondary fs-4"></i></button></div>
                </div>
                `);
                totalPagar = totalPagar + parseFloat(proCarr.Precio * proCarr.Cantidad);
            })

            $('#totalCarrito').html('$ ' + totalPagar);

            $('.boton-eliminar-productoCarrito').on('click', async function() {
                //Se obtiene el valor del atributo "data-idpro" (practicamente el id del producto seleccionado)
                var id = $(this).data('idproductocarrito');
    
                //Se crea un objeto que contenga dicho id
                var formData = {
                    idProductoCarrito: id
                };
    
                console.log(id)
    
                //Alerta de advertencia y confirmacion para eliminar el producto seleccionada
                Swal.fire({
                    title: 'Advertencia!',
                    text: '¿Estás segur@ de eliminar este producto del Carrito?',
                    icon: 'warning',
                    showCancelButton: true
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        //Se ejecuta el controlador deleteWishlist FALTA CREARLO
                            fetch('../controllers/deleteProductoCarrito.php', {
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
                                    'Producto eliminado del Carrito correctamente',
                                    'success'
                                )
                                .then(async() => {
                                    //Vuelve a imprimir todos los wishlist
                                    getProductosCarrito();
                                    totalPagar = 0;
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
                //restar 1 a cantidad
                $('.boton-menos-cantidad').on('click', async function() {
                    //Se obtiene el valor del atributo "data-idpro" (practicamente el id del producto seleccionado)
                    var id = $(this).data('idproductocarrito');
        
                    //Se crea un objeto que contenga dicho id
                    var formData = {
                        idProductoCarrito: id
                    };
        
                    console.log(id)
        
                    //Alerta de advertencia y confirmacion para eliminar el producto seleccionada
                    Swal.fire({
                        title: 'Advertencia!',
                        text: '¿Estás segur@ de bajar la cantidad en 1?',
                        icon: 'warning',
                        showCancelButton: true
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            //Se ejecuta el controlador deleteWishlist FALTA CREARLO
                                fetch('../controllers/updateProductoCarritoRestar1.php', {
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
                                        'Producto eliminado del Carrito correctamente',
                                        'success'
                                    )
                                    .then(async() => {
                                        //Vuelve a imprimir todos los wishlist
                                        getProductosCarrito();
                                        totalPagar = 0;
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
                    // sumar 1 a cantidad
                    $('.boton-mas-cantidad').on('click', async function() {
                        //Se obtiene el valor del atributo "data-idpro" (practicamente el id del producto seleccionado)
                        var id = $(this).data('idproductocarrito');
            
                        //Se crea un objeto que contenga dicho id
                        var formData = {
                            idProductoCarrito: id
                        };
            
                        console.log(id)
            
                        //Alerta de advertencia y confirmacion para eliminar el producto seleccionada
                        Swal.fire({
                            title: 'Advertencia!',
                            text: '¿Estás segur@ de sumar 1 cantidad?',
                            icon: 'warning',
                            showCancelButton: true
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                //Se ejecuta el controlador deleteWishlist FALTA CREARLO
                                    fetch('../controllers/updateProductoCarritoSumar1.php', {
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
                                            'Producto eliminado del Carrito correctamente',
                                            'success'
                                        )
                                        .then(async() => {
                                            //Vuelve a imprimir todos los wishlist
                                            getProductosCarrito();
                                            totalPagar = 0;
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
        }
        catch(exception){
            alert('No existen productos registrados en esta cuenta. Continue para crearlos')
            $('#loader').hide();
        }  
    
    }
})

/*
let menos = document.querySelectorAll('.boton-menos-cantidad');
let mas = document.querySelectorAll('.boton-mas-cantidad');
let totalCarritoElement = document.getElementById('totalCarrito');

menos.forEach(botonMenos => {
    botonMenos.addEventListener('click', ()=> {
        let fieldName = botonMenos.dataset.idproducto;
        let input = document.getElementsByName(fieldName)[0];
        let currentVal = parseFloat(document.getElementsByName(fieldName)[0].value);
        if(!isNaN(currentVal)) {
            if(currentVal!=0) {
                input.value = currentVal - 1;
                sumFila();
            }
        }
        else {
            input.value = 0;
        }
    })
});
mas.forEach(botonMas => {
    botonMas.addEventListener('click', ()=> {
        let fieldName = botonMas.dataset.idproducto;
        let input = document.getElementsByName(fieldName)[0];
        let currentVal = parseFloat(document.getElementsByName(fieldName)[0].value);
        if(!isNaN(currentVal)) {
            input.value = currentVal + 1;
            sumFila();
        }
        else {
            input.value = 0;
        }
    })
});

function sumFila() {
    let inputsCantidad = document.querySelector('.contenedor-productos-carrito').getElementsByTagName('input');
    let preciosProducto = document.querySelectorAll('.precio-producto');
    let totalProducto = document.querySelectorAll('.total-producto');

    console.log(inputsCantidad.length);
    console.log(preciosProducto.value);
    console.log(totalProducto.value);

    for(let i = 0; i < inputsCantidad.length; i++) {
        totalProducto[i].innerHTML = '';
        totalProducto[i].innerHTML = (parseFloat(inputsCantidad[i].value) * parseFloat(preciosProducto[i].innerHTML));
    }
    sumCarrito();
}

function sumCarrito() {
    let totalProducto = document.querySelectorAll('.total-producto');
    let totalCarrito = 0;
    for(let i = 0; i < totalProducto.length; i++) {
        totalCarrito += parseFloat(totalProducto[i].innerHTML);
    }
    totalCarritoElement.innerHTML = '';
    totalCarritoElement.innerHTML = totalCarrito;
}
*/
