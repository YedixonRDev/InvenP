$( document ).ready(function() {
    loadTable();
    onSubmitFrmInsertProducts();
});

const onSubmitFrmInsertProducts = () => { 
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

const sendDataInsertProduct = (sendData) =>{ 
    $.ajax({
        type: 'POST',
        url: 'api/data/products.php', 
        data: JSON.stringify(sendData), 
        contentType: 'application/json', 
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