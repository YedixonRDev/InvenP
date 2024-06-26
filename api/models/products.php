<?php

require "../db/conection.php";
require "../headers/header.php";

class Products
{

    function insert()
    {
        $response['process'] = 'Insert Products';
        $putData =   file_get_contents('php://input');
        $data = json_decode($putData, true);
        try {
            $conection = new conn;
            $nombre     = $data['nombre'];
            $categoria  = $data['categoria'];
            $precio     = $data['precio'];
            $sql = "INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`) VALUES (NULL, '$nombre', '$categoria', '$precio')";
            $conection->query($sql);
            $response['status'] = true;
            http_response_code(200);
        } catch (Exception $err) {
            $response['status'] = false;
            $response['sql'] = $sql;
            $response['error'] = $err->getMessage();
            http_response_code(401);
        }
        echo json_encode($response);
    }


    function select_all()
    {
        $response['process'] = 'select all Products';
        try {
            $conection = new conn;
            $sql = "SELECT * FROM `productos`";
            $con = $conection->query($sql);
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
            $response['status'] = false;
            $response['sql'] = $sql;
            $response['error'] = $err->getMessage();
            http_response_code(401);
        }
        echo json_encode($response);
    }

    function select_id($id)
    {
        $response['process'] = 'select id Products';
        try {
            $conection = new conn;
            $sql = "SELECT * FROM `productos` WHERE `id` = '$id' ";
            $con = $conection->query($sql);
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
            $response['status'] = false;
            $response['sql'] = $sql;
            $response['error'] = $err->getMessage();
            http_response_code(401);
        }
        echo json_encode($response);
    }

    function select_name($name)
    {
        $response['process'] = 'select name Products';
        try {
            $conection = new conn;
            $sql = "SELECT * FROM `productos` WHERE `nombre` like '%$name%' ";
            $con = $conection->query($sql);
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
            $response['status'] = false;
            $response['sql'] = $sql;
            $response['error'] = $err->getMessage();
            http_response_code(401);
        }
        echo json_encode($response);
    }

    function update($id)
    {
        $putData =   file_get_contents('php://input');
        $data = json_decode($putData, true);
        $prepare_sql = array();
        $sql = "UPDATE  `productos` SET";
        foreach ($data as $campo => $valor) {
            $prepare_sql[] = "$campo = '$valor'";
        }
        $sql .= " " . implode(", ", $prepare_sql);
        $sql .= "  WHERE `id` = '$id'";
        $response['process'] = 'Update Products';
        try {
            $conection = new conn;
            $conection->query($sql);
            $response['status'] = true;
            http_response_code(200);
        } catch (Exception $err) {
            $response['status'] = false;
            $response['sql'] = $sql;
            $response['error'] = $err->getMessage();
            http_response_code(401);
        }
        echo json_encode($response);
    }

    function delete($id)
    {
        $response['process'] = 'Delete Products';
        try {
            $conection = new conn;
            $sql = "DELETE FROM `productos` WHERE `id` = '$id' ";
            $conection->query($sql);
            $response['status'] = true;
            http_response_code(200);
        } catch (Exception $err) {
            $response['status'] = false;
            $response['sql'] = $sql;
            $response['error'] = $err->getMessage();
            http_response_code(401);
        }
        echo json_encode($response);
    }
}
