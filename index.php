<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
   <title>InvenPRO</title>
</head>

<body class="hold-transition skin-black sidebar-mini">
   
    <div class="wrapper">
        <?php
            require 'layout/Header.php';
            require 'layout/Aside.php';
        ?>
            <div class="content-wrapper">
                <?php 
                    require 'core/app.php';
                    $AppRoutes = new AppRoutes;
                    require 'routes/routes.php';
                    $listRoutes=$AppRoutes->getRoutes();
                    $AppViews = new AppViews($listRoutes);
                    $AppViews->loadViews();
                ?>
            </div>
        <?php
            require 'layout/Footer.php';
        ?>
    </div>

   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/dataTables.min.js"></script>
   <script src="assets/js/dataTables.bootstrap.min.js"></script>
   <script src="assets/js/adminlte.min.js"></script>
   <script src="assets/js/demo.js"></script>
   <script src="assets/js/apiManager.js"></script>
   <script src="assets/js/app.js"></script>
   <?php 
        $AppScript = new AppScript($listRoutes);
        $AppScript->loadScript();
    ?>
</body>

</html>
