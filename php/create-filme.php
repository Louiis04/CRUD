<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $stmt = $pdo->prepare("INSERT INTO filmes (nome, ano, categoria, descricao) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $ano, $categoria, $descricao]);
    header('Location: read-filme.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar filme</title>
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
        <h2>Adicionar Aluno</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="ano">Ano:</label>
            <input type="date" id="ano" name="ano" required>
            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" required>
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Filmes</p>
    </footer>
</body>
</html>
