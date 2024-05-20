<?php
class Database {
    private $host = "localhost";
    private $port = "3306"; // Puerto de MySQL en MAMP
    private $db_name = "renta-coches"; // Cambié 'renta_coches' por 'renta-coches'
    private $username = "root";
    private $password = "root"; // La contraseña predeterminada para MAMP
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
