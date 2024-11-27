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

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_danh_muc= $_POST['ten_danh_muc'];
            $mo_ta=$_POST['mo_ta'];


            // tạo 1 mảng trống chứa dữ liệu, validate
            $errors=[]  ;
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc']='Tên danh mục không được để trống';
            }

            // Nếu không có lỗi thì tiến hành thêm dnah mục và db
            if(empty($errors)){
                $this->modelCategory->insertCategory($ten_danh_muc,$mo_ta);
                header("Location:".BASE_URL_ADMIN. '?act=danh-muc');
                exit();
            }else {
                // trả lỗi và trả lại form
                require_once './views/category/addCategory.php';
            }
        }
    }


    public function formEditDanhMuc(){
        // hiển thị form nhập
        // lấy ra thông tin
        $id=$_GET['id_danh_muc'];
        $category=$this->modelCategory->getDetailCategory($id);

        if($category){
            require_once './views/category/editCategory.php';
        }else {
            header("Location:".BASE_URL_ADMIN. '?act=danh-muc');
            exit();
        }

    }
    public function postEditDanhMuc(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_danh_muc= $_POST['ten_danh_muc'];
            $id= $_POST['id'];
            $mo_ta=$_POST['mo_ta'];


            // tạo 1 mảng trống chứa dữ liệu, validate
            $errors=[]  ;
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc']='Tên danh mục không được để trống';
            }

            // Nếu không có lỗi thì tiến hành sửa dnah mục và db
            if(empty($errors)){
                $this->modelCategory->updateCategory($id,$ten_danh_muc,$mo_ta);
                header("Location:".BASE_URL_ADMIN. '?act=danh-muc');
                exit();
            }else {
                // trả lỗi và trả lại form
                $category=['id'=>$id, 'ten_danh_muc'=>$ten_danh_muc, 'mo_ta'=>$mo_ta];
                require_once './views/category/editCategory.php';
            }
        }
    }


    public function deleteDanhMuc(){
        $id=$_GET['id_danh_muc'];
        $category=$this->modelCategory->getDetailCategory($id);
        if($category){
            $this->modelCategory->destroyCategory($id);
        }
        header("Location:".BASE_URL_ADMIN. '?act=danh-muc');
        exit();

    }
}