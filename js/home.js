var btnScrollComprar = document.getElementById('btnComprarHome');
var contenedorProductosParaTi = document.getElementById('contenedorProductosParaTi');
var contenedorProductosParaTiTopPos = contenedorProductosParaTi.offsetTop/1.05;

btnScrollComprar.addEventListener("click", ()=> {
    window.scrollTo(0,contenedorProductosParaTiTopPos);
})