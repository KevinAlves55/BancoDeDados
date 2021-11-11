<?php

    // Import do arquivo para buscar os dados clinetes
    require_once('assets/controles/visualizarDadosClientes.php');

    // Recebe o id enviado pelo ajax na página da index
    $id = $_GET['id'];
    
    // Chama a função para buscar no BD
    $dadosClientes = visualizarCliente($id);

    

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar</title>
</head>

<body>

    <table>
        <tr>
            <td>Nome: </td>
            <td><?=$dadosClientes['nome']?></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><?=$dadosClientes['email']?></td>
        </tr>
        <tr>
            <td>Imagem: </td>
            <td><img src="<?=NOME_DIRETORIO_FILE.$dadosClientes['foto']?>" alt=""></td>
        </tr>
        <tr>
            <td>Celular</td>
            <td><?=$dadosClientes['celular']?></td>
        </tr>
    </table>

</body>

</html>