<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "invenpro";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
?>

<form id="frmInsertCierreCaja" role="form" action="#" method="post">
   <div class="form-group">
      <label for="date">Fecha</label>
      <input id="frmInsertCierreCajaFecha" name="fecha" class="form-control input-md" type="date">
   </div>
   <div class="form-group">
      <label>Gastos Totales</label>
      <input id="frmInsertCierreCajaGastos" name="gastos" type="number" class="form-control" placeholder="Ingresa los gastos totales">
   </div>
   <div class="form-group">
      <label>Efectivo Total</label>
      <input id="frmInsertCierreCajaEfectivo" name="efectivo" type="number" class="form-control" placeholder="Ingresa Efectivo total">
   </div>
   <div class="form-group">
      <label>Venta Total</label>
      <input id="frmInsertCierreCajaVenta" name="venta" type="number" class="form-control" placeholder="Ingresa la venta total">
   </div>
   <div class="box-footer">
      <div id="mensaje"><?php if (isset($mensaje)) echo $mensaje; ?></div>
      <button type="submit" class="btnCerrarCaja btn btn-primary" name="registro">Cerrar Caja</button>
   </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
   $fecha = $_POST['fecha'];
   $gastos = $_POST['gastos'];
   $efectivo = $_POST['efectivo'];
   $venta = $_POST['venta'];

   // Insertar datos en la tabla 'cierre_caja'
   $insertarDatos = "INSERT INTO cierre_caja (fecha, gastos, efectivo, venta) VALUES ('$fecha', '$gastos', '$efectivo', '$venta')";
   $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

   if ($ejecutarInsertar) {
      echo "Los datos se han insertado correctamente.";
   } else {
      echo "Error al insertar los datos: " . mysqli_error($enlace);
   }

   // Cerrar la conexión
   mysqli_close($enlace);
}
?>