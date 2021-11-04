<?php

/***************************************************************************************************

    Obejetivo: Arquivo responsável por receber os dados dos clientes e encaminhar para a função que irá exluir o dado 
    Data: 06/10/2021
    Autor: Kevin

****************************************************************************************************/

    require_once('../function/config.php');
    require_once(SRC.'assets/bd/listarClientes.php');

    $idCliente = $_GET['id'];
    
    // Chama a função para buscar id do cliente
    $dadosCliente = buscar($idCliente);

    // Chama a função buscar e encaminha o id que será localizado no BD
    if($rsCliente = mysqli_fetch_assoc($dadosCliente)) {
        
        // Ativa a utilização de varivaies de sessão(Globais)
        session_start();
        
        // Criamos uma variavel de seção
        $_SESSION['cliente'] = $rsCliente;

        // Permite chamar um arquivo como se fosse um link, atráves do php
        header('location:../../index.php');
    }
    else
    echo("<script> alert('". BD_MSG_EXCLUI_ERRO ."'); window.history.back(); </script>");

?>