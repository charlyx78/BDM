$(document).ready(async function() {

    const idSesion = sessionStorage.getItem('UsuarioSesion');
    const urlParametros = new URLSearchParams(window.location.search);
    const idUsuario = urlParametros.get("idUsuario");
    const idProducto = urlParametros.get("idProducto");

    const contactos =  []
    const mensajes = []

    if(idUsuario && idProducto) {
        crearContacto();
    }

    await getContactos();

    //Enviar mensaje
    $('#formMensaje').on('submit', (e) => {
        e.preventDefault();

        const formData = {
            destinatario: idUsuario,
            mensaje: $('#txtMensaje').val(),
            isProducto: 0,
            producto: idProducto
        };

        fetch('../controllers/addMensaje.php', {
            method: 'POST',
            body: JSON.stringify(formData)
        })    
        .then(() => {
            $('#txtMensaje').val('')
            getMensajes();
            actualizarScrollMensajes();
        })
        .catch(error => {
            //Alerta de error
            Swal.fire(
                'Error',
                error.message,
                'error'
            );
        });
    })

    getContactoInfo()

    setInterval(getMensajes, 500);

    $('#btnScroll').on('click', actualizarScrollMensajes)

    function crearContacto() {
        const formData = {
            idUsuario: idUsuario,
            idProducto: idProducto
        };
    
        fetch('../controllers/addContacto.php', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json'
            }
        })
    }
    
    async function getContactos(){
        let response = await fetch('../controllers/readContacto.php');
        let responseJSON = await response.json();

        await responseJSON.forEach(contacto => {
            if(contacto.IDUsuario1 != idSesion) {
                contactos.push({
                    idContacto: contacto.ID,
                    idUsuario: contacto.IDUsuario1,
                    nombreUsuario: contacto.NombreUsuario1,
                    idProducto: contacto.IDProducto,
                    nombreProducto: contacto.Producto,
                    idVendedor: contacto.IDVendedor,
                    categoriaProducto: contacto.Categoria,
                    imagenProducto: contacto.Imagen1
                })
            }
            else {
                contactos.push({
                    idContacto: contacto.ID,
                    idUsuario: contacto.IDUsuario2,
                    nombreUsuario: contacto.NombreUsuario2,
                    idProducto: contacto.IDProducto,
                    nombreProducto: contacto.Producto,
                    idVendedor: contacto.IDVendedor,
                    categoriaProducto: contacto.Categoria,
                    imagenProducto: contacto.Imagen1
                })
            }
        })

        imprimirContactos()
    }

    async function getContactoInfo(){
        let contacto = await contactos.find((contacto) => contacto.idUsuario == idUsuario && contacto.idProducto == idProducto)
        
        if(idSesion != contacto.idVendedor) {
            $('#btnAbrirModalProducto').hide();
        }
        else {
            $('#btnAbrirModalProducto').show();
            $('#formGenerarProducto').on('submit', async (e) => {
                e.preventDefault();
                
                const precioProducto = $('#precioProducto') 
        
                let responseProducto = await fetch('../controllers/findProducto.php?idProducto=' + idProducto);
                let responseProductoJSON = await responseProducto.json();
        
                var formData = new FormData();
                formData.append('nombreProducto', responseProductoJSON.Nombre);
                formData.append('categoriaProducto', responseProductoJSON.IdCategoria);
                formData.append('tipoVentaProducto', 1); 
                formData.append('precioProducto', isNaN(precioProducto.val()) ? 0 : precioProducto.val()); 
                formData.append('stockProducto', 1);
                formData.append('descripcionProducto', responseProductoJSON.Descripcion);
                formData.append('productoAUsuario', parseInt(idUsuario, 10));
                formData.append('imagenProducto1', responseProductoJSON.Imagen1);
                formData.append('imagenProducto2', responseProductoJSON.Imagen2);
                formData.append('imagenProducto3', responseProductoJSON.Imagen3);
                formData.append('videoProducto', responseProductoJSON.Video);
                formData.append('activo', 2);
                formData.append('idProducto', idProducto);
                
                await fetch('../controllers/addProducto.php', {
                    method: 'POST',
                    body: formData
                })  
                .then(async(response) => {                    
                    console.log(response)
                    precioProducto.val('')
                    $('#productoModal').modal('hide')

                    let responseJSON = await response.json()
                    console.log(responseJSON)

                    const formData = {
                        destinatario: idUsuario,
                        mensaje: 'producto.php?idProducto=' + responseJSON.ultimoId,
                        isProducto: 1,
                        producto: idProducto
                    };
            
                    fetch('../controllers/addMensaje.php', {
                        method: 'POST',
                        body: JSON.stringify(formData)
                    })    
                    .then(() => {
                        Swal.fire(
                            'Exito!',
                            'Producto cotizado correctamente',
                            'success'
                        )
                        $('#txtMensaje').val('')
                        getMensajes();
                        actualizarScrollMensajes();
                    })
                })
                .catch((error) => {
                    console.log(error)
                })

            })
        }

        $('#linkContacto').attr('href', 'account.php?idUsuario=' + contacto.idUsuario)
        $('#imagenProducto').css('background-image', 'url("data:image/png;base64,'+contacto.imagenProducto+'")')
        $('#headContacto').text(contacto.nombreUsuario)
        $('#headProducto').text(' (' + contacto.nombreProducto + ')')
        $('#categoriaProducto').text(contacto.categoriaProducto)
        $('#nombreProducto').text(contacto.nombreProducto)
    }

    function imprimirContactos() {
        const contenedorContactos = $('#contactos')

        contenedorContactos.html('')

        contactos.forEach(contacto => {
            contenedorContactos.append(`
            <li class="contacto-item list-group-item">
                <a href="chat.php?idUsuario=${contacto.idUsuario}&idProducto=${contacto.idProducto}" class="contacto">
                    <div class="imagen-contacto">
                    </div>
                    <div class="informacion-contacto">
                        <h2>${contacto.nombreUsuario}</h2>
                        <p class="m-0 text-secondary text-truncate">${contacto.nombreProducto}</p>
                    </div>
                </a>
            </li>`)
        })
    }

    async function getMensajes(){
        mensajes.length = 0
        
        let response = await fetch('../controllers/readMensaje.php?idUsuario=' + idUsuario + '&idProducto=' + idProducto);
        let responseJSON = await response.json();
        
        responseJSON.forEach(mensaje => {
            mensajes.push({
                idMensaje: mensaje.ID,
                idRemitente: mensaje.IDRemitente,
                remitente: mensaje.Remitente,
                idDestinatario: mensaje.IDDestino,
                destinatario:  mensaje.Destino,
                mensaje: mensaje.Mensaje,
                fecha: mensaje.Fecha,
                isProducto: mensaje.IsProducto
            })
        })

        imprimirMensajes()
    }

    function imprimirMensajes() {
        const contenedorMensajes = $('#mensajes')

        contenedorMensajes.html('')

        mensajes.forEach((mensaje) => {
            if(mensaje.idRemitente == idSesion) {
                contenedorMensajes.append(`
                <div class="mensaje mb-2">
                    <div class="rounded-pill mensaje-remoto rounded">${mensaje.isProducto == 1 ? '<a class="text-light" href="../views/'+mensaje.mensaje+'">'+mensaje.mensaje+'</a>' : mensaje.mensaje}</div>
                </div>
                <div class="text-end text-secondary text-end mb-3" style="font-size: 0.7em;">${mensaje.fecha}</div>`)
            }
            else {
                contenedorMensajes.append(`
                <div class="mensaje mb-2">
                    <div class="rounded-pill mensaje-local rounded">${mensaje.isProducto == 1 ? '<a href="../views/'+mensaje.mensaje+'">'+mensaje.mensaje+'</a>' : mensaje.mensaje}</div>
                </div>
                <div class="text-start text-secondary mb-3" style="font-size: 0.7em;">${mensaje.fecha}</div>`)
            }
        })
    }

    function actualizarScrollMensajes() {
        const contenedorMensajes = $('.contenedor-mensajes');
        const height = contenedorMensajes.height();
        const bottomScroll = contenedorMensajes.prop('scrollHeight') - height;
        contenedorMensajes.get(0).animate({ scrollTop: bottomScroll}, 1000);
    }
    
    


})