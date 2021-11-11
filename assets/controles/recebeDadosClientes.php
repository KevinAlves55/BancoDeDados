<?php

/***************************************************************************************************

    Obejetivo: Arquivo responsável por receber dados, tratar os dados e válidar os dados de clientes
    Data: 15/09/2021
    Autor: Kevin

****************************************************************************************************/

    // Import do arquivo que faz upload 
    require_once('../function/config.php');
    require_once('../function/upload.php');
    require_once(SRC.'assets/bd/inserirCliente.php');
    require_once(SRC.'assets/bd/atualizarCliente.php');

    // Declarações de variáveis
    $nome = (string) null;
    $rg = (string) null;
    $cpf = (string) null;
    $telefone = (string) null;
    $celular = (string) null;
    $email = (string) null;
    $obs = (string) null;
    $idEstado = (int) null;
    $foto = (string) null;

    // Validação para saber se o id do registro está chegando
    if (isset( $_GET['id']))
    $id = (int) $_GET['id'];
    else
    $id = (int) 0;

    
    // Forma diferenciada para validar o método
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nome = $_POST['txtNome'];
        $rg = $_POST['txtRg'];
        $cpf = $_POST['txtCpf'];
        $telefone = $_POST['txtTelefone'];
        $celular = $_POST['txtCelular'];
        $email = $_POST['txtEmail'];
        $obs = $_POST['txtObs'];
        $idEstado = $_POST['sltEstado'];
        $nomeFoto = $_GET['nomeFoto'];

        if (strtoupper($_GET['modo']) == 'ATUALIZAR') {
        
            if ($_FILES['fleFoto']['name'] != '') {
                
                $foto = uploadFile($_FILES['fleFoto']);
                unlink(SRC.NOME_DIRETORIO_FILE.$nomeFoto);
    
            } else {
                
                $foto = $nomeFoto;
    
            }
    
        } else {

            $foto = uploadFile($_FILES['fleFoto']);

        }


        if ($nome == null || $rg == null || $cpf == null || $idEstado == null)
        echo("<script>alert('". ERRO_CAIXA_VAZIA ."'); window.history.back();</script>");
        
        // strlen() retorna a quantidade de caracteres de uma variável
        elseif(strlen($nome) > 100 || strlen($rg) > 15 || strlen($cpf) > 20)
        echo("<script>alert('". ERRO_QUANTIDADE_DIGITOS ."'); window.history.back();</script>");

        else {
                
                // local para enviar os dados para o BD
            
                // Criação de array para encaminhar a função de enserir
                $clientes = array(

                    "nome" => $nome,
                    "rg" => $rg,
                    "cpf" => $cpf,
                    "telefone" => $telefone,
                    "celular" => $celular,
                    "email" => $email,
                    "obs" => $obs,
                    "id" => $id,
                    "idEstado" => $idEstado,
                    "foto" => $foto

                );
                
                if (strtoupper( $_GET['modo']) == 'SALVAR'){
                    
                    // Chamada da função inserir() do arquivo arquivo inseririCliente.php
                    if (inserir($clientes))
                    echo("<script> alert('". BD_MSG_INSERIR ."'); window.location.href = '../../index.php';</script>");
                    
                    else
                    echo("<script> alert('". BD_MSG_ERRO ."'); window.history.back(); </script>");

                
                } 
                
                elseif(strtoupper($_GET['modo']) == 'ATUALIZAR') {

                    if(editar($clientes))
                    echo("<script> alert('". BD_MSG_INSERIR ."'); window.location.href = '../../index.php';</script>");
                    
                    else
                    echo("<script> alert('". BD_MSG_ERRO ."'); window.history.back(); </script>");

                }

        }

    
    }

?>