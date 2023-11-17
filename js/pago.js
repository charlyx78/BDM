$(document).ready(() => {

    $('#formPagarCarrito').submit((e) => {//Hay que hacer el Forms
        e.preventDefault();
        let TotalPagar = $('#totalCarrito').val();//El Precio Total
        
        var formData = {//Datos a Pasar
            TotalPagar: TotalPagar
        };

        fetch('../controllers/addVenta.php', {//No Creado
            method: 'POST',
            body: JSON.stringify(formData) ,
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

})
