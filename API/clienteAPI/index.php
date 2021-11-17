<?php

    // Import para o start do slim do php
    require_once('vendor/autoload.php');

    // Import do arquivo de configuração do sistema
    // require_once('../assets/function/config.php');

    // Instancia da classe Slim\App, é realizada para termos acesso aos métodos da classe
    $app = new \Slim\App();

    /* 
     
        EndPoint - é um ponto de parada da API, ou seja, serão as formas de requisição
        que a API irá responder
    
    */

    /* 

        $request - será usado para pegar algo que vai enviado para a API
        $response - será utilizado para quando a API irá devolver algo, seja uma mensagem
        $args - serão os argumentos que podem ser encaminhadas para a API
        
    */

    // EndPoint : GET, Retorna todos os dados de cliente
    $app->get('/clientes', function($request, $response, $args){

        return $response  
        -> withStatus(200) 
        -> withHeader('Content-Type', 'application/json') 
        -> write ('{"message":"Requisição com sucesso"}');

    });

    // EndPoint : POST, Envia um novo cliente para o BD
    $app->post('/clientes', function($request, $response, $args){

        return $response  
        -> withStatus(201) 
        -> withHeader('Content-Type', 'application/json') 
        -> write ('{"message":"Item criado com sucesso"}');

    });

    // EndPoint : PUT, Atualiza um cliente no BD
    $app->put('/clientes', function($request, $response, $args){

        return $response  
        -> withStatus(201) 
        -> withHeader('Content-Type', 'application/json') 
        -> write ('{"message":"Item atualizado com sucesso"}');

    });

    // EndPoint : Delete, Exclui um cliente do BD
    $app->delete('/clientes', function($request, $response, $args){

        return $response  
        -> withStatus(200) 
        -> withHeader('Content-Type', 'application/json') 
        -> write ('{"message":"Item excluido com sucesso"}');

    });

    // Carrega todos os EndPoint para a execução
    $app -> run();

?>