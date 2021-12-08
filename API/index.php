<?php

    // Permissões e configurações para a API responder em um servidor real
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Header: Content-Type');
    header('Content-Type: application/json');
    
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