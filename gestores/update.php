<?php
include '../config/db.php';

$id = $_GET['id'];

// Quando o formulário é enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $id_area = $_POST['id_area'];  // ID da área selecionada no formulário

    // Atualizar o gestor com o ID da área
    $sql = 'UPDATE gestores SET nome = ?, email = ?, id_area = ? WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $id_area, $id]);

    header('Location: index.php');
    exit;
} else {
    // Obter dados do gestor
    $sql = 'SELECT * FROM gestores WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $gestor = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obter lista de áreas
    $sql = 'SELECT id, nome_area FROM areas';
    $stmt = $pdo->query($sql);
    $areas = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

include '../partials/header.php';
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
            <select name="id_area" class="form-control" required>
                <?php foreach ($areas as $area): ?>
                    <option value="<?= $area['id'] ?>" <?= $area['id'] == $gestor['id_area'] ? 'selected' : '' ?>>
                        <?= $area['nome_area'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
</div>

<?php include '../partials/footer.php'; ?>
