<?php
require_once 'carro.php';
require_once 'moto.php';
require_once 'cliente.php';

session_start();

// Inicializa os veículos apenas uma vez
if (!isset($_SESSION['veiculos'])) {
    $_SESSION['veiculos'] = [
        new carro("Toyota", "Eclipse GS-T", 200, 4),
        new carro("BMW", "M3 Evolution Coupé", 280, 4),
        new carro("Honda", "Civic EJ1 Coupé", 150, 4),
        new carro("Porsche", "911 RWB", 400, 4),
        new carro("Mazda", "RX-7 FD RS", 250, 4),
        new moto("Kawasaki", "Vulcan S", 350, 650),
        new moto("Shineray", "Denver", 300, 250),
        new moto("Harley Davidson", "Fat Bob", 250, 1868)
    ];
}

$veiculos = &$_SESSION['veiculos'];

// Cadastro do cliente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['cpf'])) {
    $_SESSION['cliente'] = new cliente($_POST['nome'], $_POST['cpf']);
}

// Ações de alugar/devolver
if (isset($_GET['acao']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if ($_GET['acao'] === 'alugar') {
        $veiculos[$id]->alugar();
    } elseif ($_GET['acao'] === 'devolver') {
        $veiculos[$id]->devolver();
    }
}

$cliente = $_SESSION['cliente'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora de Veículos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Locadora de Veículos</h1>

    <?php if (!$cliente): ?>
        <div class="form-container">
            <h2>Cadastro de Cliente</h2>
            <form action="" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required>

                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" required maxlength="11">

                <button type="submit">Cadastrar</button>
            </form>
        </div>

    <?php else: ?>
        <p><strong>Cliente:</strong> <?= $cliente->getNome(); ?> (CPF: <?= $cliente->getCpf(); ?>)</p>

        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Imagem</th>
                    <th>Descrição</th>
                    <th>Preço Diária</th>
                    <th>Status</th>
                    <th>Exemplo (3 dias)</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($veiculos as $id => $v): ?>
                    <tr>
                        <td><?= ($v instanceof carro) ? "Carro" : "Moto"; ?></td>
                        <td>
                            <img src="imagens/<?= strtolower($v instanceof carro ? 'carro' : 'moto') . $id; ?>.jpg" 
                                 alt="<?= $v->getDescricao(); ?>" 
                                 class="veiculo-imagem">
                        </td>
                        <td><?= $v->getDescricao(); ?></td>
                        <td>R$ <?= number_format($v->getPrecoDiaria(), 2, ',', '.'); ?></td>
                        <td class="<?= $v->isDisponivel() ? 'disp' : 'indisp'; ?>">
                            <?= $v->isDisponivel() ? "Disponível" : "Alugado"; ?>
                        </td>
                        <td>R$ <?= number_format($v->calcularCusto(3), 2, ',', '.'); ?></td>
                        <td>
                            <?php if ($v->isDisponivel()): ?>
                                <a href="?acao=alugar&id=<?= $id; ?>" class="btn-alugar">Alugar</a>
                            <?php else: ?>
                                <a href="?acao=devolver&id=<?= $id; ?>" class="btn-devolver">Devolver</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
