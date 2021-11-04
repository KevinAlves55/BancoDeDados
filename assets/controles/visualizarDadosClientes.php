<?php

/* 
    Objetivo: Arquivo responsável por buscar um registro para exibir na modal do visualizar 
    Data: 21/10/2021
    Autor: Kevin
*/

    require_once('assets/function/config.php');
    require_once(SRC.'assets/bd/listarClientes.php');

    function visualizarCliente($id) {

        // Recebe o id enviado na função, como argumento
        $idCliente = $id;

        // Chama a função para buscar id do cliente
        $dadosCliente = buscar($idCliente);

        // Chama a função buscar e encaminha o id que será localizado no BD
        if($rsCliente = mysqli_fetch_assoc($dadosCliente)) {

            return $rsCliente;

        } else {

            false;

        }

    }

?>