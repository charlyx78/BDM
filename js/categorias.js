$(document).ready(async () => {

    nombreCategoria = $('#nombreCategoria');
    descripcionCategoria = $('#descripcionCategoria');
    isEditando = false;

    //Al abrir el modal desde el boton de nueva categoria se resetean los campos del formulario y se cambia la variable isEditando a false 
    $('#btnAbrirModal').click(() => {
        isEditando = false;
        $('#idcat').text('');
        nombreCategoria.val('');
        descripcionCategoria.val('');
    })

    //Evento de submit del formulario de categoria
    $('#formAddCategoria').submit((e) => {
        e.preventDefault();
        //Validacion JS
        if(nombreCategoria.val() != "") {
            //Se crea un objeto JSON para enviar al servidor
            var formData = {
                idCategoria: $('#idcat').text(),
                nombreCategoria: nombreCategoria.val(),
                descripcionCategoria: descripcionCategoria.val()
            };
            
            if(!isEditando) {
                //Se ejecuta el controlador addCategoria
                fetch('../controllers/addCategoria.php', {
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
                        'Categoria agregada correctamente',
                        'success'
                    ).then(() => {
                        //Vuelve a imprimir todas las categorias
                        getCategorias();
                        //Cierra el modal y se resetean los campos del formulario de este
                        $('#nuevaCategoriaModal').modal('hide')
                        nombreCategoria.val("");
                        descripcionCategoria.val("");
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
                //Se ejecuta el controlador updateCategoria
                fetch('../controllers/updateCategoria.php', {
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
                        'Categoria actualizada correctamente',
                        'success'
                    ).then(() => {
                        //Vuelve a imprimir todas las categorias
                        getCategorias();
                        //Cierra el modal y se resetean los campos del formulario de este
                        $('#nuevaCategoriaModal').modal('hide')
                        nombreCategoria.val("");
                        descripcionCategoria.val("");
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
                'Asigna un nombre a la categoria para continuar',
                'warning'
            );
        }
    });

    //Se imprimen todas las categorias al iniciar el HTML
    getCategorias();

})

async function getCategorias() {
    //Se limpia la tabla
    $('#tablaCategorias').html('');
    //Se guarda en una variable la respuesta del controlador readCategorias
    let response = await fetch('../controllers/readCategoria.php');
    //Espera a obtener la respuesta y la convierte la respuesta en un JSON
    let responseJSON = await response.json();
    //Itera cada dato de este para imprimirlo en la tabla del HTML
    await responseJSON.forEach(cat => {
        $('#tablaCategorias').append(`
        <tr>
            <td>${cat.CatNombre}</td>
            <td>${cat.CatDescripcion != "" ? cat.CatDescripcion : "Sin descripción"}</td>
            <td class="text-center"><button class="btn btn-secundario btn-editar-categoria" data-idcat="${cat.PK_IdCategoria}" data-bs-toggle="modal" data-bs-target="#nuevaCategoriaModal"><i class="bi bi-pencil"></i></button></td>
            <td class="text-center"><button class="btn btn-danger btn-eliminar-categoria" data-idcat="${cat.PK_IdCategoria}"><i class="bi bi-trash3"></i></button></td>
        </tr>`);  
    });
    //Una vez terminada la impresion de los datos de la respuesta del controlador "categorias", se le asigna un evento a cada boton de editar
    $('.btn-editar-categoria').click(async function() {
        isEditando = true;
        //Se obtiene el valor del atributo "data-idcat" (practicamente el id de la categoria seleccionada)
        var id = $(this).data('idcat');
        //Se crea un objeto que contenga dicho id
        var formData = {
            idCategoria: id
        };
        //Guardamos en una variable la respuesta del controlador para encontrar una categoria por su id "findCategoria"
        let response = await fetch('../controllers/findCategoria.php', {
            method: 'POST',
            body: JSON.stringify(formData),
        });
        //Convierte la respuesta del controlador en un JSON 
        let responseJSON = await response.json();
        //Asignamos el valor del span que se encuentra en el header del modal al de el id de la categoria que obtuvimos previamente con "findCategoria"
        $('#idcat').text(responseJSON.PK_IdCategoria);
        //Asignamos a los campos del formulario los valores de la categoria seleccionada
        nombreCategoria.val(responseJSON.CatNombre);
        descripcionCategoria.val(responseJSON.CatDescripcion);
    })
    //Se le asigna un evento a cada boton de editar
    $('.btn-eliminar-categoria').on('click', async function() {
        //Se obtiene el valor del atributo "data-idcat" (practicamente el id de la categoria seleccionada)
        var id = $(this).data('idcat');
        //Se crea un objeto que contenga dicho id
        var formData = {
            idCategoria: id
        };
        //Alerta de advertencia y confirmacion para eliminar la categoria seleccionada
        Swal.fire({
            title: 'Advertencia!',
            text: '¿Estás segur@ de eliminar esta categoría?',
            icon: 'warning',
            showCancelButton: true
        })
        .then((result) => {
            if (result.isConfirmed) {
                //Se ejecuta el controlador deleteCategoria
                fetch('../controllers/deleteCategoria.php', {
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
                        'Categoria eliminada correctamente',
                        'success'
                    )
                    .then(() => {
                        //Vuelve a imprimir todas las categorias
                        getCategorias();
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