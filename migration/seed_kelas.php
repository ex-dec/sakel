<?php
require_once __DIR__ . '/../config/database.php';

$pdo = Database::connect();

$kelas = ['Kelas X', 'Kelas XI', 'Kelas XII'];

foreach ($kelas as $kelas) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM kelas WHERE name = ?");
    $stmt->execute([$kelas]);
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        $insert = $pdo->prepare("INSERT INTO kelas (name) VALUES (?)");
        $insert->execute([$kelas]);
        echo "Inserted kelas: $kelas\n";
    } else {
        echo "Kelas '$kelas' already exists, skipped.\n";
    }
}
