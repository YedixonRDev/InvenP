<?php
session_start();

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Incluir el archivo de conexión a la base de datos
   require "../db/conexion.php";

   // Recuperar los datos del formulario
   $correo = $_POST["email"];
   $contraseña = $_POST["password"];

   // Consulta SQL para verificar las credenciales del usuario
   $consulta = "SELECT * FROM usuarios WHERE correo = '$correo'";
   echo "Consulta SQL: $consulta"; // Imprimir consulta SQL para depuración
   $resultado = $conexion->query($consulta);

   if ($resultado->num_rows == 1) {
      // Usuario encontrado, verificar la contraseña
      $usuario = $resultado->fetch_assoc();
      echo "Contraseña ingresada: $contraseña<br>"; // Imprimir contraseña ingresada para depuración

      if (password_verify($contraseña, $usuario["contraseña"])) {
         // Contraseña válida, iniciar sesión y redireccionar al usuario
         $_SESSION["usuario_id"] = $usuario["id"];
         echo json_encode(["success" => true, "redirect_url" => "../../../RESTAURANTE/index.php"]);
         exit();
      } else {
         // Contraseña incorrecta
         echo "La contraseña ingresada no coincide con la registrada. Por favor, inténtalo de nuevo.";
      }
   } else {
      // Usuario no encontrado
      echo "El correo electrónico ingresado no está registrado.";
   }

   // Cerrar la conexión a la base de datos
   $conexion->close();
}
