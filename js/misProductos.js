// const formAddProducto = document.getElementById("formAddProducto");
// formAddProducto.addEventListener("submit", e=> {
//     e.preventDefault();

//     const nombreProducto = document.getElementById("nombreProducto");
//     const categoriaProducto = document.getElementById("categoriaProducto").value;
//     const tipoVentaProducto = document.getElementById("tipoVentaProducto").value;
//     const precioProducto = document.getElementById("precioProducto");
//     const stockProducto = document.getElementById("stockProducto");
//     const stockUnidadMedida = document.getElementById("stockUnidadMedida").value;
//     const descripcionProducto = document.getElementById("descripcionProducto");

//     if(nombreProducto.value.length <= 0){
//         alert("Nombre de Producto vacio");
//     }
//     else if(categoriaProducto == ""){
//         alert("Categoria de Producto vacia");
//     }
//     else if(tipoVentaProducto == ""){
//         alert("Tipo de Venta de Producto vacio");
//     }
//     else if(precioProducto.value.length <= 0){
//         alert("Precio de Producto vacio");
//     }
//     else if(stockProducto.value.length <= 0){
//         alert("Cantidad de Stock de Producto vacio");
//     }
//     else if(stockUnidadMedida == ""){
//         alert("Unidad de Stock de Producto vacio");
//     }
//     else if(descripcionProducto.value.length <= 0){
//         alert("Descripcion de Producto vacio");
//     }
//     else {
//         alert("Producto Agregado");
//     }
// })
getCategorias();
previewInputs();

async function getCategorias() {
    //Se limpia la tabla
    $('#categoriaProducto').html('');
    $('#categoriaProducto').append(`
    <option value="">--Selecciona una categoria</option>`);  
    //Se guarda en una variable la respuesta del controlador readCategorias
    let response = await fetch('../controllers/readCategoria.php');
    //Espera a obtener la respuesta y la convierte la respuesta en un JSON
    let responseJSON = await response.json();
    //Itera cada dato de este para imprimirlo en la tabla del HTML
    await responseJSON.forEach(cat => {
        $('#categoriaProducto').append(`
        <option value="${cat.PK_IdCategoria}">${cat.CatNombre}</option>`);  
    });
}

function previewInputs() {
    const inputImagenProducto1 = document.getElementById('imagenProducto1');
    const previewImagen1 = document.getElementById('previewImagen1');
    const iconoPreviewImagen1 = document.getElementById('iconoPreviewImagen1');
    inputImagenProducto1.addEventListener('change', () => {
        const [file] = inputImagenProducto1.files
        if (file) {
            previewImagen1.style.backgroundImage = 'url(' + URL.createObjectURL(file) + ')';
            iconoPreviewImagen1.style.display = 'none';
        }
    }) 
    
    const inputImagenProducto2 = document.getElementById('imagenProducto2');
    const previewImagen2 = document.getElementById('previewImagen2');
    const iconoPreviewImagen2 = document.getElementById('iconoPreviewImagen2');
    inputImagenProducto2.addEventListener('change', () => {
        const [file] = inputImagenProducto2.files
        if (file) {
            previewImagen2.style.backgroundImage = 'url(' + URL.createObjectURL(file) + ')';
            iconoPreviewImagen2.style.display = 'none';
        }
    }) 
    
    const inputImagenProducto3 = document.getElementById('imagenProducto3');
    const previewImagen3 = document.getElementById('previewImagen3');
    const iconoPreviewImagen3 = document.getElementById('iconoPreviewImagen3');
    inputImagenProducto3.addEventListener('change', () => {
        const [file] = inputImagenProducto3.files
        if (file) {
            previewImagen3.style.backgroundImage = 'url(' + URL.createObjectURL(file) + ')';
            iconoPreviewImagen3.style.display = 'none';
        }
    }) 
    
    const inputVideoProducto = document.getElementById('videoProducto');
    const previewVideo = document.getElementById('previewVideo');
    const iconoPreviewVideo = document.getElementById('iconoPreviewVideo');
    inputVideoProducto.addEventListener('change', () => {
        const [file] = inputVideoProducto.files;
        if (file) {
            previewVideo.style.display = 'block';
            previewVideo.src = URL.createObjectURL(file);
            iconoPreviewVideo.style.display = 'none';
        }
    }) 
}

