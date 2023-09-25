let menos = document.getElementById('btnMenosCantidad');
let mas = document.getElementById('btnMasCantidad');
let precioProductoElement = document.getElementById('precioProducto1');
let totalCarritoElement = document.getElementById('totalCarrito');
let totalCarrito = parseFloat(document.getElementById('totalCarrito').innerHTML);

menos.addEventListener('click', ()=> {
    let fieldName = menos.dataset.field;
    let input = document.getElementsByName(fieldName)[0];
    let currentVal = parseFloat(document.getElementsByName(fieldName)[0].value);
    if(!isNaN(currentVal)) {
        if(currentVal!=0) {
            input.value = currentVal - 1;
            let precioProducto = parseFloat(precioProductoElement.innerHTML);
            totalCarritoElement.innerHTML="";
            totalCarrito -= precioProducto;
            totalCarritoElement.innerHTML = totalCarrito.toFixed(2);
        }
    }
    else {
        input.value = 0;
    }
})
mas.addEventListener('click', ()=> {
    let fieldName = mas.dataset.field;
    let input = document.getElementsByName(fieldName)[0];
    let currentVal = parseFloat(document.getElementsByName(fieldName)[0].value);
    if(!isNaN(currentVal)) {
        input.value = currentVal + 1;
        let precioProducto = parseFloat(precioProductoElement.innerHTML);
        totalCarritoElement.innerHTML="";
        totalCarrito += precioProducto;
        totalCarritoElement.innerHTML = totalCarrito.toFixed(2);
    }
    else {
        input.value = 0;
    }
})



