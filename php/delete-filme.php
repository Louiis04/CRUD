<?php
require_once 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM filmes WHERE id = ?");
$stmt->execute([$id]);
header('Location: index-filmes.php');
?>
