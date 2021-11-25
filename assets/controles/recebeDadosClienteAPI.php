<?php

/*****************************************

Obejtivo: Arquivo responsável por receber os dados da API
Data: 24/11/2021
Autor: Kevin 

 
************************************************/ 

    // require_once('../assets/function/config.php');
    require_once(SRC.'assets/bd/inserirCliente.php');
    require_once(SRC. 'assets/bd/atualizarCliente.php');
    require_once(SRC. 'assets/bd/excluiCliente.php');

    function inserirClienteAPI($arrayDados) {

        // Fazer tratamentos de dados para consistencia...

        if (inserir($arrayDados)) {
            
            return true;

        } else {

            return false;

        }

    }

    // Função para atualizar dados no BD via PUT da API
    function atualizarClienteAPI($arrayDados, $id) {

        // Criando um novo array para adicionar um novo item
        $novoItem = array(

            "id" => $id

        );

        // Acrecenta um novo item no array dados, fazendo uma mescla de dados que é o id
        $arrayCliente = $arrayDados + $novoItem;

        // Fazer tratamentos de dados para consistencia...

        if (editar($arrayCliente)) {
            
            return true;

        } else {

            return false;

        }

    }

    function deletarClienteAPI($id) {

        if (excluir($id)) {
            
            return true;

        } else {

            return false;

        }

    }

?>