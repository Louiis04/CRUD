<?php
require_once 'db.php';

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM jogos WHERE nomejogo LIKE :searchTerm";
$stmt = $pdo->prepare($sql);
$stmt->execute(['searchTerm' => "%$searchTerm%"]);
$jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Jogos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <h2>Lista de Jogos</h2>
        <div class="search-container">
            <form method="GET">
                <input type="text" name="search" placeholder="Buscar por nome do jogo" value="<?= htmlspecialchars($searchTerm) ?>">
                <button type="submit"><i class="fas fa-search"></i> Buscar</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Jogo</th>
                    <th>Categoria</th>
                    <th>Data de Lançamento</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($jogos)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">Nenhum jogo encontrado.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($jogos as $jogo): ?>
                        <tr>
                            <td><?= $jogo['id'] ?></td>
                            <td><?= $jogo['nomejogo'] ?></td>
                            <td><?= $jogo['categoria'] ?></td>
                            <td><?= $jogo['data_lancamento'] ?></td>
                            <td><?= $jogo['preco'] ?></td>
                            <td>
                                <a href="read-jogo.php?id=<?= $jogo['id'] ?>" title="Visualizar"><i class="fas fa-eye"></i></a>
                                <a href="update-jogo.php?id=<?= $jogo['id'] ?>" title="Editar"><i class="fas fa-edit"></i></a>
                                <a href="delete-jogo.php?id=<?= $jogo['id'] ?>" title="Excluir"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Jogos</p>
    </footer>
</body>
</html>
