<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "invenpro";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

// Verificar conexión
if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para obtener todos los registros de gastos
$sql = "SELECT monto FROM gastos";
$result = mysqli_query($enlace, $sql);

$total = 0;

if (mysqli_num_rows($result) > 0) {
    // Sumar los montos de todos los registros
    while ($row = mysqli_fetch_assoc($result)) {
        $total += $row["monto"];
    }
}

// Cerrar conexión
$enlace->close();
?>

<div class="gastos">
    <div class="tableNewGastos">
        <div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Movimientos Actuales</h3>
                </div>
                <div class="box-body">
                    <table id="tblGastos" class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se cargarán los datos de los gastos -->
                        </tbody>
                    </table>
                </div>
                <div id="totalGastos" class="alert  text-center bg-custom">
                    <h2 class="font-weight-bold">Total de Gastos: $<?php echo number_format($total, 2); ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="formNewGastos">
        <div>
            <form id="frmInsertGastos" class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Registrar Movimientos</h3>
                </div>
                <div class="box-body">
                    <label for="text">Tipo de movimiento</label>
                    <select id="frmInsertGastosName" class="form-control input-md" type="text" placeholder="Tipo de Movimiento">
                        <option value="">Selecciona el movimiento</option>
                        <option value="Gastos">Gastos</option>
                        <option value="Prestamos">Prestamos</option>
                    </select>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea id="frmInsertGastosDescription" class="form-control" rows="3" placeholder="Describe el movimiento"></textarea>
                    </div>
                    <label for="text">Monto</label>
                    <input id="frmInsertGastosMonto" class="form-control input-md" type="text" placeholder="$">

                    <label for="date">Fecha</label>
                    <input id="frmInsertGastosFecha" class="form-control input-md" type="date">

                    <div class="row">
                        <div class="col-md-6">
                            <button id="btnRegistrarMovimiento" class="btnRegister btn-block btn-success">Registrar Movimiento</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btnCancel btn-block btn-danger">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>