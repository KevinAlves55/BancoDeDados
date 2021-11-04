<?php

/***********************************************************************************************

    Obejetivo: Arquivo para fazer upload de imagens
    Data: 03/11/2021
    Autor: Kevin

*************************************************************************************************/

    // Função para fazer upload de arquivos
    function uploadFile($arrayFile) {

        /*Serve para parar a execução do código(Um meio de depurar o código)
        die;*/

        $fotoFile = $arrayFile;
        $tamanoOriginal = (int) 0;
        $tamanoKB = (int) 0;
        $tipoArquivo = (string) null;
        $nomeArquivo = (string) null;
        $extensao = (string) null;
        $nomeArquivoCript = (string) null;
        $arquivoTemp = (string) null;
        $foto = (string) null;

        // Valida se o arquivo existe no array
        if ($fotoFile['size'] > 0 && $fotoFile['type'] != '') {
            
            // Recebe tamano original do arquivo em byte
            $tamanoOriginal = $fotoFile['size'];

            // Convente o tamanho original em KBbytes
            $tamanoKB = $tamanoOriginal/1024;

            // Recebe a extenção original do arquivo
            $tipoArquivo = $fotoFile['type'];

            // Valida se o tamanho do arquivo é menor que do o permetido
            if ($tamanoKB <= TAMANHO_ARQUIVO) {

                if (in_array($tipoArquivo, EXTENCOES_PERMITIDAS)) {
                    
                    $nomeArquivo = pathinfo($fotoFile['name'], PATHINFO_FILENAME);

                    $extensao = pathinfo($fotoFile['name'], PATHINFO_EXTENSION);

                    /*
                        IMPORATNTE!! algoritmos de criptocrafia no php

                        hash('sha256', 'variavel')
                        sha1('variavel')
                        md5('variavel')
                    
                    */
                    
                    // uniqid() - gera uma sequencia numerica com base nas configurações de hardware da maquina

                    // time() - pega a hora:minuto:segundo atual
                    $nomeArquivoCript = md5($nomeArquivo.uniqid(time()));
                    
                    // Monta um novo arquivo com a execução
                    $foto = $nomeArquivoCript.'.'.$extensao;

                    // Recebe o nome do arquivo temporario que foi gerado quando o apache recebeu o arquivo do form
                    $arquivoTemp = $fotoFile['tmp_name'];

                    // Pega um arquivo de um lugar e move para outro lugar
                    if (move_uploaded_file($arquivoTemp, SRC.NOME_DIRETORIO_FILE.$foto)) {
                        
                        return $foto;

                    } else {
                        
                        echo('Erro no upload do arquivo');

                    }

                } else {

                    echo('Tipo de arquivo inválido');

                }

            } else {

                echo('Erro tamanho do arquivo');

            }

        }

    }

?>