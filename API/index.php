<?php
   
   $url = (string) null;
   
   $url = explode('/', $_GET['url']);

    switch ($url[0]) {
        
        case 'clientes':
            require_once('clienteAPI/index.php');
        break;

        case 'estados':
            require_once('estadosAPI/index.php');
        break;
        
    }

?>