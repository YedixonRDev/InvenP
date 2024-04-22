<div id="modalBox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="gridSystemModalLabel">Productos Disponibles</h4>
			</div>
			<div class="modal-body ">
				<div class="box">
					<div class="box-body ">
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
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="lineR">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary">Agregar Productos</button>
				</div>
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
				type: "get",
				dataType: "json",
				error: function(e) {
					console.log(e.responseText);
				}
			},
			"bDestroy": true,
			"iDisplayLength": 7,
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
		}).DataTable();
	}

	function seleccionarProducto(nombre, categoria, precio) {

		let fila = "<tr><td>#</td><td>" + nombre + "</td><td>Unidad</td><td>" + precio + "</td><td>Total</td><td></td></tr>";
		$('#tablaVentas tbody').append(fila);
	}
</script>