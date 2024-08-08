<?php

$host = 'localhost:3307'; 
$db = 'sistema_jogo';     
$user = 'root';           
$pass = 'root';           


try {
    
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
} catch (PDOException $e) {
    
    echo 'Erro: ' . $e->getMessage();
}
?>
