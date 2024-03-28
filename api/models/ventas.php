<?php

require "../db/conection.php";
require "../headers/header.php";

class Ventas {

    function insert(){

        $response['process'] ='Insert Ventas';
        $putData =   file_get_contents('php://input');
        $data = json_decode($putData, true);
        try {
            $conection  = new conn;
            $id_venta   = $data['id_venta'];
            $total      = $data['total']; 
            $fecha      = $data['fecha']; 
            $sql        = "INSERT INTO `ventas` (`id`, `id_venta`, `total`, `fecha`) VALUES (NULL, '$id_venta', '$total', '$fecha')";
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
        $response['process'] ='select all Ventas';
        try {
            $conection = new conn;
            $sql = "SELECT * FROM `ventas`";
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
        $response['process'] ='select all Ventas';
        try {
            $conection = new conn;
            $sql = "SELECT * FROM `ventas` WHERE `id` = '$id'";
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
        $sql = "UPDATE  `ventas` SET";
        foreach ($data as $campo => $valor) { 
            $prepare_sql[] ="$campo = '$valor'";
        }
        $sql .= " ".implode(", ",$prepare_sql);
        $sql .= "  WHERE `id` = '$id'";
        $response['process'] ='Update Ventas';
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
        $response['process'] ='Delete Ventas';
        try {
            $conection = new conn;
            $sql = "DELETE FROM `ventas` WHERE `id` = '$id' ";
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