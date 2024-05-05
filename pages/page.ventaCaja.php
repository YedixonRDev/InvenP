<!--Conexion a la base de datos-->
<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "invenpro";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
?>


<div class="ventaCaja container">
	<div class="row">
		<div class="col-md-8">
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
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="BoxComponent">
				<form id="frmInsertVentas" action="#" name="invenpro" method="post">
					<div class="Btns ">
						<button type="button" class="btn btnActions  btn-default btn-lg btnLimpiar">
							<i class="fa-solid fa-trash"></i>
							<div>Limpiar</div>
						</button>
						<button type="button" class="btn btnActions btn-default btn-lg" onClick="myModal()" data-toggle="modal" data-target="#myModal">
							<div>Agregar</div>
							<i class="fa-solid fa-plus"></i>
						</button>
					</div>
					<div id="totalVentaContainer">
						<input type="text" name="venta" id="total_venta" placeholder="Cuenta Total" readonly>
					</div>
					<div class="SelectPay">
						<div class="form-group">
							<label>Elija Medio de Pago</label>
							<select type="text" name="pago" placeholder="Método de Pago">
								<option value=""></option>
								<option value="Efectivo">Efectivo</option>
								<option value="Transferencia">Transferencia</option>
							</select>
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-dollar"></i>
						</span>
						<input id="montoRecibido" type="text" class="form-control input-lg" placeholder="Ingresa el importe pagado">
					</div>
					<div id="cuentaTotal" class="hidden">0</div>
					<button onclick="calcularVuelto()" type="button" class="btn btn-lg btn-primary btn-flat btn-block">
						Calcular Cambio
					</button>
					<div id="vueltoSpan"></div>
					<input type="submit" name="registro">
				</form>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<?php require 'components/box/BoxPayModal.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
	if (isset($_POST['venta']) && isset($_POST['pago'])) {
		$penta = $_POST['venta'];
		$pago = $_POST['pago'];

		// Insertar datos en la tabla 'total_ventas'
		$insertarDatos = "INSERT INTO ventas (venta, pago) VALUES ('$venta', '$pago')";
		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

		if ($ejecutarInsertar) {
			echo "Los datos se han insertado correctamente.";
		} else {
			echo "Error al insertar los datos: " . mysqli_error($enlace);
		}
	} else {
		echo "Por favor, complete todos los campos del formulario.";
	}
}
?>