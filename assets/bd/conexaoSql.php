<?php

/**************************************************************
    
    Objetivo: Arquivo para configurar a conexão com o BD MySQL
    Data: 15/05/2021
    Autor: Kevin

***************************************************************/

// Abre a conexão com a base de dados MySQL

function conexaoMysql() {

    // Quatro informações principais de que precisamos para fazer uma conexão com o banco(No caso variáveis)
    $server = (string) BD_SERVER;
    $user = (string) BD_USER;
    $password = (string) BD_PASSWORD;
    $database = (string) BD_DATABASE;

    /* 
    
        Formas de criar a conexão com o BD

        mysql_connect(); * Seu uso não é muito indicado, pois não detém muita segurança *
        mysqli_connect(); * Seu uso já traz um pouco mais de segurança no BD, usado para programação procedural e orientada a objetos * (Usaremos esse em aula)
        PDO(); * Sendo a biblioteca mais atualizada do PHP e mais seguro, apenas um lembrete que ele trabalha orientado a objeto, ou seja, estrutura de classes *
    
    */

    // Mostra o status da conexão
    if($conexao = mysqli_connect($server, $user, $password, $database))
    return $conexao;
    else {
        echo(ERRO_CONEXAO_BD);
        return false;
    }
    

}

?>