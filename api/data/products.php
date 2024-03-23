<?php
    require "../models/products.php";
   
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
        $products = new Products;
        if (isset($_GET['id'])) {
            $products->select_id($_GET['id']);
        }else{
            $products->select_all();
        }
    }


    function petition_Post(){ 
        $products = new Products;
        $products->insert();
        
    }


    function petition_Put(){ 
        $products = new Products;
        $products->update('');
        
    }


    function petition_Delete(){
        $products = new Products;
        $products->delete('');
        
    }

    
  

?>