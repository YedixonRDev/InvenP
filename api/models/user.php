<?php

require "../db/conection.php"; 

class User {

    function insert(){
        $conection  = new conn;
        $nombre     = $_POST['nombre'];
        $correo     = $_POST['correo']; 
        $contraseña = $_POST['contraseña']; 
        $sql        = "INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contraseña`) VALUES (NULL, '$nombre', '$correo', '$contraseña')";
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
