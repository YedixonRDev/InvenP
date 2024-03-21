<?php
    require "../models/gastos.php";


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
        $gastos = new Gastos;
        if (isset($_GET['id'])) {
            $gastos->select_id($_GET['id']);
        }else{
            $gastos->select_all();
        }
    }


    function petition_Post(){ 
        $gastos = new Gastos;
        $gastos->insert('');
        
    }


    function petition_Put(){ 
        $gastos = new Gastos;
        $gastos->update('');
        
    }


    function petition_Delete(){
        $gastos = new Gastos;
        $gastos->delete('');
        
    }
  

?>