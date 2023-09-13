const formAddProducto = document.getElementById("formAddProducto");
    formAddProducto.addEventListener("submit", e=> {
        e.preventDefault();

        const nombreProducto = document.getElementById("nombreProducto");
        const categoriaProducto = document.getElementById("categoriaProducto").value;
        const tipoVentaProducto = document.getElementById("tipoVentaProducto").value;
        const precioProducto = document.getElementById("precioProducto");
        const stockProducto = document.getElementById("stockProducto");
        const stockUnidadMedida = document.getElementById("stockUnidadMedida").value;
        const descripcionProducto = document.getElementById("descripcionProducto");

        if(nombreProducto.value.length <= 0){
            alert("Nombre de Producto vacio");
        }
        else if(categoriaProducto == ""){
            alert("Categoria de Producto vacia");
        }
        else if(tipoVentaProducto == ""){
            alert("Tipo de Venta de Producto vacio");
        }
        else if(precioProducto.value.length <= 0){
            alert("Precio de Producto vacio");
        }
        else if(stockProducto.value.length <= 0){
            alert("Cantidad de Stock de Producto vacio");
        }
        else if(stockUnidadMedida == ""){
            alert("Unidad de Stock de Producto vacio");
        }
        else if(descripcionProducto.value.length <= 0){
            alert("Descripcion de Producto vacio");
        }
        else {
            alert("Producto Agregado");
        }
    })