<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM filmes");
$filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de filmes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Filmes</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="read-filme.php">Listar filmes</a></li>
                <li><a href="create-filme.php">Adicionar filme</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Filmes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ano</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filmes as $filme): ?>
                    <tr>
                        <td><?= $filme['id'] ?></td>
                        <td><?= $filme['nome'] ?></td>
                        <td><?= $filme['ano'] ?></td>
                        <td><?= $filme['categoria'] ?></td>
                        <td><?= $filme['descricao'] ?></td>
                        <td>
                            <a href="update-filme.php?id=<?= $filme['id'] ?>">Editar</a>
                            <a href="delete-filme.php?id=<?= $filme['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Filmes</p>
    </footer>
</body>
</html>
