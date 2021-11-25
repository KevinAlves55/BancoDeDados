<?php

/*****************************************

Obejtivo: Arquivo responsável por receber os dados da API
Data: 24/11/2021
Autor: Kevin 

 
************************************************/ 

    // require_once('../assets/function/config.php');
    require_once(SRC.'assets/bd/inserirCliente.php');

    function inserirClienteAPI($arrayDados) {

        // Fazer tratamentos de dados para consistencia...

        if (inserir($arrayDados)) {
            
            return true;

        } else {

            return false;

        }

    }

?>