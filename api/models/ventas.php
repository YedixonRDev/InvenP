<?php

require "../db/conection.php";

class Ventas {

    function insert(){
        $conection  = new conn;
        $id_venta   = $_POST['id_venta'];
        $total      = $_POST['total']; 
        $fecha      = $_POST['fecha']; 
        $sql        = "INSERT INTO `ventas` (`id`, `id_venta`, `total`, `fecha`) VALUES (NULL, `id_venta`, '$total', '$fecha')";
        $conection->query($sql);
    }

    function select_all(){
        echo 'seleccionando todo';
    }

    function select_id($id){
        echo 'seleccionando por id';
    }

    function update($data){
        echo 'actualizando';
    }

    function delete($id){
        echo 'eliminando';
    }
}
?>