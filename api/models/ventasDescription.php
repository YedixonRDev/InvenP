<?php

require "../db/conection.php";
require "../headers/header.php"; 

class VentasDescription {

    function insert(){

        $response['process'] ='Insert VentasDescription';

        try{ 

            $conection  = new conn;
            $id_venta        = $_POST['id_venta'];
            $id_producto     = $_POST['id_producto']; 
            $nombre_producto = $_POST['nombre_producto']; 
            $unidades        = $_POST['unidades'];
            $precio          = $_POST['precio'];
            $precio_total    = $_POST['precio_total'];
            $sql             = "INSERT INTO `ventas_descripcion` (`id`, `id_venta`, `id_producto`, `nombre_producto`, `unidades`, `precio`, `precio_total`) VALUES (NULL, '$id_venta', '$id_producto', '$nombre_producto', '$unidades', '$precio', '$precio_total')";
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
        $response['process'] ='select all VentasDescription';
        try {
            $conection = new conn;
            $sql = "SELECT * FROM `ventas_descripcion` ";
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
        $response['process'] ='select all Products';
        try {
            $conection = new conn;
            $sql = "SELECT * FROM `ventas_descripcion` WHERE `id` = '$id'";
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

    function update($data){
        echo 'actualizando';
    }

    function delete($id){
        echo 'eliminando';
    }
}
?>
