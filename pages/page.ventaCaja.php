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
					<div class="counter">
						<div class="inner" style="text-align: center;">
							<h3 style="font-weight: bold;">Cuenta Total:</sup></h3>
							<div id="total_venta" style="font-size: 28px; font-weight: bold;" class="bg-dark p-3 rounded text-center"> </div>
						</div>
					</div>
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
					<div class="SelectPay">
						<div class="form-group" style="font-size: 18px;">
							<label>Medio de Pago</label>
							<select type=" text" name="metodo_pago" placeholder="Método de Pago">
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
						<input id="calcularMonto" type="text" class="form-control input-lg" placeholder="Ingresa el importe pagado">
					</div>
					<button onclick="calcularDevuelta()" type="button" class="btn btn-lg btn-primary btn-flat btn-block">
						Calcular Cambio
					</button>
					<div id="devolver"></div>
					<div style="text-align: center;">
						<button type="submit" name="registro" class="btn btn-lg btn-primary btn-flat btn-block" style="margin-top: 10px; padding: 18px;">
							Enviar
						</button>
					</div>
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
		$venta = $_POST['venta'];
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

<script>
	function calcularDevuelta() {
		// Obtener el monto pagado y el total de la venta
		var montoPagado = parseFloat(document.getElementById('calcularMonto').value);
		var totalVenta = parseFloat(document.getElementById('total_venta').innerText);

		// Calcular la devolución
		var devuelta = montoPagado - totalVenta;

		// Mostrar la devolución en el área correspondiente
		var devolverDiv = document.getElementById('devolver');
		devolverDiv.innerText = "Devolver: $ " + devuelta.toFixed(2);
		devolverDiv.style.backgroundColor = '#dff0d8'; // Color de fondo verde claro
		devolverDiv.style.color = '#3c763d'; // Color del texto verde oscuro
		devolverDiv.style.padding = '10px'; // Espaciado interno
		devolverDiv.style.marginTop = '20px'; // Espaciado superior
		devolverDiv.style.borderRadius = '5px'; // Bordes redondeados
		devolverDiv.style.textAlign = 'center'; // Alineación del texto
	}
</script>