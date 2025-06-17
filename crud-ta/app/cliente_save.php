<?php
require_once './includes/auth.php';
require_once './includes/db.php';

$id = $_POST['id'] ?? null;
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

if ($id) {
    $stmt = $pdo->prepare("UPDATE clientes SET nome=?, email=?, telefone=? WHERE id=?");
    $stmt->execute([$nome, $email, $telefone, $id]);
} else {
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $telefone]);
}

header('Location: clientes.php');
exit;
