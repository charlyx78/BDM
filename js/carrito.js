let menos = document.querySelectorAll('.boton-menos-cantidad');
let mas = document.querySelectorAll('.boton-mas-cantidad');
let totalCarritoElement = document.getElementById('totalCarrito');

sumFila();

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



