<?php
require_once './includes/auth.php';
require_once './includes/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM clientes WHERE id=?");
$stmt->execute([$id]);

header('Location: clientes.php');
exit;
