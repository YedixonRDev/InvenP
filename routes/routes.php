<?php  
    $listRoutes = array(
        'index',
        'ventaCaja',
        'cierreCaja',
        'nuevoGastos',
        'reporteGastos',
        'productos'
  
    );
    foreach($listRoutes as $route) {
        require 'route.'.$route.'.php';
    }
?>