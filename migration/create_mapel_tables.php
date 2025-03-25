<?php
require_once __DIR__ . '/../config/database.php';

$pdo = Database::connect();

$pdo->exec("CREATE TABLE IF NOT EXISTS mapel (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    kelas_id INTEGER NOT NULL,
    FOREIGN KEY (kelas_id) REFERENCES kelas(id) ON DELETE CASCADE
)");
