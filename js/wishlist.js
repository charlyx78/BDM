$(document).ready(() => {
    $('#formAddWishlist').on('submit', function(e) {
        e.preventDefault();
        
        isEditando = false;

        const nombreWishlist = $("#nombreWishlist");
        const descripcionWishlist = $("#descripcionWishlist");
        const imagenWishlist = $('#imagenWishlist');
        const privacidadWishlistRadio = $("input[name='privacidadWishlist']");
    
        var privacidadWishlist = null;
    
        for (var radio of privacidadWishlistRadio)
        {
            if (radio.checked) {
                privacidadWishlist = radio.value;
            }
        }
    
        var formData = new FormData(this);
        console.log(formData);
    
        if(nombreWishlist.val() == 0 || descripcionWishlist.val() == 0 || imagenWishlist.val() == '' || privacidadWishlist == null){
            //Alerta de confirmacion
            Swal.fire(
                'Advertencia',
                'Llena todos los campos para continuar',
                'warning'
            );
        }
        else {
            if(!isEditando) {
                fetch('../controllers/addWishlist.php', {
                    method: 'POST',
                    body: formData
                })    
                .then((response) => {
                    //Alerta de confirmacion
                    Swal.fire(
                        'Exito!',
                        'Wishlist creada correctamente',
                        'success'
                    ).then(async () => {
                        getWishlist();
                        $('#nuevaWishlistModal').modal('hide');
                        nombreWishlist.val('');
                        descripcionWishlist.val('');
                        imagenWishlist.val('');
                        privacidadWishlist = null;
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
            else {
                // fetch('../controllers/updateWishlist.php', {
                //     method: 'POST',
                //     body: formData
                // })    
            }
        }
    })

    getWishlist();

    async function getWishlist() {
        //Se limpia la tabla
        $('#contenedorWishlist').html('');
        
        try {
            //Se guarda en una variable la respuesta del controlador readCategorias
            let response = await fetch('../controllers/readWishlist.php');
    
            //Espera a obtener la respuesta y la convierte la respuesta en un JSON
            let responseJSON = await response.json();

            //Itera cada dato de este para imprimirlo en la tabla del HTML
            await responseJSON.forEach(wish => {
                $('#contenedorWishlist').append(`
                <li class="wishlist accordion accordion-flush" id="${wish.ID}">
                    <div class="accordion-item mb-3">
                        <div class="accordion-header" id="heading${wish.ID}">
                            <div class="btn-group contenedor-wishlist-header" role="group" aria-label="acordeon">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${wish.ID}" data-idwishlist=${wish.ID} aria-expanded="false" aria-controls="collapse${wish.ID}">
                                    ${wish.Nombre}   
                                </button>
                                <button type="button" class="btn btn-sm boton-wishlist btn-editar-wishlist" data-idwishlist=${wish.ID} data-bs-toggle="modal" data-bs-target="#nuevaWishlistModal"><i class="bi bi-pencil text-primario fs-5 fw-bold"></i></button>
                                <button type="button" class="btn btn-sm boton-wishlist btn-eliminar-wishlist" data-idwishlist=${wish.ID}><i class="bi bi-trash3 text-danger fs-5 fw-bold"></i></button>
                            </div>
                        </div>  
                        <div id="collapse${wish.ID}" class="accordion-collapse collapse" aria-labelledby="heading${wish.ID}" data-bs-parent="#${wish.ID}">
                            <div class="accordion-body bg-light">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Calificacion</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="body${wish.ID}">                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                </li>`);  
            });
            //Una vez terminada la impresion de los datos de la respuesta del controlador "agregarProducto", se le asigna un evento a cada boton de editar
            // $('.btn-editar-wishlist').on('click', async function() {
            //     isEditando = true;
        
            //     //Se obtiene el valor del atributo "data-ipro" (practicamente el id del producto seleccionado)
            //     var id = $(this).data('idpro');
        
            //     //Se crea un objeto que contenga dicho id
            //     var formData = {
            //         idProducto: id
            //     };
        
            //     //Guardamos en una variable la respuesta del controlador para encontrar una categoria por su id "findProducto"
            //         let response = await fetch('../controllers/findProducto.php', { //FALTA CREAR EL CONTROLADOR
            //             method: 'POST',
            //             body: JSON.stringify(formData),
            //         });
        
            //     //Convierte la respuesta del controlador en un JSON 
            //         let responseJSON = await response.json();
            //         console.log(responseJSON);
                
            //     //Asignamos el valor del span que se encuentra en el header del modal al de el id del producto que obtuvimos previamente con "findProducto"
            //         $('#idpro').text(responseJSON.ID);
        
            //     //Asignamos a los campos del formulario los valores del producto seleccionado
            //     const nombreProducto = $("#nombreProducto");
            //     const categoriaProducto = $("#categoriaProducto");
            //     const tipoVentaProducto = $("#tipoVentaProducto");
            //     const precioProducto = $("#precioProducto");
            //     const stockProducto = $("#stockProducto");
            //     const stockUnidadMedida = $("#stockUnidadMedida");
            //     const descripcionProducto = $("#descripcionProducto");
            //     const imagenProducto1 = $("#imagenProducto1");
            //     const imagenProducto2 = $("#imagenProducto2");
            //     const imagenProducto3 = $("#imagenProducto3");
            //     const videoProducto = $("#videoProducto");
        
            //     nombreProducto.val(responseJSON.Nombre);
            //     categoriaProducto.val(responseJSON.IdCategoria);
            //     tipoVentaProducto.val(responseJSON.IdTipo);
            //     precioProducto.val(responseJSON.Precio);
            //     stockProducto.val(responseJSON.CantidadInventario);
            //     descripcionProducto.val(responseJSON.Descripcion);
            //     // imagenProducto1.val(responseJSON.ProIma1);
            //     // imagenProducto2.val(responseJSON.ProIma2);
            //     // imagenProducto3.val(responseJSON.ProIma3);
            //     // videoProducto.val(responseJSON.ProVideo);
                
            //     previewVideo.style.display = 'block';
            //     previewVideo.src = responseJSON.Video;     
            //     previewImagen1.style.backgroundImage = "url('data:image/png;base64," + responseJSON.Imagen1 + "')";
            //     previewImagen2.style.backgroundImage = "url('data:image/png;base64," + responseJSON.Imagen2 + "')";
            //     previewImagen3.style.backgroundImage = "url('data:image/png;base64," + responseJSON.Imagen3 + "')";
            // })
        
            //Se le asigna un evento a cada boton de editar
            $('.btn-eliminar-wishlist').on('click', async function() {
        
                //Se obtiene el valor del atributo "data-idpro" (practicamente el id del producto seleccionado)
                var id = $(this).data('idwishlist');
        
                //Se crea un objeto que contenga dicho id
                var formData = {
                    idWishlist: id
                };

                console.log(id)
        
                //Alerta de advertencia y confirmacion para eliminar el producto seleccionada
                Swal.fire({
                    title: 'Advertencia!',
                    text: '¿Estás segur@ de eliminar esta wishlist?',
                    icon: 'warning',
                    showCancelButton: true
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        //Se ejecuta el controlador deleteWishlist FALTA CREARLO
                            fetch('../controllers/deleteWishlist.php', {
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
                                    'Wishlist eliminada correctamente',
                                    'success'
                                )
                                .then(async() => {
                                    //Vuelve a imprimir todos los wishlist
                                    getWishlist();
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

            $('.accordion-button').on('click', async function() {
                //Se obtiene el valor del atributo "data-idpro" (practicamente el id del producto seleccionado)
                var id = $(this).data('idwishlist');

                //Se crea un objeto que contenga dicho id
                var formData = {
                    idWishlist: id
                };

                console.log(id)

                //Se guarda en una variable la respuesta del controlador readCategorias
                let response = await fetch('../controllers/readProductoWishlist.php', {
                    method: 'POST',
                    body: JSON.stringify(formData),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
        
                //Espera a obtener la respuesta y la convierte la respuesta en un JSON
                let responseJSON = await response.json();

                $('#body'+id).html('')

                await responseJSON.forEach(prowish => {
                    $('#body'+id).append(`
                    <tr>
                        <td><div class="imagen-producto-wishlist rounded" style="background-image: url('data:image/png;base64,${prowish.Imagen1}');"></div></td>
                        <td><a href="producto.php?idProducto=${prowish.ID}">${prowish.Nombre}</a></td>
                        <td>$${prowish.Precio}</td>
                        <td><i class="bi bi-star-fill color-oro me-2"></i>${prowish.Calificacion} </td>
                        <td><button type="button" class="btn btn-sm btn-outline-secundario w-100 mb-1 mb-lg-0">Agregar al carrito</button></td>
                        <td><button type="button" class="btn btn-sm btn-outline-danger w-100 boton-eliminar-producto" data-idproductolista="${prowish.IDProductoWishlist}">Eliminar</button></td>
                    </tr>
                    `);
                })

                $('.boton-eliminar-producto').on('click', async function() {
                    //Se obtiene el valor del atributo "data-idpro" (practicamente el id del producto seleccionado)
                    var id = $(this).data('idproductolista');

                    //Se crea un objeto que contenga dicho id
                    var formData = {
                        idProductoWishlist: id
                    };

                    console.log(id)

                    //Alerta de advertencia y confirmacion para eliminar el producto seleccionada
                    Swal.fire({
                        title: 'Advertencia!',
                        text: '¿Estás segur@ de eliminar este producto de la wishlist?',
                        icon: 'warning',
                        showCancelButton: true
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            //Se ejecuta el controlador deleteWishlist FALTA CREARLO
                                fetch('../controllers/deleteProductoWishlist.php', {
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
                                        'Producto de wishlist eliminado correctamente',
                                        'success'
                                    )
                                    .then(async() => {
                                        //Vuelve a imprimir todos los wishlist
                                        getWishlist();
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
            })
        
            $('#loader').hide();
        }
        catch(exception){
            alert('No existen productos registrados en esta cuenta. Continue para crearlos')
            $('#loader').hide();
        }   
    }
})
