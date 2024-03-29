$(document).ready(function() {
    loadTableGastos();
    onSubmitFrmInsertGastos();
});

const onSubmitFrmInsertGastos = () => {
    $('#frmInsertGastos').submit(function(e) {
        e.preventDefault();
        let name = $('#frmInsertGastosName').val();
        let description = $('#frmInsertGastosDescription').val();
        let monto = $('#frmInsertGastosMonto').val();
        let fecha = $('#frmInsertGastosFecha').val();
        let data = {
            "nombre": name, 
            "descripcion": description,
            "monto": monto,
            "fecha": fecha    
        };
        sendDataInsertGastos(data);
    });
};

const sendDataInsertGastos = (sendData) => {
    $.ajax({
        type: 'POST',
        url: 'api/data/gastos.php', 
        data: JSON.stringify(sendData),
        contentType: 'application/json',
        dataType: 'json'
    })
    .done(function(data) {
        if (data.status) {
            insetDataGastosSuccess();
            loadTableGastos();
        }
    })
    .fail(function(data) {
        console.log(data);
    });
};

const insetDataGastosSuccess = () => {
    frmInsertGastosClean();
};

const frmInsertGastosClean = () => {
    $('#frmInsertGastos')[0].reset();
};

const loadTableGastos = () => {
    $('#tblGastos').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [ 'excelHtml5'],
        "ajax":{
            url: 'api/data/gastos.php',
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
            { data: 'descripcion' },
            { data: 'monto' },
            { data: 'fecha' }
        ]
    }).DataTable();
};
