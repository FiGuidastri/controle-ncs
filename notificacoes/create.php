<?php
include '../config/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero_notificacao = $_POST['numero_notificacao'];
    $id_area = $_POST['id_area'];
    $data_recebimento = $_POST['data_recebimento'];
    $prazo = $_POST['prazo'];
    $descricao = $_POST['descricao'];

    // Calcular a data final
    $data_final = date('Y-m-d', strtotime($data_recebimento . " + $prazo days"));

    // Inserir notificação com o ID da área
    $sql = 'INSERT INTO notificacoes (numero_notificacao, id_area, data_recebimento, prazo, data_final, descricao) 
            VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$numero_notificacao, $id_area, $data_recebimento, $prazo, $data_final, $descricao]);

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
    <h2>Adicionar Notificação</h2>
    <form method="POST">
        <div class="form-group">
            <label>Número da Notificação</label>
            <input type="text" name="numero_notificacao" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Área Responsável</label>
                <select name="id_area" class="form-control" required>
                    <?php foreach ($areas as $area): ?>
                        <option value="<?= $area['id'] ?>"><?= $area['nome_area'] ?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="form-group">
            <label>Data de Recebimento</label>
            <input type="date" name="data_recebimento" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Prazo (dias)</label>
            <input type="number" name="prazo" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control" required></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Salvar</button>
        <button href="./index.php" class="btn btn-secondary ml-2">Voltar</button>
    </form>
</div>
<?php include '../partials/footer.php'; ?>
