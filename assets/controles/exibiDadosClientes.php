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

// Função para buscar dados do BD
function buscarClientes($id) {

    // Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados = buscar($id);

    return $dados;

}

function criarArray($objeto) {

    // Estrutura de repetição para pegar um objeto de dados e converter em um array
    $i = (int) 0;
    while ($rsDados = mysqli_fetch_assoc($objeto)) {

        $arrayDados[$i] = array(

            "id" => $rsDados['idcliente'],
            "nome" => $rsDados['nome'],
            "rg" => $rsDados['rg'],
            "cpf" => $rsDados['cpf'],
            "telefone" => $rsDados['telefone'],
            "celular" => $rsDados['celular'],
            "email" => $rsDados['email'],
            "obs" => $rsDados['obs'],
            "foto" => $rsDados['foto'],
            "idEstado" => $rsDados['idEstado'],
            "sigla" => $rsDados['sigla'],

        );

        $i++;

    }
    
    if (isset($arrayDados)) {
        
        return $arrayDados;

    } else {

        return false;

    }

}

// Função para gerar um JSON, com base em um array de dados
function criarJSON ($arrayDados) {

    // Especifica no cabeçalho do php será gerado um JSON
    header("content-type:application/json");

    // Converte um array em Json
    $listJson = json_encode($arrayDados);

    /* 

        json_encode() - converte um array em formato JSON
        json_decode() - converte um JSON em formato array
    
    */
    
    if (isset($listJson)) {

        return $listJson;

    } else {

        return false;

    }
}

?>