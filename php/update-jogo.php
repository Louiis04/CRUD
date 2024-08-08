<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM jogos WHERE id = ?");

$stmt->execute([$id]);

$jogo = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomejogo = $_POST['nomejogo'];
    $categoria = $_POST['categoria'];
    $dataLancamento = $_POST['dataLancamento'];
    $preco = $_POST['preco'];
    
    $stmt = $pdo->prepare("UPDATE jogos SET nome = ?, categoria = ?, data_lancamento = ?, preco = ? WHERE id = ?");
    
    $stmt->execute([$nomejogo, $categoria, $dataNascimento, $preco, $id]);
    
    header('Location: index-jogo.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogo</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Jogos</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-jogo.php">Listar Jogos</a></li>
                <li><a href="create-jogo.php">Adicionar Jogo</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Jogo</h2>
        <form method="POST">
            <label for="nomejogo">Nome do Jogo:</label>
            <input type="text" id="nomejogo" name="nomejogo" placeholder="God Of War" value="<?= $jogo['nomejogo'] ?>" required>
            
            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" placeholder="Ação" value="<?= $jogo['categoria'] ?>" required>
            
            <label for="dataLancamento">Data de Lançamento:</label>
            <input type="date" id="dataLancamento" name="dataLancamento" value="<?= $jogo['data_lancamento'] ?>" required>
            
            <label for="preco">Preço:</label>
            <<input type="number" id="preco" name="preco" step="0.01" min="0" placeholder="0.00" value="<?= $jogo['preco'] ?>" required>
            
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Jogos</p>
    </footer>
</body>
</html>
