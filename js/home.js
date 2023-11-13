var btnScrollComprar = document.getElementById('btnComprarHome');
var contenedorProductosParaTi = document.getElementById('contenedorProductosParaTi');
var contenedorProductosParaTiTopPos = contenedorProductosParaTi.offsetTop/1.05;

btnScrollComprar.addEventListener("click", ()=> {
    window.scrollTo(0,contenedorProductosParaTiTopPos);
})

$(document).ready(()=> {
    getProductos(4,"SR");
})


async function getProductos(cantProductosAMostrar, opcionView) {
    
    var contenedorProductos;

    switch(opcionView) {
        case "SR":
            contenedorProductos = $('#productosRecientes');
            break;
    }

    const inicio = 0;
    const fin = inicio + cantProductosAMostrar;

    //Se limpia la tabla
    contenedorProductos.html('');

    var formData = {
        opcionView: opcionView
    };

    //Se guarda en una variable la respuesta del controlador readCategorias
    let response = await fetch('../controllers/readProductoHome.php', {
        method: 'POST',
        body: JSON.stringify(formData),
    });
    //Espera a obtener la respuesta y la convierte la respuesta en un JSON
    let responseJSON = await response.json();

    console.log(response)
    console.log(response.text)
    console.log(response.error)

    const productosAMostrar = responseJSON.slice(inicio, fin);

    //Itera cada dato de este para imprimirlo en la tabla del HTML
    await productosAMostrar.forEach(pro => {
        contenedorProductos.append(`
        <li class="item-producto" data-idpro=${pro.ID}>                        
            <a class="producto" href="producto.php">
                <div class="imagen-producto" style="background-image: url('data:image/png;base64,${pro.Imagen1}')"></div>
                <h4 class="categoria-producto text-secondary">${pro.Categoria}</h4>
                <h2 class="nombre-producto">${pro.Nombre}</h2>
                <h4 class="precio-producto">$${pro.Precio}</h4>
            </a>
        </li>`);  
    });
}    