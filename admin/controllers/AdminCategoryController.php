<?php 
class AdminCategoryController{
    public $modelCategory;
    public function __construct()
    {
        $this->modelCategory = new AdminCategory();
    }
    public function danhSachDanhMuc(){

        $listCategory = $this->modelCategory->getAllCategory();
        require_once './views/category/listCategory.php';
    }

    public function formAddDanhMuc(){
        // hiển thị form nhập
        // var_dump('Form thêm');
        require_once './views/category/addCategory.php';
    }
    public function postAddDanhMuc(){
        // xử lý thêm dữ liệu
        var_dump('Xử lý Form thêm');
    }
}