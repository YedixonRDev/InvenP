<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Iniciar sesión</title>
   <!-- Enlace al archivo CSS de Bootstrap -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
   <div class="content-wrapper">


      <section class="content">
         <div class="container">
            <div class="row justify-content-center">

               <div class="col-md-6">
                  <div class="card">
                     <div class="card-body">
                        <section class="content-header">
                           <h1>Registro de Usuario</h1>
                        </section>
                        <form action="register_process.php" method="post">
                           <div class="form-group">
                              <label for="username">Nombre de Usuario:</label>
                              <input type="text" class="form-control" id="username" name="username" required>
                           </div>
                           <div class="form-group">
                              <label for="email">Correo Electrónico:</label>
                              <input type="email" class="form-control" id="email" name="email" required>
                           </div>
                           <div class="form-group">
                              <label for="password">Contraseña:</label>
                              <input type="password" class="form-control" id="password" name="password" required>
                           </div>
                           <button type="submit" class="btn btn-primary">Registrarse</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>

   <!-- Enlace al archivo JavaScript de Bootstrap (opcional, si lo necesitas) -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>