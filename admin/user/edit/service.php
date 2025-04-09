<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$userId = $_GET['id'] ?? '';
$name = $_POST['name'] ?? '';
$nis = $_POST['nis'] ?? '';

$pdo = Database::connect();

$stmt = $pdo->prepare("UPDATE users SET name = :name, nis = :nis WHERE id = :id");

$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':nis', $nis, PDO::PARAM_STR);
$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
$stmt->execute();

header('Location: /admin/user');
exit;