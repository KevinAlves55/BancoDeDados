<?php

/***************************************************************************************************

    Obejetivo: Excluir dados de clientes no BD
    Data: 29/09/2021
    Autor: Kevin

****************************************************************************************************/

    // Arquivo de conexão do Banco
    require_once(SRC.'assets/bd/conexaoSql.php.');   

    function excluir($idCliente) {

        $sql = "delete from tblcliente where idcliente = ".$idCliente;

        // Abre a conexão com o BD
        $conexao = conexaoMysql();

        if (mysqli_query($conexao, $sql))
            if (mysqli_affected_rows($conexao))
            return true;
                else
                return false;
            else
            return false;

    }

?>