<?php
require_once __DIR__ . '/../config/database.php';

$pdo = Database::connect();

$pdo->exec("CREATE TABLE IF NOT EXISTS kelas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
)");

$pdo->exec("CREATE TABLE IF NOT EXISTS siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    kelas_id INT,
    FOREIGN KEY (kelas_id) REFERENCES kelas(id) ON DELETE CASCADE
)");

$pdo->exec("CREATE TABLE IF NOT EXISTS absensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    siswa_id INT,
    tanggal DATE,
    status ENUM('hadir', 'izin', 'sakit', 'alpa') NOT NULL,
    FOREIGN KEY (siswa_id) REFERENCES siswa(id) ON DELETE CASCADE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");
