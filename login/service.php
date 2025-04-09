<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

if (isAuthenticated()) {
    header('Location: /admin');
    exit;
}

$nis = $_POST['nis'] ?? '';
$password = $_POST['password'] ?? '';

$pdo = Database::connect();
$user = $pdo->query("SELECT * FROM users WHERE nis = '$nis'")->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    $role = $pdo->query("SELECT * FROM roles WHERE id = " . $user['role_id'])->fetch();
    if ($role['name'] === 'admin') {
        header('Location: /admin');
        exit;
    }
    header('Location: /siswa');
    exit;
} else {
    $error = "Username atau password salah!";
    header('Location: /login?error=' . urlencode($error));
    exit;
}
