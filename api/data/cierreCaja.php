<?php
require "../models/cierreCaja.php";


switch ($_SERVER['REQUEST_METHOD']) {
   case 'GET':
      petition_Get();
      break;
   case 'POST':
      petition_Post();
      break;
   case 'PUT':
      petition_Put();
      break;
   case 'DELETE':
      petition_Delete();
      break;
}


function petition_Get()
{
   $cierreCaja = new cierre_caja;
   if (isset($_GET['id'])) {
      $cierreCaja->select_id($_GET['id']);
   } else {
      $cierreCaja->select_all();
   }
}


function petition_Post()
{
   $cierreCaja = new cierre_caja;
   $cierreCaja->insert('');
}


function petition_Put()
{
   if (isset($_GET['id'])) {
      $cierreCaja = new cierre_caja;
      $cierreCaja->update($_GET['id']);
   }
}


function petition_Delete()
{
   if (isset($_GET['id'])) {
      $cierreCaja = new cierre_caja;
      $cierreCaja->delete($_GET['id']);
   }
}
