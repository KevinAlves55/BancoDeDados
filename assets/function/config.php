<?php

/***********************************************************************************************

    Obejetivo: Arquivo de consiguração de variáveis e constantes que serão utilizadas no sistema
    Data: 15/09/2021
    Autor: Kevin

*************************************************************************************************/
    // Constante para indicar a pasta raiz do servidor mais a estrutura de diretórios até o meu projeto
    define ('SRC' , $_SERVER['DOCUMENT_ROOT'] . '/ds2t20212/Kevin/AULA11/');
    
    // Variáveis e constantes para a conexão do BD MySQL
    const BD_SERVER = 'localhost';
    const BD_USER = 'root';
    const BD_PASSWORD = 'bcd127';
    const BD_DATABASE = 'dbcontatos2021_2t';
    
    // Mensagens de erro do sistema
    const ERRO_CONEXAO_BD = 'Não foi possível realizar a conexão com o Bando de Dados, entre em contato com a administrador do sistema';
    const ERRO_CAIXA_VAZIA = 'Preencha todos os campos';
    const ERRO_QUANTIDADE_DIGITOS = 'Exesso de caracter';

    // Aceitação e validação de dados
    const BD_MSG_INSERIR = 'Registro salvo com sucesso no BD';
    const BD_MSG_ERRO = 'ERRO: Não foi possivel manipular os dados do BD';

    // Exclusão de dado
    const BD_MSG_EXCLUI = "<script> alert('Dado excluido com sucesso'); window.location.href = '../../index.php'; </script>";
    const BD_MSG_EXCLUI_ERRO = 'Não foi possivel apagar o dado. Tente novamente';

    // Constantes para upload de Arquivos
    define('NOME_DIRETORIO_FILE', 'arquivos/');
    $extencoesPermitidasFile = array('image/png', 'image/jpg/', 'image/jpeg');
    define('EXTENCOES_PERMITIDAS', $extencoesPermitidasFile);

    const TAMANHO_ARQUIVO = '5120';


?>                                                            