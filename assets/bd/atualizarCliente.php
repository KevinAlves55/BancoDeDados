<?php

/***********************************************

    Obejetivo: Atualizar dados de um cliente existente no BD
    Data: 13/10/2021
    Autor: Kevin

*************************************************/

// Arquivo de conexão do Banco
    require_once('../bd/conexaoSql.php');

    function editar ($arryClientes) {

        $sql = "update tblcliente set 
            
            nome = '".$arryClientes['nome']."',
            rg = '".$arryClientes['rg']."',
            cpf = '".$arryClientes['cpf']."',
            idEstado = ".$arryClientes['idEstado'].",
            telefone = '".$arryClientes['telefone']."',
            celular = '".$arryClientes['celular']."',
            email = '".$arryClientes['email']."',
            obs = '".$arryClientes['obs']."',
            foto = '".$arryClientes['foto']."'

        where idcliente = ".$arryClientes['id'];

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