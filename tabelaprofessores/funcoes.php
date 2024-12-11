<?php

function lerArquivo($caminhoArquivo){

    $recurso = fopen($caminhoArquivo, 'r');
    
    $json = fread($recurso, filesize($caminhoArquivo));
    
    fclose($recurso);
    
    return json_decode($json);
    
    
    }
    
?>