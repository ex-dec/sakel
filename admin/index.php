<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
$assetdir = '../';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
$pdo = Database::connect();

$siswa = $pdo->query('SELECT COUNT(*) FROM users WHERE role_id = 2')->fetchColumn();
$kelas = $pdo->query('SELECT COUNT(*) FROM kelas')->fetchColumn();
$mapel = $pdo->query('SELECT COUNT(*) FROM mapel')->fetchColumn();
$tugas = $pdo->query('SELECT COUNT(*) FROM tugas')->fetchColumn();

include_once 'view.php';
