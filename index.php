<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helper/auth.php';

if (isAuthenticated()) {
    header('Location: /' . roleCheck());
    exit;
} else {
    header('Location: /login');
    exit;
}
