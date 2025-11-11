<?php 
require_once "Aluno.php"
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleV.css">
    <title>Aluno</title>
</head>
<body>
    <h1>Alunos</h1>
    <form action="" method="POST">
 
    <label for="nome">Nome: </label>
    <input type="text" id="nome" name="nome" required>
    <br>
    <label for="cidade">Cidade: </label>
    <input type="text" id="cidade" name="cidade"  required>
    <br>
    <label for="bairro">Bairro: </label>
    <input type="text" id="bairro" name="bairro" required>
    <br>
    <label for="curso">Curso: </label>
    <select name="curso" id="curso" required>
        <option value="">selecione...</option>
        <option value="informatica">informatica</option>
        <option value="desenvolvedor de sistema">desenvolvedor de sistemas</option>
        <option value="front-end">front-end</option>
        <option value="back-end">back-end</option>
    </select>
    <input type="submit" value="cadastrar">
    <br>

 
    </form>
   <?php 
   if($_SERVER["REQUEST_METHOD"]=="POST") {
    $nome=$_POST["nome"];
    $cidade=$_POST["cidade"];
    $bairro=$_POST["bairro"];
    $curso=$_POST["curso"];


    $aluno = new Aluno($nome, $cidade,$bairro,$curso);
    echo"<br>";
    $aluno->exibirInformacoes();
   }

 
   ?>
</body>
</html>