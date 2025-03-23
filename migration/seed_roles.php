<?php
require_once __DIR__ . '/../config/database.php';

$role = 'admin';

$stmt = $pdo->prepare("SELECT COUNT(*) FROM role WHERE nama_role = ?");
$stmt->execute([$role]);
$count = $stmt->fetchColumn();

if ($count == 0) {
    $insert = $pdo->prepare("INSERT INTO role (nama_role) VALUES (?)");
    $insert->execute([$role]);
    echo "Inserted role: $role\n";
} else {
    echo "Role '$role' already exists, skipped.\n";
}
