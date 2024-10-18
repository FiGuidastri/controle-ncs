<?php
include '../config/db.php';


// Obter notificações com o nome da área
$sql = 'SELECT n.*, a.nome_area 
        FROM notificacoes n
        JOIN areas a ON n.id_area = a.id';
$stmt = $pdo->query($sql);
$notificacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

include '../partials/header.php';
?>

<link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/css/bootstrap.css">
<div class="container mt-4">
    <h2>Notificações</h2>
    <a href="create.php" class="btn btn-primary mb-3">Adicionar Notificação</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Área Responsável</th>
                <th>Data de Recebimento</th>
                <th>Prazo (dias)</th>
                <th>Data Final</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notificacoes as $notificacao): ?>
                <tr>
                    <td><?= $notificacao['id'] ?></td>
                    <td><?= $notificacao['numero_notificacao'] ?></td>
                    <td><?= $notificacao['nome_area'] ?></td> <!-- Mudado de area_responsavel para nome_area -->
                    <td><?= $notificacao['data_recebimento'] ?></td>
                    <td><?= $notificacao['prazo'] ?></td>
                    <td><?= $notificacao['data_final'] ?></td>
                    <td><?= $notificacao['descricao'] ?></td>
                    <td>
                        <a href="./update.php?id=<?= $notificacao['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="./delete.php?id=<?= $notificacao['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include '../partials/footer.php'; ?>
