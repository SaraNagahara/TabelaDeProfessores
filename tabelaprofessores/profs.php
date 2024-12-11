<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profs.css">
    <title>cadastros professores</title>
</head>
<body>
    <form action="tabela.php" method="get">
        <label for="codigo">Código: 
            <input type="number" name="codigo" id="codigo">
        </label>
        <label for="nome">Nome:
            <input type="text" name="nome" id="nome">
        </label>
        <label for="curso">Curso:
            <input type="radio" name="curso" id="curso1" value="SistemasInternet">Sistemas para internet
            <input type="radio" name="curso" id="curso2" value="Turismo">Turismo
            <input type="radio" name="curso" id="curso3" value="GestaoComercial">Gestão Comercial
        </label>
        <label for="ativo">Status:
            <input type="radio" name="status" id="status1" value="Ativo">Ativo
            <input type="radio" name="status" id="status2" value="Inativo">Inativo
        </label>
        <input type="submit" value="gravar">
    </form>

<script src="profs.js"></script>    
</body>
</html>