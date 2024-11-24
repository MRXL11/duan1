<h1>Giỏ hàng</h1>
<?php foreach ($products as $product): ?>
<div>
    <h3><?= $product['ten'] ?></h3>
    <p>Giá: <?= number_format($product['gia'], 0, ',', '.') ?> VND</p>
    <p>Số lượng: <?= $product['quantity'] ?></p>
    <a href="?controller=cart&action=remove&id=<?= $product['id'] ?>">Xóa</a>
</div>
<?php endforeach; ?>
