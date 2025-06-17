<?php
require_once './includes/db.php';
require_once './includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$user, $pass]);

    if ($stmt->fetch()) {
        $_SESSION['logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Aval e Ação</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="min-width: 300px;">
        <h4 class="mb-3 text-center">Login</h4>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <input class="form-control mb-2" type="text" name="username" placeholder="Usuário" required>
            <input class="form-control mb-3" type="password" name="password" placeholder="Senha" required>
            <button class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</body>
</html>
