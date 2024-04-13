<?php

require "../db/conection.php";
require "../headers/header.php";

class cierre_caja
{

   function insert()
   {
      $response['process'] = 'Insert Cierre Caja';
      $putData =   file_get_contents('php://input');
      $data = json_decode($putData, true);
      try {
         $conection   = new conn;
         $fecha      = $data['fecha'];
         $gasto_total = $data['gasto_total'];
         $efectivo_total       = $data['efectivo_total'];
         $venta_total       = $data['venta_total'];
         $sql         = "INSERT INTO `cierre_caja` (`id`, `fecha`, `gasto_total`, `efectivo_total`, `venta_total`) VALUES (NULL, '$fecha', '$gasto_total', '$efectivo_total', '$venta_total')";
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
      $response['process'] = 'Select all Cierre Caja';
      try {
         $conection = new conn;
         $sql = "SELECT * FROM `cierre_caja`";
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
      $response['process'] = 'Select all Cierre Caja';
      try {
         $conection = new conn;
         $sql = "SELECT * FROM `cierre_caja` WHERE `id` = '$id'";
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
      $putData = file_get_contents('php://input');
      $data = json_decode($putData, true);
      $prepare_sql = array();
      $sql = "UPDATE `cierre_caja` SET";
      foreach ($data as $campo => $valor) {
         $prepare_sql[] = "$campo = '$valor'";
      }
      $sql .= " " . implode(", ", $prepare_sql);
      $sql .= "  WHERE `id` = '$id'";
      $response['process'] = 'Update Cierre Caja';
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
      $response['process'] = 'Delete Cierre Caja';
      try {
         $conection = new conn;
         $sql = "DELETE FROM `cierre_caja` WHERE `id` = '$id' ";
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
