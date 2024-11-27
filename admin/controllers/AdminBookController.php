<?php 
class AdminBookController{
    public $modelBook;
    public $modelCategory;
    public function __construct()
    {
        $this->modelBook = new AdminBook();
        $this->modelCategory = new AdminCategory();
    }
    public function danhSachSanPham(){

        $listBook = $this->modelBook->getAllBook();
        require_once './views/book/listBook.php';
    }

    public function formAddSanPham(){
        // hiển thị form nhập
        // var_dump('Form thêm');
        $listCategory=$this->modelCategory->getAllCategory();
        
        require_once './views/book/addBook.php';
        // Xóa session sau khi load
        deleteSessionError();
    }
    public function postAddSanPham(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten= $_POST['ten'] ?? ' ';
            $gia= $_POST['gia'] ?? ' ';
            $so_luong= $_POST['so_luong'] ??' ';
            $ngay_nhap= $_POST['ngay_nhap'] ??' ';
            $id_danh_muc= $_POST['id_danh_muc'] ??' ';
            $trang_thai= $_POST['trang_thai'] ??' ';

            $mo_ta=$_POST['mo_ta'] ??' ';
            $tac_gia= $_POST['tac_gia'] ??' ';
            $hinh_anh=$_FILES['hinh_anh'] ??null;
            // Lưu hình ảnh vào 
            $file_thumb=upLoadFile($hinh_anh,'./uploads/');


            $img_array=$_FILES['img_array'];


            $errors=[];
            if(empty($ten)){
                $errors['ten']='Tên sản phẩm không được để trống';
            }
            if(empty($tac_gia)){
                $errors['tac_gia']='Tên tác giả không được để trống';
            }

            if(empty($gia)){
                $errors['gia']='Giá sản phẩm không được để trống';
            }
            if(empty($so_luong)){
                $errors['so_luong']='Số lượng sản phẩm không được để trống';
            }
            if(empty($ngay_nhap)){
                $errors['ngay_nhap']='Ngày nhập sản phẩm không được để trống';
            }
            if(empty($id_danh_muc)){
                $errors['id_danh_muc']='Tên danh mục phải chọn';
            }
            if(empty($trang_thai)){
                $errors['trang_thai']='Trạng thái sản phẩm phải chọn';
            }
            if($hinh_anh['errors'] !==0){
                $errors['hinh_anh']='Trạng thái sản phẩm phải chọn';
            }
            $_SERVER['error']=$errors;
            // Nếu không có lỗi thì tiến hành thêm sản phẩm và db
            if(empty($errors)){
                $this->modelBook->insertBook($ten,$tac_gia, $gia, $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $mo_ta, $file_thumb);
                header("Location:".BASE_URL_ADMIN. '?act=san-pham');
                exit();
            }else {
                // trả lỗi và trả lại form
                //Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash']=true;

                header("Location:".BASE_URL_ADMIN. '?act=form-them-san-pham');
                exit();
            }
        }
        }
    }
    
    // public function formEditDanhMuc(){
    //     // hiển thị form nhập
    //     // lấy ra thông tin
    //     $id=$_GET['id_danh_muc'];
    //     $category=$this->modelCategory->getDetailCategory($id);

    //     if($category){
    //         require_once './views/category/editCategory.php';
    //     }else {
    //         header("Location:".BASE_URL_ADMIN. '?act=danh-muc');
    //         exit();
    //     }

    // }
    // public function postEditDanhMuc(){

    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         $ten_danh_muc= $_POST['ten_danh_muc'];
    //         $id= $_POST['id'];
    //         $mo_ta=$_POST['mo_ta'];


    //         // tạo 1 mảng trống chứa dữ liệu, validate
    //         $errors=[]  ;
    //         if(empty($ten_danh_muc)){
    //             $errors['ten_danh_muc']='Tên danh mục không được để trống';
    //         }

    //         // Nếu không có lỗi thì tiến hành sửa dnah mục và db
    //         if(empty($errors)){
    //             $this->modelCategory->updateCategory($id,$ten_danh_muc,$mo_ta);
    //             header("Location:".BASE_URL_ADMIN. '?act=danh-muc');
    //             exit();
    //         }else {
    //             // trả lỗi và trả lại form
    //             $category=['id'=>$id, 'ten_danh_muc'=>$ten_danh_muc, 'mo_ta'=>$mo_ta];
    //             require_once './views/category/editCategory.php';
    //         }
    //     }
    // }


    // public function deleteDanhMuc(){
    //     $id=$_GET['id_danh_muc'];
    //     $category=$this->modelCategory->getDetailCategory($id);
    //     if($category){
    //         $this->modelCategory->destroyCategory($id);
    //     }
    //     header("Location:".BASE_URL_ADMIN. '?act=danh-muc');
    //     exit();

    // }
