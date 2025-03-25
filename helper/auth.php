<?php
function isAuthenticated()
{
    session_start();
    return isset($_SESSION['user']);
}
