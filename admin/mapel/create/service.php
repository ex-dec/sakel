<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$pdo = Database::connect();
$name = $_POST['name'] ?? null;
$kelas_id = $_POST['kelas_id'] ?? null;

$stmt = $pdo->prepare("INSERT INTO mapel (name, kelas_id) VALUES (:name, :kelas_id)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':kelas_id', $kelas_id);
$stmt->execute();
$stmt->closeCursor();

exit(header('Location: /admin/mapel?kelas_id=' . $kelas_id));