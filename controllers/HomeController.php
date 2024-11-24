<?php 
require_once PATH_ROOT . 'models/Sach.php';

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
    public function index() {
        header("Location: " . BASE_URL . "index.php?controller=home&action=home");
        exit;
    }
    
    
}