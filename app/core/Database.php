<?php

class Database {
    private static $instance = null;
    private $conn;

    private $host = 'sql200.infinityfree.com';
    private $dbName = 'epiz_31121671_sup25';
    private $username = 'epiz_31121671';
    private $password = '7XhEahxb5zgcPgN';

    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Greška u konekciji: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance->conn; 
    }
}
