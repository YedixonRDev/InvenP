<?php
    require "../models/ventasDescription.php";


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
        $ventasDescription = new VentasDescription;
        if (isset($_GET['id'])) {
            $ventasDescription->select_id($_GET['id']);
        }else{
            $ventasDescription->select_all();
        }
    }


    function petition_Post(){ 
        $ventasDescription = new VentasDescription;
        $ventasDescription->insert('');
        
    }


    function petition_Put(){ 
        $ventasDescription = new VentasDescription;
        $ventasDescription->update('');
        
    }


    function petition_Delete(){
        $ventasDescription = new VentasDescription;
        $ventasDescription->delete('');
        
    }
  

?>