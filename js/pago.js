$(document).ready(() => {

    getTotalAPagar();
    let totalPagar = 0.00;

    $('#contenedor-metodos-pago').submit((e) => {//Hay que hacer el Forms
        e.preventDefault();

        let inputMetodoPago = $('#tarjetaPago').val();
        RealizarVenta();
    })

    async function getTotalAPagar() {
    
        //Se limpia la tabla
        $('#SubtotalAPagar').html('');
        $('#TotalaPagar').html('');
    
        try {
            let response = await fetch('../controllers/readProductoCarrito.php');
    
            //Espera a obtener la respuesta y la convierte la respuesta en un JSON
            let responseJSON = await response.json();

            await responseJSON.forEach(proCarr => {
                totalPagar = totalPagar + parseFloat(proCarr.Precio * proCarr.Cantidad);
            })

            $('#SubtotalAPagar').html('$ ' + totalPagar);
            $('#TotalaPagar').html('$ ' + totalPagar);
        }
        catch(exception){
            /*if(totalPagar == 0) {
                $('#btnProcederPago').addClass('disabled')
            }
            alert('El carrito esta vacio. Explora la tienda para agregar productos')
            $('#loader').hide();
            */
        }  
    
    }

    async function RealizarVenta() {
    
        try {
            let response = await fetch('../controllers/readProductoCarrito.php');
    
            //Espera a obtener la respuesta y la convierte la respuesta en un JSON
            let responseJSON = await response.json();

            await responseJSON.forEach(proCarr => {
                
                var formData = {//Datos a Pasar
                    idProductoVenta: proCarr.ID,
                    idProductoTipo: proCarr.IdTipoP,
                    idProductoNombre: proCarr.Nombre,
                    idProductoCategoria: proCarr.IdCategoriaP,
                    idProductoPrecio: parseFloat(proCarr.Precio),
                    idProductoCantidad: proCarr.Cantidad,
                    usuarioVendedor: proCarr.IdVendedorP,
                    idMetodoPago: 1
                };
        
                console.log(JSON.stringify(formData));
                fetch('../controllers/addVenta.php', {//No Creado
                    method: 'POST',
                    body: JSON.stringify(formData),
                    headers: {
                         'Content-Type': 'application/json'
                    }
                })   
                .then(()=> {
                    Swal.fire(
                        'Exito!',
                        'Productos Comprados!',
                        'success'
                        )
                        .then(() => {
                            //
                        })
                    }) 

            })
        }
        catch(exception){
            
        }  
    
    }

})
