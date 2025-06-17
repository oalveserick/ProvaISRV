<?php
require_once './includes/auth.php';
require_once './includes/db.php';
include './includes/header.php';

$clientes = $pdo->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Clientes</h2>
<a href="cliente_form.php" class="btn btn-success mb-2">Novo Cliente</a>
<table class="table table-striped">
    <tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>
    <?php foreach ($clientes as $cli): ?>
        <tr>
            <td><?= $cli['id'] ?></td>
            <td><?= $cli['nome'] ?></td>
            <td><?= $cli['email'] ?></td>
            <td><?= $cli['telefone'] ?></td>
            <td>
                <a href="cliente_form.php?id=<?= $cli['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                <a href="cliente_delete.php?id=<?= $cli['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmar exclusão?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include './includes/footer.php'; ?>
