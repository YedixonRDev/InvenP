<?php

require "../db/conection.php";
class Products {

    function insert(){
        $conection = new conn;
        $nombre     = $_POST['nombre'];
        $categoria  = $_POST['categoria'];
        $precio     = $_POST['precio'];
        $sql = "INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`) VALUES (NULL, '$nombre', '$categoria', '$precio')";
        $conection->query($sql);

        echo 'insertando '.$nombre;
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
