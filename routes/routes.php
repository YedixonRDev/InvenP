<?php
$listRoutes = array(
    'index',
    'ventaCaja',
    'cierreCaja',
    'gastos',
    'productos'

);
foreach ($listRoutes as $route) {
    require 'route.' . $route . '.php';
}
