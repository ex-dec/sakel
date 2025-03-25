<?php
require_once __DIR__ . '/../config/database.php';

$pdo = Database::connect();

$pdo->exec("CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
)");

$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE SET NULL,
    password VARCHAR(255) NOT NULL,
)");
