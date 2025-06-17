<?php
require_once './includes/auth.php';
require_once './includes/db.php';
include './includes/header.php';

$nome = $email = $telefone = '';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $cli = $stmt->fetch();
    if ($cli) {
        $nome = $cli['nome'];
        $email = $cli['email'];
        $telefone = $cli['telefone'];
    }
}
?>

<h2><?= isset($_GET['id']) ? 'Editar' : 'Novo' ?> Cliente</h2>
<form method="POST" action="cliente_save.php">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?? '' ?>">
    <div class="mb-2">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" required value="<?= $nome ?>">
    </div>
    <div class="mb-2">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" value="<?= $email ?>">
    </div>
    <div class="mb-2">
        <label>Telefone:</label>
        <input type="text" name="telefone" class="form-control" value="<?= $telefone ?>">
    </div>
    <button class="btn btn-success">Salvar</button>
    <a href="clientes.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include './includes/footer.php'; ?>
