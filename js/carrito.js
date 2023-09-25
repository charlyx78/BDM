let menos = document.querySelectorAll('.boton-menos-cantidad');
let mas = document.querySelectorAll('.boton-mas-cantidad');
let totalCarritoElement = document.getElementById('totalCarrito');

sumCarrito();

menos.forEach(botonMenos => {
    botonMenos.addEventListener('click', ()=> {
        let fieldName = botonMenos.dataset.idproducto;
        let input = document.getElementsByName(fieldName)[0];
        let currentVal = parseFloat(document.getElementsByName(fieldName)[0].value);
        if(!isNaN(currentVal)) {
            if(currentVal!=0) {
                input.value = currentVal - 1;
                sumCarrito();
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
            sumCarrito();
        }
        else {
            input.value = 0;
        }
    })
});



function sumCarrito() {
    let inputsCantidad = document.querySelector('.contenedor-productos-carrito').getElementsByTagName('input');
    let preciosProducto = document.querySelectorAll('.precio-producto');
    let totalCarrito = 0;
    for(let i = 0; i < inputsCantidad.length; i++) {
        let cantidad = inputsCantidad[i].value;
        let precio  = parseFloat(preciosProducto[i].innerHTML)
        totalCarrito += (cantidad * precio);
    }
    totalCarritoElement.innerHTML = '';
    totalCarritoElement.innerHTML = totalCarrito;
}



