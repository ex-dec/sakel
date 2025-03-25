<?php
class Database
{
    public static function connect()
    {
        require_once __DIR__ . '/../helper/env.php';
        loadEnv(__DIR__ . '/../.env');

        $host    = $_ENV['DB_HOST'] ?? 'localhost';
        $db      = $_ENV['DB_NAME'] ?? 'database';
        $user    = $_ENV['DB_USER'] ?? 'root';
        $pass    = $_ENV['DB_PASS'] ?? '';
        $charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO($dsn, $user, $pass, $options);
    }
}
