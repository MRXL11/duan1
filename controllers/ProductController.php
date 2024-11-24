<?php
require_once 'models/ProductModel.php';

class ProductController {
    public static function listProducts() {
        $products = ProductModel::getAllProducts();
        require 'views/products/list.php';
    }
}
?>
