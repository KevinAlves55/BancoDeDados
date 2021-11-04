<?php

/***********************************************

    Obejetivo: Inserir dados de clientes no BD
    Data: 16/09/2021
    Autor: Kevin

*************************************************/

// Arquivo de conexão do Banco
require_once('../bd/conexaoSql.php');

function inserir($arryClientes) {
    
    $sql = "insert into tblcliente(
        
        nome,
        foto,
        rg,
        cpf,
        telefone,
        celular,
        email,
        obs,
        idEstado
    )
    values (

        '". $arryClientes['nome'] ."',
        '".$arryClientes['foto']."',
        '". $arryClientes['rg'] ."',
        '". $arryClientes['cpf'] ."',
        '". $arryClientes['telefone'] ."',
        '". $arryClientes['celular'] ."',
        '". $arryClientes['email'] ."',
        '". $arryClientes['obs'] ."',
        ".$arryClientes['idEstado']."
    
    )";
    
    // Chamando a função que estabelece a conexão com BD
    $conexao = conexaoMysql();

    // Envia o script sql para o BD
    // Colocamos o uma laço if de verdadeiro ou falso
    if (mysqli_query($conexao, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>