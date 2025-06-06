<?php
require_once dirname(__DIR__) . '/core/Database.php';

class User {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance(); // koristimo Singleton pattern
    }

    public function register($username, $password) {
        $sql = "INSERT INTO iv_users (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($sql);
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        return $stmt->execute([
            'username' => $username,
            'password' => $hashed
        ]);
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM iv_users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
