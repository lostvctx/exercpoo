<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="../correcao/style.css">
</head>
<body>
    <h1>Cadastro de Aluno</h1>

    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>Matrícula:</label>
        <input type="text" name="matricula" required><br>

        <label>Curso:</label>
        <input type="text" name="curso" required><br>

        <label>Média Final:</label>
        <input type="number" name="media" step="0.01" required><br>

        <button type="submit">Enviar</button>
    </form>

    <?php
        require_once 'Aluno.php'; // Importa a classe

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $aluno = new Aluno(
                $_POST['nome'],
                $_POST['matricula'],
                $_POST['curso'],
                $_POST['media']
            );

            $aluno->mostrarInformacao();
        }
    ?>
</body>
</html>
