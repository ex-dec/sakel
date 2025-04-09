<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$pdo = Database::connect();

$name = $_POST['name'];
$mapel_id = $_POST['mapel_id'];
$description = $_POST['description'] ?? null;
$link = $_POST['link'] ?? null;

$stmt = $pdo->prepare("INSERT INTO materi (name, mapel_id, description, link) VALUES (:name, :mapel_id, :description, :link)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':mapel_id', $mapel_id);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':link', $link);
$stmt->execute();
$stmt->closeCursor();
exit(header('Location: /admin/materi/index.php?mapel_id=' . $mapel_id));