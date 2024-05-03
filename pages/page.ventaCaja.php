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
				<div class="Counter">
					<div>
						<div id="totalVentaContainer">
							<span id="totalVenta"></span>
						</div>
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
					<div class="form-group">
						<label>Elija Medio de Pago</label>
						<select class="form-control input-lg">
							<option></option>
							<option>Efectivo</option>
							<option>Transferencia</option>
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
				<button type="button" class="btn btn-lg btn-primary btn-flat btn-block">
					Completar Venta
				</button>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<?php require 'components/box/BoxPayModal.php'; ?>