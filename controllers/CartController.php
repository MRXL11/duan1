<?php
session_start();
require_once 'models/CartModel.php';
require_once 'models/ProductModel.php';

class CartController {
    public static function add() {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        $product = ProductModel::getProductById($product_id);
        if (!$product) {
            die("Sản phẩm không tồn tại.");
        }

        if ($quantity > $product['so_luong']) {
            die("Số lượng không đủ trong kho.");
        }

        $_SESSION['cart'] = CartModel::addToCart($_SESSION['cart'] ?? [], $product_id, $quantity);
        header("Location: ?controller=cart&action=view");
    }

    public static function view() {
        $cart = $_SESSION['cart'] ?? [];
        $products = [];

        foreach ($cart as $product_id => $quantity) {
            $product = ProductModel::getProductById($product_id);
            $product['quantity'] = $quantity;
            $products[] = $product;
        }

        require 'views/cart/view.php';
    }

    public static function remove() {
        $product_id = $_GET['id'];
        $_SESSION['cart'] = CartModel::removeFromCart($_SESSION['cart'], $product_id);
        header("Location: ?controller=cart&action=view");
    }
}
?>
