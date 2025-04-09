<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$id = $_GET['id'] ?? '';
$name = $_POST['name'] ?? '';

$pdo = Database::connect();

$stmt = $pdo->prepare("UPDATE kelas SET name = :name WHERE id = :id");
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

header('Location: /admin/kelas');
exit;