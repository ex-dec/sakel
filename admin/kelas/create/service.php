<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$name = $_POST['name'] ?? '';

$pdo = Database::connect();
$stmt = $pdo->prepare("INSERT INTO kelas (name) VALUES (:name)");
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->execute();
header('Location: /admin/kelas');
exit;