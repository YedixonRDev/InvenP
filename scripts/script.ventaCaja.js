const showModalBox  = () => {
    $('#myModal').modal('show')
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

function seleccionarProducto(nombre, categoria, precio) {
    // Construir la fila HTML con los datos del producto seleccionado
    let fila = '<tr>';
    fila += '<td>#</td>';
    fila += '<td>' + nombre + '</td>';
    fila += '<td>' + categoria + '</td>';
    fila += '<td>' + precio + '</td>';
    fila += '<td><button type="button" class="btn btn-danger btnEliminar">Eliminar</button></td>';
    fila += '</tr>';

    // Agregar la fila a la tabla de ventas
    $('#tablaVentas tbody').append(fila);

    // Calcular el nuevo total de la venta
    calcularTotalVenta();
}

// Función para calcular el total de la venta
function calcularTotalVenta() {
    let total = 0;
    $('#tablaVentas tbody tr').each(function() {
        let precio = parseFloat($(this).find('td:eq(3)').text());
        total += precio;
    });

    // Actualizar el total de la venta en la interfaz
    $('#totalVenta').text(total.toFixed(2));
}

// Evento delegado para eliminar productos
$('#tablaVentas').on('click', '.btnEliminar', function() {
    $(this).closest('tr').remove();
    // Recalcular el total de la venta después de eliminar un producto
    calcularTotalVenta();
});

function pagar() {
    // Supongamos que totalPagar es una variable que contiene el total a pagar
    const totalPagar = obtenerTotalPagar(); // Función para obtener el total a pagar

    // Actualizar el contenido del segundo div dentro del div Counter con el total a pagar
    document.getElementById("totalPagar").textContent = totalPagar.toFixed(2);
}
