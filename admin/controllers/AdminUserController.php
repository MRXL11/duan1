<?php  
class AdminUserController {
    private $modelUser;

    public function __construct() {
        $this->modelUser = new AdminUser();
    }

    // Hiển thị danh sách người dùng
    public function danhSachNguoiDung() {
        $users = $this->modelUser->getAllUsers();
        require_once './views/user/listUser.php';
    }

    // Hiển thị chi tiết người dùng
    public function chiTietNguoiDung($id) {
        if (empty($id) || !is_numeric($id)) {
            // Điều hướng về danh sách người dùng nếu ID không hợp lệ
            header("Location: ?act=quan-ly-nguoi-dung");
            exit;
        }
        
        // Lấy thông tin người dùng và chức vụ
        $user = $this->modelUser->getUserById($id);
        
        if (!$user) {
            // Nếu không tìm thấy người dùng, điều hướng về danh sách người dùng
            header("Location: ?act=quan-ly-nguoi-dung");
            exit;
        }

        // Lấy danh sách chức vụ
        $roles = $this->modelUser->getAllRoles();
        require_once './views/user/detailUser.php';
    }

    // Xóa người dùng
    public function xoaNguoiDung($id) {
        if (empty($id) || !is_numeric($id)) {
            // Điều hướng về danh sách người dùng nếu ID không hợp lệ
            header("Location: ?act=quan-ly-nguoi-dung");
            exit;
        }

        // Xóa người dùng
        $this->modelUser->deleteUser($id);
        // Sau khi xóa, điều hướng về danh sách người dùng
        header("Location: ?act=quan-ly-nguoi-dung");
        exit;
    }

    // Cập nhật chức vụ người dùng
    public function capNhatChucVu($id, $chuc_vu_id) {
        if (empty($id) || !is_numeric($id) || empty($chuc_vu_id) || !is_numeric($chuc_vu_id)) {
            // Điều hướng về chi tiết người dùng nếu ID hoặc chức vụ không hợp lệ
            header("Location: ?act=chi-tiet-nguoi-dung&id=$id");
            exit;
        }

        // Cập nhật chức vụ cho người dùng
        $this->modelUser->updateUserRole($id, $chuc_vu_id);
        
        // Sau khi cập nhật, điều hướng về chi tiết người dùng
        header("Location: ?act=chi-tiet-nguoi-dung&id=$id");
        exit;
    }
}
