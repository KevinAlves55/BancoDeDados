<?php

/***********************************************

    Obejetivo: Buscar/Listar os dados de clientes solicitando ao BD
    Data: 23/09/2021
    Autor: Kevin

*************************************************/
require_once(SRC.'assets/bd/listarClientes.php');

function exibirClientes() {

    // Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados = listar();

    return $dados;

}

?>