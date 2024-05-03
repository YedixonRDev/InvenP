<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Productos Disponibles</h4>
			</div>
			<div class="modal-body">
				<div class="box">
					<div class="box-body">
						<div class="table-responsive">
							<table id="modalTblProducts" class="table">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Categoría</th>
										<th>Precio</th>
										<th>Seleccionar</th>
									</tr>
								</thead>
								<tbody>
									<!-- Aquí se cargarán las filas de la tabla mediante JavaScript -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary">Agregar Productos</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		loadModalTable();
	});

	const loadModalTable = () => {
		$('#modalTblProducts').dataTable({
			"aProcessing": true,
			"aServerSide": true,
			dom: 'Bfrtip',
			buttons: ['excelHtml5'],
			"ajax": {
				url: 'api/data/products.php',
				type: "GET",
				dataType: "json",
				error: function(e) {
					console.log(e.responseText);
				}
			},
			"destroy": true,
			"pageLength": 7,
			"columns": [{
					data: 'nombre'
				},
				{
					data: 'categoria'
				},
				{
					data: 'precio'
				},
				{
					data: null,
					render: function(data, type, row) {
						return '<button type="button" class="btn btn-primary" onclick="seleccionarProducto(\'' + row.nombre + '\', \'' + row.categoria + '\', \'' + row.precio + '\')">Seleccionar</button>';
					}
				}
			]
		});
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
</script>