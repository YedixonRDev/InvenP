const showModalBox  = () =>{
    $('#modalBox').modal('show')
}

const loadTable = () => {
    $('#modalTableContainer').html('<table id="modalTblProducts" class="table"></table>');

    $('#modalTblProducts').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: ['excelHtml5'],
        "ajax": {
            url: 'api/data/products.php',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 7,
        "columns": [
            { data: 'nombre' },
            { data: 'categoria' },
            { data: 'precio' }
        ]
    }).DataTable();
}

