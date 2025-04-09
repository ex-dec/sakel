<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
$assetdir = '/../';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$pdo = Database::connect();
$data = $pdo->query("SELECT * FROM kelas")->fetchAll(PDO::FETCH_ASSOC);

include_once 'view.php';
