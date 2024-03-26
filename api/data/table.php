<?php
    require "../models/table.php";


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
        $table = new Table;
        if (isset($_GET['id'])) {
            $table->select_id($_GET['id']);
        }else{
            $table->select_all();
        }
    }


    function petition_Post(){ 
        $table = new Table;
        $table->insert('');
        
    }


    function petition_Put(){ 
        if (isset($_GET['id']))
        $table = new Table;
        $table->update($_GET['id']);
        
    }


    function petition_Delete(){
        if (isset($_GET['id'])){
            $table = new Table;
            $table->delete($_GET['id']);
        }
        
        
    }
  

?>