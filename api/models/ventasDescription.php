<?php

require "../db/conection.php";

class VentasDescription {

    function insert(){
        $conection  = new conn;
        $id_venta        = $_POST['id_venta'];
        $id_producto     = $_POST['id_producto']; 
        $nombre_producto = $_POST['nombre_producto']; 
        $unidades        = $_POST['unidades'];
        $precio          = $_POST['precio'];
        $precio_total    = $_POST['precio_total'];
        $sql             = "INSERT INTO `ventas_descripcion` (`id`, `id_venta`, `id_producto`, `nombre_producto`, `unidades`, `precio`, `precio_total`) VALUES (NULL, '$id_venta', '$id_producto', '$nombre_producto', '$unidades', '$precio', '$precio_total')";
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
