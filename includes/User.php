<?php
class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createUser($Matric, $Name, $password, $Role) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (Matric, Name, Password, Role) VALUES (?, ?, ?, ?)");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss", $Matric, $Name, $hashed_password, $Role);
        return $stmt->execute();
    }

    public function getUser($Matric) {
        $stmt = $this->conn->prepare("SELECT Matric, Name, Password, Role FROM {$this->table} WHERE Matric = ?");
        $stmt->bind_param("s", $Matric);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getUsers() {
        $query = "SELECT Matric, Name, Role FROM {$this->table}";
        return $this->conn->query($query);
    }

    public function deleteUser($Matric) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE Matric = ?");
        $stmt->bind_param("s", $Matric);
        return $stmt->execute();
    }

    public function updateUser($Matric, $Name, $Role) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET Name = ?, Role = ? WHERE Matric = ?");
        $stmt->bind_param("sss", $Name, $Role, $Matric);
        return $stmt->execute();
    }
}
?>
