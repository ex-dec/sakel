<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';

$assetdir = '/../../';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$id = $_GET['id'] ?? '';

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

$pdo = Database::connect();
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
include_once 'view.php';