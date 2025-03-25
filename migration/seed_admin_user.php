<?php
require_once __DIR__ . '/../config/database.php';

$roleStmt = $pdo->prepare("SELECT id FROM roles WHERE name = ?");
$roleStmt->execute(['admin']);
$role = $roleStmt->fetch();

if (!$role) {
    die("Role 'admin' belum ada. Jalankan RoleSeeder dulu.\n");
}

$role_id = $role['id'];

$nis = '12345678';
$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE nis = ?");
$stmt->execute([$nis]);
$count = $stmt->fetchColumn();

if ($count == 0) {
    $name = 'Admin';
    $password = password_hash('admin123', PASSWORD_DEFAULT);

    $insert = $pdo->prepare("INSERT INTO users (name, nis, password, role_id) VALUES (?, ?, ?, ?)");
    $insert->execute([$name, $nis, $password, $role_id]);

    echo "User admin berhasil dibuat. NIS: $nis, Password: admin123\n";
} else {
    echo "User admin sudah ada, tidak disisipkan ulang.\n";
}
