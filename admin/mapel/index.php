<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$assetdir = '/../';

$pdo = Database::connect();

if (isset($_GET['kelas_id'])) {
    $kelas_id = $_GET['kelas_id'];
    $mapel = $pdo->prepare("SELECT * FROM mapel WHERE kelas_id = :kelas_id");
    $mapel->bindParam(':kelas_id', $kelas_id, PDO::PARAM_STR);
    $mapel->execute();
    $data = $mapel->fetchAll(PDO::FETCH_ASSOC);
    $kelas = $pdo->prepare("SELECT name FROM kelas WHERE id = :kelas_id");
    $kelas->bindParam(':kelas_id', $kelas_id, PDO::PARAM_STR);
    $kelas->execute();
    $kelas = $kelas->fetch(PDO::FETCH_ASSOC);
    include_once 'view.php';
    exit;
} else {
    $kelas = $pdo->query("SELECT * FROM kelas")->fetchAll(PDO::FETCH_ASSOC);
    include_once 'viewKelas.php';
    exit;
}