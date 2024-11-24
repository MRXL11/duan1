<h1>Danh sách sản phẩm</h1>
<?php foreach ($products as $product): ?>
<div>
    <h3><?= $product['ten'] ?></h3>
    <p>Giá: <?= number_format($product['gia'], 0, ',', '.') ?> VND</p>
    <form method="POST" action="?controller=cart&action=add">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <input type="number" name="quantity" value="1" min="1" max="<?= $product['so_luong'] ?>">
        <button type="submit">Thêm vào giỏ</button>
    </form>
</div>
<?php endforeach; ?>
