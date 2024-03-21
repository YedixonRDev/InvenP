<?php
    require "../models/user.php";


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
        $user = new User;
        if (isset($_GET['id'])) {
            $user->select_id($_GET['id']);
        }else{
            $user->select_all();
        }
    }


    function petition_Post(){ 
        $user = new User;
        $user->insert('');
        
    }


    function petition_Put(){ 
        $user = new User;
        $user->update('');
        
    }


    function petition_Delete(){
        $user = new User;
        $user->delete('');
        
    }
  

?>