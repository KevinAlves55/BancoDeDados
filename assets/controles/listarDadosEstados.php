<?php

/***********************************************

    Obejetivo: Listar os dados de estado no BD
    Data: 27/10/2021
    Autor: Kevin

*************************************************/
    require_once(SRC.'assets/bd/listarEstados.php');

    function exibirEstados() {

        // Chama a função que busca os dados no BD e recebe os registros de clientes
        $dados = listarEstados();

        return $dados;

    }

?>