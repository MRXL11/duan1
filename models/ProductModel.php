<?php
require_once 'commons/function.php';

class ProductModel {
    public static function getAllProducts() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM sanphams WHERE trang_thai = 1");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProductById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM sanphams WHERE id = ? AND trang_thai = 1");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateStock($id, $quantity) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE sanphams SET so_luong = so_luong - ? WHERE id = ?");
        return $stmt->execute([$quantity, $id]);
    }
}
?>
