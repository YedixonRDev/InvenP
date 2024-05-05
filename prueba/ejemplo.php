<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "invenpro";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
?>

<form action="#" name="invenpro" method="post">

   <input type="text" name="total_venta" placeholder="Total Venta">
   <select type="text" name="metodo_pago" placeholder="Método de Pago">
      <option value="">Elija Medio de Pago</option>
      <option value="Efectivo">Efectivo</option>
      <option value="Transferencia">Transferencia</option>
   </select>

   <input type="submit" name="registro">
   <input type="reset">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
   if (isset($_POST['total_venta']) && isset($_POST['metodo_pago'])) {
      $totalVenta = $_POST['total_venta'];
      $metodoPago = $_POST['metodo_pago'];

      // Insertar datos en la tabla 'total_ventas'
      $insertarDatos = "INSERT INTO total_ventas (total_venta, metodo_pago) VALUES ('$totalVenta', '$metodoPago')";
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