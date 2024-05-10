//Funcion del modals para seleccionar productos
const showModalBox  = () => {
    $('#myModal').modal('show')
}

//Extraer datos de la tabla de productos
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
//Seleccionar prductos de la tabla de de productos del modals
function seleccionarProducto(nombre, categoria, precio) {
    // Construir la fila HTML con los datos del producto seleccionado
    let fila = '<tr>';
    fila += '<td>#</td>';
    fila += '<td>' + nombre + '</td>';
    fila += '<td>' + categoria + '</td>';
    fila += '<td>' + precio + '</td>';
    fila += '<td><button type="button" class="btn btn-danger btnEliminar">Eliminar</button></td>';
    fila += '</tr>';

    $('#tablaVentas tbody').append(fila);

    // Calcular el nuevo total de la venta
    calcularTotalVenta();
}

// Evento clic para limpiar la tabla y reiniciar la suma total
$('.btnLimpiar').on('click', function() {
    // Eliminar todas las filas de la tabla
    $('#tablaVentas tbody').empty();

    calcularTotalVenta();
    limpiarFormulario();
});

	// Función para calcular el total de la venta
	function calcularTotalVenta() {
		let total = 0;
		$('#tablaVentas tbody tr').each(function() {
			let precio = parseFloat($(this).find('td:eq(3)').text());
			total += precio;
		});

		// Actualizar el total de la venta en el input correspondiente
		var totalFormateado = total.toFixed(2); // Formatear el total a dos decimales
		$('#total_venta').val(totalFormateado); // Actualizar el total en el input
	}

function limpiarFormulario() {
    // Limpiar el select de método de pago
    $('.SelectPay select').val('');

    // Limpiar el input de ingresar monto
    $('#montoRecibido').val('');

    // Limpiar el mensaje provisional de cambio
    document.getElementById("vueltoSpan").textContent = "";
}

function calcularDevuelta() {
    // Obtener el monto pagado y el total de la venta
    var montoPagado = parseFloat($('#calcularMonto').val());
    var totalVenta = parseFloat($('#total_venta').text());

    // Calcular la devolución
    var devuelta = montoPagado - totalVenta;

    // Mostrar la devolución en la interfaz
    $('#vueltoSpan').text("Devuelta: $" + devuelta.toFixed(2));
}
// Asignar la función al evento click del botón para calcular la devolución
$('#calcularDevueltaBtn').on('click', function() {
    calcularDevuelta();
});
