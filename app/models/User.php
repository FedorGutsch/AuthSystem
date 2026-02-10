<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $db;

    public function __construct() {
        $host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?? 'db';
        $dbname = $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?? 'auth_lab';
        $username = $_ENV['DB_USER'] ?? getenv('DB_USER') ?? 'lab_user';
        $password = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD') ?? 'lab_password_456';
        $port = $_ENV['DB_PORT'] ?? getenv('DB_PORT') ?? '5432';

        try {
            $this->db = new PDO(
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

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO users 
            (firstname, lastname, email, login, password_hash, gender, age_verified, theme) 
            VALUES (:firstname, :lastname, :email, :login, :password_hash, :gender, :age_verified, :theme)
            RETURNING id
        ");
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function findByLogin($login) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE login = :login");
        $stmt->execute(['login' => $login]);
        return $stmt->fetch();
    }

    public function updateTheme($userId, $theme) {
        $stmt = $this->db->prepare("UPDATE users SET theme = :theme WHERE id = :id");
        $stmt->execute(['theme' => $theme, 'id' => $userId]);
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}