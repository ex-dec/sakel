<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$assetdir = '/../';

$pdo = Database::connect();

if(isset($_GET['mapel_id'])) {
    $mapel_id = $_GET['mapel_id'];
    $kelas_id = $_GET['kelas_id'];
    $materi = $pdo->prepare("SELECT * FROM materi WHERE mapel_id = :mapel_id");
    $materi->bindParam(':mapel_id', $mapel_id, PDO::PARAM_STR);
    $materi->execute();
    $data = $materi->fetchAll(PDO::FETCH_ASSOC);
    $mapel = $pdo->prepare("SELECT * FROM mapel WHERE id = :mapel_id");
    $mapel->bindParam(':mapel_id', $mapel_id, PDO::PARAM_STR);
    $mapel->execute();
    $mapel = $mapel->fetch(PDO::FETCH_ASSOC);
    include_once 'view.php';
    exit;    
} else if (isset($_GET['kelas_id'])) {
    $kelas_id = $_GET['kelas_id'];
    $mapel = $pdo->prepare("SELECT * FROM mapel WHERE kelas_id = :kelas_id");
    $mapel->bindParam(':kelas_id', $kelas_id, PDO::PARAM_STR);
    $mapel->execute();
    $mapel = $mapel->fetchAll(PDO::FETCH_ASSOC);
    include_once 'viewMapel.php';
    exit;
} else {
    $kelas = $pdo->query("SELECT * FROM kelas")->fetchAll(PDO::FETCH_ASSOC);
    include_once 'viewKelas.php';
    exit;
}