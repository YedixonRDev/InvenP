<?php

require "../db/conection.php";
require "../headers/header.php";

class Gastos {

    function insert(){
        $response['process'] = 'Insert Gastos';
        $putData =   file_get_contents('php://input');
        $data = json_decode($putData, true);
        try {
            $conection   = new conn;
            $nombre      = $data['nombre'];
            $descripcion = $data['descripcion'];
            $monto       = $data['monto'];
            $fecha       = $data['fecha'];
            $sql         = "INSERT INTO `gastos` (`id`, `nombre`, `descripcion`, `monto`, `fecha`) VALUES (NULL, '$nombre', '$descripcion', '$monto', '$fecha')";
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
        $response['process'] ='select all Gastos';
        try {
            $conection = new conn;
            $sql = "SELECT * FROM `gastos`";
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
        $response['process'] ='select all Gastos';
        try {
            $conection = new conn;
            $sql = "SELECT * FROM `gastos` WHERE `id` = '$id'";
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
        $putData = file_get_contents('php://input');
        $data = json_decode($putData, true);
        $prepare_sql = array();
        $sql = "UPDATE `gastos` SET";
        foreach ($data as $campo => $valor) { 
            $prepare_sql[] ="$campo = '$valor'";
        }
        $sql .= " ".implode(", ",$prepare_sql);
        $sql .= "  WHERE `id` = '$id'";
        $response['process'] ='Update Gastos';
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
        $response['process'] ='Delete Gastos';
        try {
            $conection = new conn;
            $sql = "DELETE FROM `gastos` WHERE `id` = '$id' ";
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