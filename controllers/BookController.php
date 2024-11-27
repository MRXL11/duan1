<?php

require_once './models/Book.php';
require_once './models/Category.php'; // Đảm bảo rằng bạn đã include model Category

class BookController {
    // Hiển thị trang chi tiết sản phẩm
    public function bookDetail() {
        // Lấy id sản phẩm từ URL
        $bookId = $_GET['id'] ?? null;

        if ($bookId) {
            // Tạo đối tượng Book để gọi hàm lấy thông tin sách
            $bookModel = new Book();
            $book = $bookModel->getBookById($bookId); 
            
            if ($book) {
                // Tạo đối tượng Category để gọi hàm lấy danh mục
                $categoryModel = new Category();
                $listCategory = $categoryModel->getAllCategory();  // Lấy tất cả các danh mục

                // Nếu tìm thấy sách, hiển thị trang chi tiết sản phẩm và truyền $book và $listCategory vào view
                include './views/bookDetail.php'; // Giả sử bạn có một file view tên là bookDetail.php
            } else {
                // Nếu không tìm thấy sách
                echo "Sản phẩm không tồn tại!";
            }
        } else {
            // Nếu không có id trong URL
            echo "Không có sản phẩm được chọn!";
        }
    }
}
