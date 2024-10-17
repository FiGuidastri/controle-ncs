<?php
include '../config/db.php';

// Selecionar gestores e suas áreas
$sql = 'SELECT g.id, g.nome, g.email, a.nome_area AS area FROM gestores g 
        LEFT JOIN areas a ON g.id_area = a.id';
$stmt = $pdo->query($sql);
$gestores = $stmt->fetchAll(PDO::FETCH_ASSOC);

include '../partials/header.php';
?>
<link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/css/bootstrap.css">
<div class="container mt-4">
    <h2>Gestores</h2>
    <a href="create.php" class="btn btn-primary mb-3">Adicionar Gestor</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Área</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gestores as $gestor): ?>
                <tr>
                    <td><?= $gestor['id'] ?></td>
                    <td><?= $gestor['nome'] ?></td>
                    <td><?= $gestor['email'] ?></td>
                    <td><?= $gestor['area'] ?? 'N/A' ?></td> <!-- Se área for null, exibir 'N/A' -->
                    <td>
                        <a href="update.php?id=<?= $gestor['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?= $gestor['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn btn-secondary ml-2">Voltar</a>
</div>
<?php include '../partials/footer.php'; ?>
