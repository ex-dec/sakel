<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router = require_once __DIR__ . '/routes/web.php';
$router->dispatch($method, $path);
