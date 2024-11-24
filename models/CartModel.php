<?php
class CartModel {
    public static function addToCart($cart, $product_id, $quantity) {
        if (isset($cart[$product_id])) {
            $cart[$product_id] += $quantity;
        } else {
            $cart[$product_id] = $quantity;
        }
        return $cart;
    }

    public static function removeFromCart($cart, $product_id) {
        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
        }
        return $cart;
    }

    public static function updateCart($cart, $product_id, $quantity) {
        if ($quantity > 0) {
            $cart[$product_id] = $quantity;
        } else {
            unset($cart[$product_id]);
        }
        return $cart;
    }
}
?>
