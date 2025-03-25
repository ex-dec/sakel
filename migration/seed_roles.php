<?php
require_once __DIR__ . '/../config/database.php';

$roles = ['admin', 'user'];

foreach ($roles as $role) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM roles WHERE name = ?");
    $stmt->execute([$role]);
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        $insert = $pdo->prepare("INSERT INTO roles (name) VALUES (?)");
        $insert->execute([$role]);
        echo "Inserted role: $role\n";
    } else {
        echo "Role '$role' already exists, skipped.\n";
    }
}
