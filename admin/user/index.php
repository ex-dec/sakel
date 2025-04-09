<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
$assetdir = '/../../';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
$pdo = Database::connect();
$data = $pdo->query('SELECT users.id, users.nis, users.name, roles.name as role_name FROM users JOIN roles ON users.role_id = roles.id WHERE roles.name = "user"')->fetchAll();

include_once 'view.php';
