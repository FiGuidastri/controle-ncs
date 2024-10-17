<?php
include '../config/db.php';

$id = $_GET['id'];

$sql = 'DELETE FROM gestores WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php')
?>