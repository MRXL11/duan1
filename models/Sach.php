<?php
class Sach {
    public $conn; // phương thức class sản phẩm

    public function __construct()
    {
        $this->conn= connectDB();
    }

    // Lấy danh sách Sách
    public  function getAllBook(){
        try {
            $sql='SELECT * FROM sanphams';
            $stmt= $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        }
        catch(Exception $e) {
            echo "Lỗi: ". $e->getMessage();
        }
    }


}