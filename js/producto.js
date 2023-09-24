const formAddProductoACarrito = document.getElementById("formAddProductoACarrito");
formAddProductoACarrito.addEventListener("submit", e=> {
    e.preventDefault();

    const CantidadAgregar = document.getElementById("CantidadAgregar");

    if(CantidadAgregar.value.length <= 0){
        alert("Cantidad a Agregar Vacia");
    }
    else {
        alert("Agreagdo al Carrito")
    }
})

const btnHeaderComentarios = document.getElementById('headerComentarios');
let rotado = false;
btnHeaderComentarios.addEventListener('click', () => {
    const iconoChevron = document.getElementById('iconoChevron');
    if(!rotado){
        iconoChevron.style.transform = 'rotate(180deg)';
        iconoChevron.style.transition = 'ease 0.2s';
        rotado = true;
    }
    else {
        iconoChevron.style.transform = 'rotate(0deg)';
        iconoChevron.style.transition = 'ease 0.2s';
        rotado = false;
    }

})