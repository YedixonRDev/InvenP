<?php
    class  conn  extends mysqli{
        function  __construct(){
            parent::__construct('localhost','root','','invenpro');
            if (mysqli_connect_error()) {
                print('error al conectar a la base de datos');
            }
        }
    }
?>