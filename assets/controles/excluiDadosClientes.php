<?php

/***************************************************************************************************

    Obejetivo: Arquivo responsável por exclui os dados dos clientes e encaminhar para a função que irá exluir o dado 
    Data: 29/09/2021
    Autor: Kevin

****************************************************************************************************/

    require_once('../function/config.php');
    require_once(SRC.'assets/bd/excluiCliente.php');

    $idCliente = $_GET['id'];
    $caminhoFoto = $_GET['foto'];

    if(excluir($idCliente)) {
        
        // Pegamos o arquivo da URL, o nome do diretorio e a variavel via GET para apagar o arquivo com a imagem junto
        unlink(SRC.NOME_DIRETORIO_FILE.$caminhoFoto);
        echo(BD_MSG_EXCLUI);
        
    }
    else {
        
        echo("<script> alert('". BD_MSG_EXCLUI_ERRO ."'); window.history.back(); </script>");

    }

?>