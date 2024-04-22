<div class="box">
	<div class="box-header with-border">
		<h3 id="tableTitle" class="box-title">Mesa 1</h3>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table id="tablaVentas" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th style="width: 10px">#</th>
						<th>Producto</th>
						<th>Unidad</th>
						<th>Precio</th>
						<th>Total</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<!-- Aquí se agregarán las filas de la tabla de ventas -->
				</tbody>
			</table>
		</div>
		<!-- Nuevo elemento para mostrar el total de la venta -->
		<div id="totalVentaContainer">
			Total de la venta: <span id="totalVenta"></span>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
	function calcularTotalVenta() {
		let total = 0; // Inicializa la variable total en 0 para almacenar la suma de los precios
		$('#tablaVentas tbody tr').each(function() { // Itera sobre cada fila de la tabla de ventas
			let precio = parseFloat($(this).find('td:eq(3)').text()); // Obtiene el precio de cada fila
			total += precio; // Suma el precio al total
		});
		$('#totalVenta').text(total.toFixed(2)); // Muestra el total en algún lugar de la interfaz de usuario
	}
	$(document).ready(function() {
		calcularTotalVenta();
	});
</script>