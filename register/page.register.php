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
            <h1 class="text-center"> Bienvenido a InvenPRO</h1>
            <h5 class="text-center">Crear nuevo usuario</h5>
         </section>
         <form id="frmInsertNewUser" action="./register.php" method="post">
            <div class="form-group">
               <label for="frmInsertNewUserName">Nombre</label>
               <input type="text" name="nombre" id="frmInsertNewUserName" class="form-control" placeholder="Nombre" required autocomplete="name">
            </div>
            <div class="form-group">
               <label for="frmInsertNewUserEmail">Correo Electrónico</label>
               <input type="email" name="correo" id="frmInsertNewUserEmail" class="form-control" placeholder="Correo" required autocomplete="email">
            </div>
            <div class="form-group">
               <label for="frmInsertNewUserPassword">Contraseña</label>
               <input type="password" name="contraseña" id="frmInsertNewUserPassword" class="form-control" placeholder="Contraseña" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Crear Cuenta</button>

            <button type="button" class="btn btn-secondary btn-block" onclick="window.location.href = 'page.login.php'">Ya tengo cuenta</button>
         </form>
         <?php
         include("register.php");
         ?>

      </div>
   </div>
</body>

</html>