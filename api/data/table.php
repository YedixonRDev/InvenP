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
        $table = new Table;
        $table->update('');
        
    }


    function petition_Delete(){
        $table = new Table;
        $table->delete('');
        
    }
  

?>