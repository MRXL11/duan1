<?php 
class HomeController{
    public $modelCategory;
    public $modelBook;
    
    public function __construct(){
        $this->modelBook = new Book();
        $this->modelCategory = new Category();
    }

    public function home(){
        // echo "Danh sách";
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
        $listCategory= $this->modelCategory->getAllCategory();
        $top3Books = $this->modelBook->getTop3HighestPrice();
        // Lấy danh sách sách tùy thuộc vào kết quả tìm kiếm
        if ($search) {
            $listBook = $this->modelBook->searchBooks($search);
        } else {
            // Nếu có category_id, lấy sách theo danh mục, nếu không thì lấy tất cả sách
            if ($category_id) {
                $listBook = $this->modelBook->getBooksByCategory($category_id);
            } else {
                $listBook = $this->modelBook->getAllBook();
            }
        }

        require_once './views/home.php';


}
}