<?php

/***************************************************************************************************

    Obejetivo: Arquivo responsável por exclui os dados dos clientes e encaminhar para a função que irá exluir o dado 
    Data: 29/09/2021
    Autor: Kevin

****************************************************************************************************/

    require_once('../function/config.php');
    require_once(SRC.'assets/bd/excluiCliente.php');

    $idCliente = $_GET['id'];

    if(excluir($idCliente))
    echo(BD_MSG_EXCLUI);
    else
    echo("<script> alert('". BD_MSG_EXCLUI_ERRO ."'); window.history.back(); </script>");

?>