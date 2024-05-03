<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Incluir el archivo de conexión a la base de datos
   require "../db/conection.php";

   // Recuperar los datos del formulario
   $nombre = $_POST["nombre"];
   $correo = $_POST["correo"];
   $contraseña = $_POST["contraseña"];

   // Hash de la contraseña
   $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

   try {
      // Crear una instancia de la clase de conexión
      $conexion = new conn();

      // Preparar la consulta SQL para insertar el usuario
      $consulta = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$hashed_password')";

      // Ejecutar la consulta
      if ($conexion->query($consulta) === TRUE) {
         header("Location: page.login.php");
      } else {
         echo "Error al registrar el usuario: " . $conexion->error;
      }

      // Cerrar la conexión a la base de datos
      $conexion->close();
   } catch (Exception $e) {
      echo "Error al conectar a la base de datos: " . $e->getMessage();
   }
}
