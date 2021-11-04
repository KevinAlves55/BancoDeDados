<?php

    session_start();
    
    $nome = (string) null;
    $telefone = (string) null;
    $celular = (string) null;
    $rg = (string) null;
    $cpf = (string) null;
    $email = (string) null;
    $obs = (string) null;
    $id = (int) 0;
    
    // Variáveis para trazer os valores de estados
    $idEstado = (int) null;
    $sigla = (string) "Selecione um item";
    
    // Essa variavel será utilizada para definir o modo de manipulação com o BD(Se ela for salvar será feito o insert, se ela tiver atualizar, será feito o update do dado)
    $modo = (string) "Salvar";

// Comando que pega o caminho da URL
    // echo($_SERVER['DOCUMENT_ROOT']);
    
    // Import do arquivo de configuração de arquivos e constantes
    require_once('assets/function/config.php');
    
    require_once(SRC.'assets/bd/conexaoSql.php');
    // conexaoMysql();

    require_once(SRC. 'assets/controles/exibiDadosClientes.php');

    require_once(SRC. 'assets/controles/listarDadosEstados.php');

    // Verifica a exitencia da variavel sessão que usamos para trazer os dados para o editar
    if (isset($_SESSION['cliente'])) {
        
        $nome = $_SESSION['cliente']['nome'];
        $telefone = $_SESSION['cliente']['telefone'];
        $celular = $_SESSION['cliente']['celular'];
        $rg = $_SESSION['cliente']['rg'];
        $cpf = $_SESSION['cliente']['cpf'];
        $email = $_SESSION['cliente']['email'];
        $obs = $_SESSION['cliente']['obs'];
        $id = $_SESSION['cliente']['idcliente'];
        $idEstado = $_SESSION['cliente']['idEstado'];
        $sigla = $_SESSION['cliente']['sigla'];
        $modo = "Atualizar";

        // Elimina um objeto, varivel da memória
        unset($_SESSION['cliente']);
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AULA11</title>
    <link rel="stylesheet" href="assets/style/style.css">
    <script src="assets/js/jquery.js"></script>

    <script>
        $(document).ready(function(){

            $('#container-modal').css('display', 'none')

            $('.pesquisar').click(function(){
                
                $('#container-modal').fadeIn(1000);

                // Recebe o id do cliente que foi add pelo data atributo no HTML
                let idCliente = $(this).data('id');

                // Realizando uma requisição para consumir dados de uma outra página
                $.ajax({

                    type: "GET", // Tipo de requisição(GET, POST, PUT, etc)
                    
                    url: "visualizarDados.php", // URL da página que será utilizada

                    data: {id:idCliente},
                    
                    success: function(dados){ // Se a requisição der certo, iremos receber o conteúdo na variável dados

                        $('#modal').html(dados); // Exibe dentro da div MODAL

                    }

                });
            
            });

            $('#fechar-modal').click(function(){
                
                $('#container-modal').fadeOut();
            
            });
        
        });
    </script>
</head>

<body>

    <div id="container-modal">
        <span id="fechar-modal">
            <img src="assets/img/trash.png" alt="">
        </span>
        <div id="modal">
            
        </div>
    </div>

    <div id="cadastro">
        <div id="cadastroTitulo">
            <h1> Cadastro de Contatos </h1>
        </div>
        <div id="cadastroInformacoes">

            <!-- As variaveis modo e id que foram utilizadas no action form, são responsáveis por encaminhar para a página recebeDadosCliente.php duas informações:
            
            modo - que é responsável por definir se é para ensirir ou atualizar

            id - que é responsável por identificar o registro a ser atualizado no BD 
        
            Precisamos usar um elemento no form para manipular arquivos
            enctype="multipart/form-data(Quando for trabalhar com imagens)"

            OBS: Não é possível manipular o file com method GET
            -->
            <form enctype="multipart/form-data" action="assets/controles/recebeDadosClientes.php?modo=<?=$modo?>&id=<?=$id?>" name="frmCadastro" method="post">

                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Nome: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtNome" value="<?=$nome?>" placeholder="Digite seu Nome">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Foto: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="file" accept="image/jpeg, image/jpg, image/png" name="fleFoto">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> RG: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtRg" value="<?=$rg?>" placeholder="Digite sua RG">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> CPF: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtCpf" value="<?=$cpf?>" placeholder="Digite seu CPF">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Estado: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <select name="sltEstado">
                            <option selected value="<?=$idEstado?>"><?=$sigla?></option>

                            <?php
                                $listEstados = exibirEstados();

                                while ($rsEstados = mysqli_fetch_assoc($listEstados))
                                {
                                    ?>
                                        <option value="<?=$rsEstados['idEstado']?>"> <?=$rsEstados['sigla']?> </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Telefone: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="tel" name="txtTelefone" value="<?=$telefone?>" placeholder="Digite seu telefone">
                    </div>
                    <!-- 

                        Tipos de elementos de formulário para HTML5

                        type="tel"> indica que a caixa recebe um telefone
                        type="email"> indica que a caixa recebe um email e valida o campo com o @ obrigatorio
                        type="url"> indica que a caixa recebe uma URL valida (HTTP://)
                        type="number"> indica que a caixa recebe apenas números inteiros
                        type="range"> cria um elemento tipo barra de rolagem horizontal
                        type="color"> cria um elemento que captura a cor
                        type="date">  cria um calendario
                        type="month"> cria um calendario para escolher somente mês e ano
                        type="week"> cria um calendario que retorna o numero da semana do ano  

                    -->
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Celular: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="tel" name="txtCelular" value="<?=$celular?>" placeholder="Digite um número de celular">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Email: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="email" name="txtEmail" value="<?=$email?>" placeholder="Digite um Email">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Observações: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <textarea name="txtObs" cols="50" rows="7" placeholder="Ex: Quero entar nessa ecola por tais motivos.."><?=$obs?></textarea>
                    </div>
                </div>
                <div class="enviar">
                    <div class="enviar">
                        <input type="submit" name="btnEnviar" value="<?=$modo?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="consultaDeDados">
        <table id="tblConsulta">
            <tr>
                <td id="tblTitulo" colspan="5">
                    <h1> Consulta de Dados.</h1>
                </td>
            </tr>
            <tr id="tblLinhas">
                <td class="tblColunas destaque"> Nome </td>
                <td class="tblColunas destaque"> Celular </td>
                <td class="tblColunas destaque"> Email </td>
                <td class="tblColunas destaque"> Opções </td>
            </tr>
            
            <?php
            
                $dadosClientes = exibirClientes();

                while ($rsClientes = mysqli_fetch_assoc($dadosClientes)) {
                    


                
            
            ?>
                <tr id="tblLinhas">
                    <td class="tblColunas registros">
                        <?=$rsClientes['nome']?>
                    </td>
                    <td class="tblColunas registros">
                        <?=$rsClientes['celular']?>
                    </td>
                    <td class="tblColunas registros">
                        <?=$rsClientes['email']?>
                    </td>
                    
                    <td class="tblColunas registros">
                        <a href="assets/controles/editaDadosClientes.php?id=<?=$rsClientes['idcliente']?>"><img src="assets/img/edit.png" alt="Editar" title="Editar" class="editar"></a>
                        
                        <a onclick="return confirm('Tem certeza que deseja excluir?');" href="assets/controles/excluiDadosClientes.php?id=<?=$rsClientes['idcliente']?>">
                            <img src="assets/img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>
                        
                        <img src="assets/img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar" data-id="<?=$rsClientes['idcliente']?>">
                    </td>
                </tr>
            
            <?php
            }
            ?>
        </table>
    </div>

</body>

</html>