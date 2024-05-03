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
						<th>Nombre</th>
						<th>Categoría</th>
						<th>Precio</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!-- Aquí se agregarán las filas de la tabla de ventas -->
				</tbody>
			</table>
		</div>
		<!-- mostrar el total de la venta -->
		<div id="totalVentaContainer">
			Total de la venta: <span id="totalVenta"></span>

		</div>

		<button type="button" class="btn btn-danger" onclick="pagar()">
			Pagar
		</button>

	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</script>