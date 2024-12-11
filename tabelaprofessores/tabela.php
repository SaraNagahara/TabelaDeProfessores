<?php

$codigo = $_GET['codigo'];
$nome = $_GET['nome'];
$curso = (isset($_GET['curso'])) ? $_GET['curso'] : false;
$status = (isset($_GET['status'])) ? $_GET['status'] : false;

$CodigosGuardados = [];

$pasta = './cadastros';

/*procura codigo por codigo dentro da pasta arquivos*/
if (file_exists($pasta)) {
    $arquivos = array_diff(scandir($pasta), ['.', '..']);
    foreach ($arquivos as $arquivo) {
        $dados = json_decode(file_get_contents("$pasta/$arquivo"));
        $CodigosGuardados[] = $dados->codigo;
    }
}

/*Verifica duplicidade no codigo */
if(in_array($codigo, $CodigosGuardados)){
    exit("Esse código já foi cadastrado!");
}



if(empty($codigo)){
    exit("Preencha com o código!");
}else if(empty($nome)){
    exit("Preencha com o nome!");
}else if(empty($curso)){
    exit("Preencha com o curso!");
}else if(empty($status)){
    exit("Preencha com o status!");
}


$dados = [
    'codigo' => $codigo,
    'nome' => $nome,
    'curso' => $curso,
    'status' => $status
];


$json = json_encode($dados);

$numero = rand(1000, 9999);

if (! file_exists('cadastros')){
    mkdir('cadastros');
}

$recurso = fopen("cadastros/professores{$numero}.json", 'w');

fwrite($recurso, $json);

fclose($recurso);

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profs.css">
    <title>Document</title>
</head>
<body>

<h1>lista de arquivos <?= date('d/m/y') ?></h1>
    <hr>
<?php

$pasta = './cadastros';

$arquivos = opendir($pasta);


?>

    <table>
        <thead>
            <th>
                <td>Código</td>
                <td>Nome</td>
                <td>Curso</td>
                <td>Status</td>
            </th>
        </thead>
        <tbody>
        <?php


include 'funcoes.php';

$html = '';  

while($arquivo = readdir($arquivos)){
if($arquivo != '.' && $arquivo != '..'){

$caminho = './cadastros/' . $arquivo;
$dados=lerArquivo($caminho);

    $html .= " <tr>
    <td>$dados->codigo</td>
    <td>$dados->nome</td>
    <td>$dados->curso</td>
    <td>$dados->status</td>
    <td><a href='ler.php?file=$arquivo'>$arquivo</a></td>
</tr>";
}
}


echo $html;

closedir($arquivos);
?>       


        </tbody>
    </table>

    <p><a href="profs.php">Cadastrar</a></p>

</body>
</html>


