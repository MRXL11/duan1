<?php 
<<<<<<< HEAD
require_once PATH_ROOT . 'models/Sach.php';

=======
>>>>>>> 74c038dc22b6e174e5f2e93d170f52b4e17f6751
class HomeController{

    public $modelSach;
    
    public function __construct(){
        $this->modelSach = new Sach();
    }

    public function home(){
        echo "Welcome to the home page!";
    }
    public function trangChu(){
        echo "Trang chủ";
    }
    public function danhSachSach(){
        // echo "Danh sách";
        $listBook= $this->modelSach->getAllBook();
        // var_dump($listBook);die;
        require_once './views/listBook.php';
    }
<<<<<<< HEAD
    public function index() {
        header("Location: " . BASE_URL . "index.php?controller=home&action=home");
        exit;
    }
    
    
=======
>>>>>>> 74c038dc22b6e174e5f2e93d170f52b4e17f6751
}