data<?php

require "../db/conection.php";
require "../headers/header.php"; 

class VentasDescription {

    function insert(){

        $response['process'] ='Insert Ventas-Description';

        try{ 

            $conection  = new conn;
            $id_venta        = $data['id_venta'];
            $id_producto     = $data['id_producto']; 
            $nombre_producto = $data['nombre_producto']; 
            $unidades        = $data['unidades'];
            $precio          = $data['precio'];
            $precio_total    = $data['precio_total'];
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
        $response['process'] ='select all Ventas-Description';
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
        $response['process'] ='select all Ventas-Description';
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

    function update($id){
        $putData =   file_get_contents('php://input');
        $data = json_decode($putData, true);
        $prepare_sql = array();
        $sql = "UPDATE  `ventas_descripcion` SET";
        foreach ($data as $campo => $valor) { 
            $prepare_sql[] ="$campo = '$valor'";
        }
        $sql .= " ".implode(", ",$prepare_sql);
        $sql .= "  WHERE `id` = '$id'";
        $response['process'] ='Update Ventas-Description';
        try {
            $conection = new conn;
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

    function delete($id){
        $response['process'] ='Delete Ventas-Description';
        try {
            $conection = new conn;
            $sql = "DELETE FROM `ventas_descripcion` WHERE `id` = '$id' ";
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
}
?>