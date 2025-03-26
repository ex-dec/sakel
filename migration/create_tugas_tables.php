<?php
require_once __DIR__ . '/../config/database.php';

$pdo = Database::connect();

$pdo->exec("CREATE TABLE IF NOT EXISTS tugas (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL, 
    description TEXT NOT NULL,
    lampiran VARCHAR(255) NOT NULL,
    mapel_id INTEGER NOT NULL,
    FOREIGN KEY (mapel_id) REFERENCES mapel(id) ON DELETE CASCADE
)");

