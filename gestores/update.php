<?php
include '../config/db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $area = $_POST['area'];

    $sql = 'UPDATE gestores SET nome = ?, email = ?, area = ? WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $area, $id]);

    header('Location: index.php');
} else {
    $sql = 'SELECT * FROM gestores WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $gestor = $stmt->fetch(PDO::FETCH_ASSOC);
}

include '../partials/header.php'
?>
<div class="container mt-4">
    <h2>Editar Gestor</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="<?= $gestor['nome'] ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $gestor['email'] ?>" required>
        </div>
        <div class="form-group">
            <label>Área</label>
            <input type="text" name="area" class="form-control" value="<?= $gestor['area'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
</div>
<?php include '../partials/footer.php'; ?>