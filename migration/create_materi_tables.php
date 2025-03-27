<?php
require_once __DIR__ . '/../config/database.php';

$pdo = Database::connect();

$pdo->exec("CREATE TABLE IF NOT EXISTS materi (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    link VARCHAR(255),
    mapel_id INTEGER NOT NULL,
    FOREIGN KEY (mapel_id) REFERENCES mapel(id) ON DELETE CASCADE
)");
