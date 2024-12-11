<?php

//pegando o arquivo file do loop

$arquivo_recebido = $_GET['file'];

//juntando o file concatenado com a pasta do diretorio testes

$arquivo = './cadastros/' . $arquivo_recebido;

//abrindo o arquivo com a permissao de ler

$recurso = fopen($arquivo, 'r');

//lendo o recurso do seu respectivo tamanho conforme o tamanho do arquivo

$json = fread($recurso, filesize($arquivo));

//fecha o recurso

fclose($recurso);

//desserializacao 

$dados = json_decode($json);

echo 'Nome: '. $dados->codigo . '<br>';
echo 'Codigo: '. $dados->nome . '<br>';
echo 'Curso: '. $dados->curso . '<br>';
echo 'Status: '. $dados->status . '<br>';
