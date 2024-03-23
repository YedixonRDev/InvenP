<?php

require "../db/conection.php";
require "../headers/header.php"; 

class Table {

    function insert(){

        $response['process'] = 'Insert Table';

        try {

            $conection = new conn;
            $nombre    = $_POST['nombre'];
            $estado    = $_POST['estado'];
            $sql       = "INSERT INTO `mesas` (`id`, `nombre`, `estado`) VALUES (NULL, '$nombre', '$estado')";
            $conection->query($sql);
            $response['status'] = true;

            http_response_code(200);

        } catch (Exception $err) {

            $response['status']= false;
            $response['sql'] =$sql;
            $response['error'] = $err->getMessage();

            http_response_code(401);

        }

        echo json_encode($response);

    }

    function select_all(){
        $response['process'] ='select all Products';
        try {
            $conection = new conn;
            $sql = "SELECT * FROM `mesas`";
            $con=$conection->query($sql);
            $num = mysqli_num_rows($con);
            $response['num_result'] = $num;
            if ($num >= 1) {
                while ($d = mysqli_fetch_assoc($con)) {
                $response['data'][] = $d;
                }
            } else {
                $response['data'] = FALSE;
            }
        } catch (Exception $err) {
            $response['status']= false;
            $response['sql'] =$sql;
            $response['error'] = $err->getMessage();
            http_response_code(401);
        }  
        echo json_encode($response);
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