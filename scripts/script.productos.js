$( document ).ready(function() {
    onSubmitFrmInsertProducts();
});

const onSubmitFrmInsertProducts = () => { //obtiene los datos del formulario y los envia a la funcion sendDataInsertProduct
    $('#frmInsertProduct').submit(function(e) {
        e.preventDefault();
        let name  = $('#frmInsertProductName').val();
        let category = $('#frmInsertProductCategory').val();
        let price = $('#frmInsertProductPrice').val();
        let data = {
            "nombre": name, 
            "categoria": category,
            "precio":price
        }
        sendDataInsertProduct(data);
    })
}

const sendDataInsertProduct = (sendData) =>{ //recibe lo datos del formulario y los envia a la api
    $.ajax({
        type: 'POST',
        url: 'api/data/products.php', 
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
    frmInsertProductsClean()
    //actualizar la tabla
}

const frmInsertProductsClean = () =>{
    $('#frmInsertProduct')[0].reset();
}