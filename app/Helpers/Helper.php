<?php 

    if(! function_exists('ler_csv')) {
        // Função para processar o arquivo CSV em um array
        function ler_csv($caminhoArquivo) {
            $linhas = [];
            if (($handle = fopen($caminhoArquivo, 'r')) !== FALSE) {
                while (($linha = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $linhas[] = $linha;
                }
                fclose($handle);
            }
            return $linhas;
        }
    }