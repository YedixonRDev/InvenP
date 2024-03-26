<?php
    require "../models/ventas.php";


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


    function petition_Get(){
        $ventas = new Ventas;
        if (isset($_GET['id'])) {
            $ventas->select_id($_GET['id']);
        }else{
            $ventas->select_all();
        }
    }


    function petition_Post(){ 
        $ventas = new Ventas;
        $ventas->insert('');
        
    }


    function petition_Put(){ 
        if (isset($_GET['id'])) {
            $ventas = new Ventas;
            $ventas->update($_GET['id']);
        }
        
        
    }


    function petition_Delete(){
        if (isset($_GET['id'])) {
            $ventas = new Ventas;
            $ventas->delete($_GET['id']);
        }
        
        
    }
  

?>