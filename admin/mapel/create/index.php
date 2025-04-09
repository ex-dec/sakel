<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

$assetdir = '/../../';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$kelas_id = $_GET['kelas_id'] ?? null;
$pdo = Database::connect();
$kelas = $pdo->prepare("SELECT name FROM kelas WHERE id = :kelas_id");
$kelas->bindParam(':kelas_id', $kelas_id, PDO::PARAM_STR);
$kelas->execute();
$kelas = $kelas->fetch(PDO::FETCH_ASSOC);
include_once 'view.php';