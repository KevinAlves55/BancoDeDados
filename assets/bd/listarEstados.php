<?php
/***********************************************

    Obejetivo: Listar todos os dados de estados do BD
    Data: 27/10/2021
    Autor: Kevin

*************************************************/

    require_once(SRC.'assets/bd/conexaoSql.php');
        
    // Função responsável para abrir um script de seleção
    function listarEstados () {

        // Comando para rodar o select
        $sql = "select * from tblEstado order by nome";

        // Abre a conexão com o BD
        $conexao = conexaoMysql();

        // Solicita ao BD a execução do script SQL guardado dentro de um select
        $select = mysqli_query($conexao, $sql);

        return $select;

    }
?>