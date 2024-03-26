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
        if (isset($_GET['id'])) {
            $gastos = new Gastos;
            $gastos->update($_GET['id']);
        }
    }


    function petition_Delete(){
        if (isset($_GET['id'])) {
            $gastos = new Gastos;
            $gastos->delete($_GET['id']);
        }
    }
?>