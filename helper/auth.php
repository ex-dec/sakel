<?php
function isAuthenticated()
{
    session_start();
    return isset($_SESSION['user']);
}

function checkAdmin()
{
    $role = $_SESSION['user']['role_id'];
    if ($role === 1) {
        return true;
    }
    return false;
}

function roleCheck()
{
    if (checkAdmin()) {
        return "admin";
    } else {
        return "siswa";
    }
}

function logout()
{
    session_start();
    session_destroy();
    header('Location: /login');
    exit;
}
