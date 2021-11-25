<?php
    //  
    // Import para o start do slim do php
    require_once('vendor/autoload.php');

    // Import do arquivo de configuração do sistema
   

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
    $app -> get('/clientes', function($request, $response, $args) {

        require_once('../assets/function/config.php');
        require_once('../assets/controles/exibiDadosClientes.php');

        // Chama a função (na pasta controles) que vai requisitar os dados do BD
        if ($listDados = exibirClientes())
        if($listDadosArray = criarArray($listDados))
        $listDadosJSON = criarJSON($listDadosArray);

        // Validação para tratar BD sem dados
        if ($listDadosArray) {

            return $response
            -> withStatus(200) 
            -> withHeader('Content-Type', 'application/json') 
            -> write($listDadosJSON);

        } else {

            return $response
            -> withStatus(204);

        }

    });

    // EndPoint : GET, Retorna um cliente pelo id
    $app -> get('/clientes/{id}', function($request, $response, $args) {

        require_once('../assets/function/config.php');
        require_once('../assets/controles/exibiDadosClientes.php');

        // Recebe o id que será encaminhado na URL
        $id = $args['id'];

        // Chama a função (na pasta controles) que vai requisitar os dados do BD
        if ($listDados = buscarClientes($id))
        if($listDadosArray = criarArray($listDados))
        $listDadosJSON = criarJSON($listDadosArray);

        // Validação para tratar BD sem dados
        if ($listDadosArray) {

            return $response
            -> withStatus(200) 
            -> withHeader('Content-Type', 'application/json') 
            -> write($listDadosJSON);

        } else {

            return $response
            -> withStatus(204);

        }

    });

    // EndPoint : POST, Envia um novo cliente para o BD
    $app -> post('/clientes', function($request, $response, $args) {

        // Recebe o contentType do header, para verificar se o padrão do body será Json
        $contentType = $request -> getHeaderLine('Content-Type');

        // Valida se o tipo de dados é Json
        if ($contentType == 'application/json') {

            $dadosBodyJSON = $request -> getParsedBody();

            // Valida se o corpo do body está vazio
            if ($dadosBodyJSON == '' || $dadosBodyJSON == null) {
                
                return $response  
                -> withStatus(406) 
                -> withHeader('Content-Type', 'application/json') 
                -> write (
                    
                    '{
                        "message":"Conteúdo enviado pelo body não contém dados"
                    }'
                
                );

            } else {
                require_once('../assets/function/config.php');
                require_once('../assets/controles/recebeDadosClienteAPI.php');
                
                // Envia os dados e valida se foi inserido com sucesso
                if(inserirClienteAPI($dadosBodyJSON)) {

                    return $response  
                    -> withStatus(201) 
                    -> withHeader('Content-Type', 'application/json') 
                    -> write (
                        
                        '{
                            "message":"Item criado com sucesso"
                        }'
                    
                    );

                } else {

                    return $response  
                    -> withStatus(400) 
                    -> withHeader('Content-Type', 'application/json') 
                    -> write (
                        
                        '{
                            "message":"Não foi possível salvar os dados, por favor verificar o body da mensagem"
                        }'
                    
                    );

                }

            }    

        } else {

            return $response  
            -> withStatus(406) 
            -> withHeader('Content-Type', 'application/json') 
            -> write (
                
                '{
                    "message":"Formato de dados do header, inconpatível com o padrão JSON"
                }'
            
            );

        }

        

    });

    // EndPoint : PUT, Atualiza um cliente no BD
    $app -> put('/clientes', function($request, $response, $args) {

        return $response  
        -> withStatus(201) 
        -> withHeader('Content-Type', 'application/json') 
        -> write (
            
            '{
                "message":"Item atualizado com sucesso"
            }'
        
        );

    });

    // EndPoint : Delete, Exclui um cliente do BD
    $app -> delete('/clientes', function($request, $response, $args) {

        return $response  
        -> withStatus(200) 
        -> withHeader('Content-Type', 'application/json') 
        -> write (
            
            '{
                "message":"Item excluido com sucesso"
            }'
        
        );

    });

    // Carrega todos os EndPoint para a execução
    $app -> run();

?>