<?php

require "../db/conection.php";

class Table {

    function insert(){
        $conection = new conn;
        $nombre    = $_POST['nombre'];
        $estado    = $_POST['estado'];
        $sql       = "INSERT INTO `mesas` (`id`, `nombre`, `estado`) VALUES (NULL, '$nombre', '$estado')";
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