<?php 
class AdminUser {
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM taikhoans";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id)
    {
        $sql = "SELECT taikhoans.*, chucvu.ten_chuc_vu AS ten_chuc_vu
                FROM taikhoans
                LEFT JOIN chucvus ON taikhoans.chuc_vu_id = chucvu.id
                WHERE taikhoans.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllRoles() {
        $sql = "SELECT * FROM chucvu";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM taikhoans WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function updateUserRole($id, $chuc_vu_id) {
        $sql = "UPDATE taikhoans SET chuc_vu_id = :chuc_vu_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':chuc_vu_id', $chuc_vu_id);
        $stmt->execute();
    }
}
