$( document ).ready(function() {
    loadTable();
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
            loadTable();
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

const loadTable = () =>{
    $('#tblProducts').dataTable(
        {
          "aProcessing": true,
          "aServerSide": true,
          dom: 'Bfrtip',
          buttons: [ 'excelHtml5'],
          "ajax":{
            url: 'api/data/products.php',
            type : "get",
            dataType : "json",            
            error: function(e){
              console.log(e.responseText);  
            }
          },
          "bDestroy": true,
          "iDisplayLength": 7,
          "columns":[
            { data: 'nombre' },
            { data: 'categoria' },
            { data: 'precio' }
          ]
        }).DataTable();
}