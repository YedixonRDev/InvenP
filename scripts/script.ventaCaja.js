// $(document).ready(function() {
//     onSubmitFrmInsertVentas();
// });

// const onSubmitFrmInsertVentas = () => {
//     $('#frmInsertVentas').submit(function(e) {
//         e.preventDefault();
//         let venta = parseFloat($('#frmInsertTotalVenta').text());
//         let pago = $('#frmInsertMetodoPago option:selected').text();
//         let data = {
//             "venta": venta,
//             "pago": pago
//         };
//         sendDataInsertVentas(data);
//     });
// };

// const sendDataInsertVentas = (sendData) => {
//     $.ajax({
//         type: 'POST',
//         url: 'api/data/ventas.php',
//         data: JSON.stringify(sendData),
//         contentType: 'application/json',
//         dataType: 'json'
//     })
//     .done(function(data) {
//         if (data.status) {
//             insetDataVentasSuccess();
//         }
//     })
//     .fail(function(data) {
//         console.log(data);
//     });
// };

// const insetDataVentasSuccess = () => {
//     frmInsertVentasClean();
// };

// const frmInsertVentasClean = () => {
//     $('#frmInsertVentas')[0].reset();
// };


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

//Calcular el precio total de la tabla
function calcularTotalVenta() {
    let total = 0;
    $('#tablaVentas tbody tr').each(function() {
        let precio = parseFloat($(this).find('td:eq(3)').text());
        total += precio;
    });

    $('#total_venta').text(total.toFixed(2));
}

$('#tablaVentas').on('click', '.btnEliminar', function() {
    $(this).closest('tr').remove();

    calcularTotalVenta();
});

//Funcion para calcular el vuelto
function calcularVuelto() {

    calcularTotalVenta();
    const cuentaTotal = parseFloat($('#totalVentaContainer').text());
    const montoRecibido = parseFloat(document.getElementById("montoRecibido").value);

    if (!isNaN(montoRecibido)) {
        if (montoRecibido >= cuentaTotal) {
            const vuelto = montoRecibido - cuentaTotal;
            document.getElementById("vueltoSpan").textContent = "El cambio es: " + vuelto.toFixed(2);
            vueltoSpan.textContent = "El cambio es: " + vuelto.toFixed(2);
            //Estilos CSS para el mensaje del cambio.
            vueltoSpan.style.color = "white";
            vueltoSpan.style.backgroundColor = " #27AE60 ";
            vueltoSpan.style.border = "1px solid darkgreen";
            vueltoSpan.style.padding = "8px 16px";
            vueltoSpan.style.marginTop = "16px";
        } else {
            alert("El monto recibido debe ser igual o mayor que la cuenta total.");
        }
    } else {
        alert("Por favor, ingrese un monto recibido válido.");
    }
}

// Evento clic para limpiar la tabla y reiniciar la suma total
$('.btnLimpiar').on('click', function() {
    // Eliminar todas las filas de la tabla
    $('#tablaVentas tbody').empty();

    calcularTotalVenta();
    limpiarFormulario();
});

function limpiarFormulario() {
    // Limpiar el select de método de pago
    $('.SelectPay select').val('');

    // Limpiar el input de ingresar monto
    $('#montoRecibido').val('');

    // Limpiar el mensaje provisional de cambio
    document.getElementById("vueltoSpan").textContent = "";
}