<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Crear Cuenta</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <style>
      .content-wrapper-register {
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
      }

      .register-form-box {
         width: 90%;
         max-width: 400px;
         padding: 20px;
         border: 1px solid #ced4da;
         border-radius: 10px;
      }
   </style>
</head>

<body>
   <div class="content-wrapper-register">
      <div class="register-form-box">
         <section class="content-header">
            <h1 class="text-center">Crear Cuenta</h1>
         </section>
         <form method="post">
            <div class="form-group">
               <label for="user">Nombre de usuario</label>
               <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" required>
            </div>
            <div class="form-group">
               <label for="email">Correo Electrónico</label>
               <input type="email" name="email" id="email" class="form-control" placeholder="Correo" required>
            </div>
            <div class="form-group">
               <label for="password">Contraseña</label>
               <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Crear Cuenta</button>
            <button type="submit" class="btn btn-secondary btn-block">Ya tengo cuenta</button>
         </form>
      </div>
   </div>
</body>

</html>