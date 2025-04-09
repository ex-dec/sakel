<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$id = $_POST['id'] ?? '';

$pdo = Database::connect();

$stmt = $pdo->prepare("DELETE FROM mapel WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

header('Location: /admin/mapel');
exit;