<?php

/***********************************************

    Obejetivo: Listar todos os dados de clientes do BD
    Data: 23/09/2021
    Autor: Kevin

*************************************************/

    require_once(SRC.'assets/bd/conexaoSql.php');
    
    // Função responsável para abrir um script de seleção
    function listar () {

        // Comando para rodar o select
        $sql = "select * from tblcliente order by idcliente desc";

        // Abre a conexão com o BD
        $conexao = conexaoMysql();

        // Solicita ao BD a execução do script SQL guardado dentro de um select
        $select = mysqli_query($conexao, $sql);

        return $select;

    }

    // Retorna apenas um registro, com base no id
    function buscar($idCliente) {

        // Comando para rodar o select
        $sql = "select tblCliente.*, tblEstado.sigla 
                from tblCliente
                    inner join tblEstado
                    on tblEstado.idEstado = tblCliente.idEstado
                where tblCliente.idCliente = ".$idCliente;

        // Abre a conexão com o BD
        $conexao = conexaoMysql();

        // Solicita ao BD a execução do script SQL guardado dentro de um select
        $select = mysqli_query($conexao, $sql);

        return $select;

    }

?>