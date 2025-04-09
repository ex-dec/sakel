<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';
$assetdir = '../';

if (isAuthenticated()) {
    header('Location: /' . roleCheck());
    exit;
}

include_once 'view.php';
