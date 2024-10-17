<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_gestor = $_POST['nome_gestor'];
    $email_gestor = $_POST['email_gestor'];
    $id_area = $_POST['id_area']; // Obter o ID da área do formulário

    // Inserir gestor com o ID da área
    $sql = 'INSERT INTO gestores (nome, email, id_area) VALUES (?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome_gestor, $email_gestor, $id_area]);

    header('Location: index.php');
}

// Obter lista de áreas
$sql = 'SELECT id, nome_area FROM areas';
$stmt = $pdo->query($sql);
$areas = $stmt->fetchAll(PDO::FETCH_ASSOC);

include '../partials/header.php';
?>
<link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/css/bootstrap.css">
<div class="container mt-4">
    <h2>Adicionar Gestor</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nome do Gestor</label>
            <input type="text" name="nome_gestor" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email do Gestor</label>
            <input type="email" name="email_gestor" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Área Responsável</label>
            <select name="id_area" class="form-control" required>
                <?php foreach ($areas as $area): ?>
                    <option value="<?= $area['id'] ?>"><?= $area['nome_area'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
<?php include '../partials/footer.php'; ?>
