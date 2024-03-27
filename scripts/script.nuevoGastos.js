$( document ).ready(function() {
    onSubmitFrmInsertGastos();
});

const onSubmitFrmInsertGastos = () => { //obtiene los datos del formulario y los envia a la funcion sendDataInsertProduct
    $('#frmInsertGastos').submit(function(e) {
        e.preventDefault();
        let name  = $('#frmInsertGastosName').val();
        let description = $('#frmInsertGastosDescription').val();
        let monto = $('#frmInsertGastosMonto').val();
        let fecha = $('#frmInsertGastosFecha').val();
        let data = {
            "nombre": name, 
            "descripcion": description,
            "monto": monto,
            "fecha": fecha    
        }
        sendDataInsertGastos(data);
    })
}

const sendDataInsertGastos = (sendData) =>{ //recibe lo datos del formulario y los envia a la api
    $.ajax({
        type: 'POST',
        url: 'api/data/gastos.php', 
        data: JSON.stringify(sendData), // Convertir el objeto JavaScript a JSON
        contentType: 'application/json', // Establecer el tipo de contenido como JSON
        dataType: 'json'
    })
    .done(function(data) {
        if (data.status) {
            insetDataSucces();
        }
    })
    .fail(function(data) {
        console.log(data);
    });
}

const insetDataSucces = () =>{
    frmInsertGastosClean()
    //actualizar la tabla
}

const frmInsertGastosClean = () =>{
    $('#frmInsertGastos')[0].reset();
}