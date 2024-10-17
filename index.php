<?php
include './partials/header.php'; 
?>

<link rel="stylesheet" href="./css/bootstrap-5.3.3-dist/css/bootstrap.css">
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Inserir Gestor</h5>
                    <p class="card-text">Adicione um novo gestor ao sistema.</p>
                    <a href="gestores/create.php" class="btn btn-primary">Adicionar Gestor</a>
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

<?php include './partials/footer.php'; ?>
