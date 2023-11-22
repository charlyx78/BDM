$(document).ready(async() => {

    const contenedorProductos = $('.contenedor-productos-busqueda');

    const urlParametros = new URLSearchParams(window.location.search);
    const nombreProducto = urlParametros.get("nombreProducto");

    $('#productoEnBusqueda').text(nombreProducto)
    
    let response = await fetch('../controllers/searchProducto.php?nombreProducto=' + nombreProducto) 
    let responseJSON = await response.json();
    
    contenedorProductos.html('');
    
    imprimirProductos(responseJSON)


    $('#formBusquedaAvanzadaProducto').on('submit', async function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        let response = await fetch('../controllers/searchProducto.php', {
            method: 'POST',
            body: formData
        })
        
        let responseJSON = await response.json()

        await imprimirProductos(responseJSON);
        $('#productoEnBusqueda').text(formData.get('nombreProducto'));        
    })
    
    function imprimirProductos(responseJSON) {  
        contenedorProductos.html('')
        if(responseJSON.error){
            $('.mensaje-error').show();
        }
        else {
            $('.mensaje-error').hide();
            responseJSON.forEach((producto) => {
                contenedorProductos.append(`
                <li class="producto-busqueda-item">
                    <a class="producto-busqueda" href="producto.php?idProducto=${producto.ID}">
                        <div class="imagen-producto-busqueda" style="background-image: url('data:image/png;base64,${producto.Imagen1}');">
                        </div>
                        <div class="informacion-producto-busqueda">
                            <h6 class="text-secondary">${producto.Categoria}</h6>
                            <h2>${producto.Nombre}</h2>
                            <h4>${producto.Precio == null ? 'Precio cotizable' : '$' + producto.Precio}</h4>
                            <div class="calificacion-producto-busqueda">
                                <i class="bi bi-star-fill color-oro"></i>
                                <p class="m-0 text-secondary">${producto.Calificacion}</p>
                            </div>
                        </div>
                    </a>
                </li>`);
            })
        }
    }

})