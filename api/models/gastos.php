<?php

require "../db/conection.php";

class Gastos {

    function insert(){
        $conection   = new conn;
        $nombre      = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $monto       = $_POST['monto'];
        $fecha       = $_POST['fecha'];
        $sql         = "INSERT INTO `gastos` (`id`, `nombre`, `descripcion`, `monto`, `fecha`) VALUES (NULL, '$nombre', '$descripcion', '$monto', '$fecha')";
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