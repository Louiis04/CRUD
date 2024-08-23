<?php
    require_once 'db.php';
    require_once 'authenticate.php';

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM jogos WHERE id = ?");
    $stmt->execute([$id]);

    $jogo = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Jogo</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Jogos</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-jogo.php">Listar Jogos</a></li>
                <li><a href="create-jogo.php">Adicionar Jogos</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Detalhes do Jogo</h2>
        <?php if ($jogo): ?>
            <p><strong>ID:</strong> <?= $jogo['id'] ?></p>
            <p><strong>Nome do Jogo:</strong> <?= $jogo['nomejogo'] ?></p>
            <p><strong>Categoria:</strong> <?= $jogo['categoria'] ?></p>
            <p><strong>Data de Lançamento:</strong> <?= $jogo['data_lancamento'] ?></p>
            <p><strong>Preço:</strong> <?= $jogo['preco'] ?></p>
            <p>
                <a href="update-jogo.php?id=<?= $jogo['id'] ?>">Editar</a>
                <a href="delete-jogo.php?id=<?= $jogo['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Jogo não encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Jogos</p>
    </footer>
</body>
</html>
