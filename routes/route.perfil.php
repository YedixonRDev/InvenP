<?php
    $AppRoutes->AddRoutes('GET', 'perfil', function() {
        if(isset($_SESSION['session_estatus']) && $_SESSION['session_estatus'] === 'activo') {
            require 'pages/page.perfil.php';
        } else {
            header("Location: login");
        }
    });
?>