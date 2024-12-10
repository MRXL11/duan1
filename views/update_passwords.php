<?php
require_once './commons/env.php';
require_once './commons/function.php';

$conn = connectDB();
$stmt = $conn->prepare("SELECT id, mat_khau FROM taikhoans");
$stmt->execute();

$users = $stmt->fetchAll();
foreach ($users as $user) {
    $hashedPassword = password_hash($user['mat_khau'], PASSWORD_BCRYPT);
    $updateStmt = $conn->prepare("UPDATE taikhoans SET mat_khau = :hashedPassword WHERE id = :id");
    $updateStmt->execute([
        ':hashedPassword' => $hashedPassword,
        ':id' => $user['id']
    ]);
}
// echo "Đã mã hóa xong mật khẩu!";