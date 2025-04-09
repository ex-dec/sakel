<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$name = $_POST['name'] ?? '';
$nis = $_POST['nis'] ?? '';
$password = $_POST['password'] ?? '';

$password = password_hash($password, PASSWORD_DEFAULT);

$pdo = Database::connect();

if ($nis === $pdo->query("SELECT * FROM users WHERE nis = '$nis'")->fetchColumn()) {
    $error = "NIS sudah terdaftar!";
    header('Location: /admin/user/create?error=' . urlencode($error));
    exit;
}

$role = $pdo->query("SELECT * FROM roles WHERE name = 'user'")->fetchColumn();

$stmt = $pdo->prepare("INSERT INTO users (name, nis, password, role_id) VALUES ('$name', '$nis', '$password', '$role')");
$stmt->execute();

header('Location: /admin/user');
exit;
