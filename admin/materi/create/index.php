<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

if (!isAuthenticated()) {
    header('Location: /login');
    exit;
}

$assetdir = '/../../';
$mapel_id = $_GET['mapel_id'];

include_once 'view.php';
