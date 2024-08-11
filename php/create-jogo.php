<?php

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomejogo = $_POST['nomejogo'];
    $categoria = $_POST['categoria'];
    $data_lancamento = $_POST['data_lancamento'];
    $preco = $_POST['preco'];

    $stmt = $pdo->prepare("INSERT INTO jogos (nomejogo, categoria, data_lancamento, preco) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nomejogo, $categoria, $data_lancamento, $preco]);

    header('Location: index-jogo.php');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Jogo</title>
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
        <h2>Adicionar Jogo</h2>
     
        <form id="jogoForm" method="POST" action="">
            <label for="nomejogo">Nome do Jogo:</label>
            <input type="text" id="nomejogo" name="nomejogo" placeholder="Ex: Minecraft" required>
            <small id="nomeError" class="error"></small>
            
            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" placeholder="Ex: Ação" required>
            <small id="categoriaError" class="error"></small>
            
            <label for="data_lancamento">Data de Lançamento:</label>
            <input type="date" id="data_lancamento" name="data_lancamento" required>
            <small id="erroData" class="error"></small>
            
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" min="0" placeholder="0.00" required>
            <small id="precoError" class="error"></small>
            
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Jogos</p>
    </footer>

    <script>
        document.getElementById('jogoForm').addEventListener('submit', function(event) {
            let nomejogo = document.getElementById('nomejogo').value.trim();
            let categoria = document.getElementById('categoria').value.trim();
            let preco = document.getElementById('preco').value.trim();
            let dataLancamento = new Date(document.getElementById('dataLancamento').value);
            let dataMinima = new Date('1940-01-01');

            let hasError = false;

            document.querySelectorAll('.error').forEach(error => error.textContent = '');

            if (nomejogo.length < 3) {
                document.getElementById('nomeError').textContent = 'O nome deve ter pelo menos 3 caracteres.';
                hasError = true;
            }

            if (categoria.length === 0) {
                document.getElementById('categoriaError').textContent = 'A categoria é obrigatória.';
                hasError = true;
            }

            if (preco.length > 0 && !/^\d+(\.\d{1,2})?$/.test(preco)) {
                document.getElementById('precoError').textContent = 'Por favor, insira um preço válido.';
                hasError = true;
            }
            if (dataLancamento < dataMinima) {
            document.getElementById('erroData').textContent = 'A data deve ser entre 01/01/1940 e 01/01/1950.';
            hasError = true;
        } else {
            document.getElementById('erroData').textContent = '';
        }

            if (hasError) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
