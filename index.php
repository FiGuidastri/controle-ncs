<?php
include './config/db.php';
include './partials/header.php'; 

// Obter notificações com o nome da área
$sql = 'SELECT n.*, a.nome_area 
        FROM notificacoes n
        JOIN areas a ON n.id_area = a.id';
$stmt = $pdo->query($sql);
$notificacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="./css/bootstrap-5.3.3-dist/css/bootstrap.css">
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Inserir Gestor</h5>
                    <p class="card-text">Adicione um novo gestor ao sistema.</p>
                    <a href="gestores/index.php" class="btn btn-primary">Adicionar Gestor</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Inserir Notificação</h5>
                    <p class="card-text">Adicione uma nova notificação ao sistema.</p>
                    <a href="notificacoes/create.php" class="btn btn-success">Adicionar Notificação</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h2>Notificações</h2>
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
                        <a href="update.php?id=<?= $notificacao['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?= $notificacao['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include './partials/footer.php'; ?>
