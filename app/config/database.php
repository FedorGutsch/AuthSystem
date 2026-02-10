<?php
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?? 'db';
        $dbname = $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?? 'auth_lab';
        $username = $_ENV['DB_USER'] ?? getenv('DB_USER') ?? 'lab_user';
        $password = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD') ?? 'lab_password_456';
        $port = $_ENV['DB_PORT'] ?? getenv('DB_PORT') ?? '5432';

        try {
            $this->connection = new PDO(
                "pgsql:host=$host;port=$port;dbname=$dbname",
                $username,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            throw new Exception("Ошибка подключения к БД: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->connection;
    }
}