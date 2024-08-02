<?php
require_once 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM filmes WHERE id = ?");
$stmt->execute([$id]);
$filme = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $stmt = $pdo->prepare("UPDATE filmes SET nome = ?, ano = ?, categoria = ?, descricao = ? WHERE id = ?");
    $stmt->execute([$nome, $ano, $categoria, $descricao, $id]);
    header('Location: read-filme.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Filmes</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="read-filme.php">Listar Filmes</a></li>
                <li><a href="create-filme.php">Adicionar Filme</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Filme</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $filme['nome'] ?>" required>
            <label for="ano">Ano:</label>
            <input type="date" id="ano" name="ano" value="<?= $filme['ano'] ?>" required>
            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" value="<?= $filme['categoria'] ?>" required>
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" value="<?= $filme['descricao'] ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Filmes</p>
    </footer>
</body>
</html>
