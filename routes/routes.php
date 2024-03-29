<?php  
    $listRoutes = array(
        'index',
        'ventaCaja',
        'cierreCaja',
        'gastos',
        'reporteGastos',
        'productos'
  
    );
    foreach($listRoutes as $route) {
        require 'route.'.$route.'.php';
    }
?>