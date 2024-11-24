<?php

class AdminCategory{
    public $conn;
    public function __construct(){
        $this->conn= connectDB();
    }
    public function getAllCategory(){
        try{
            $sql='SELECT * FROM danhmucs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertCategory($ten_danh_muc,$mo_ta){
        try{
            $sql='INSERT INTO  danhmucs (ten_danh_muc,mo_ta) 
            VALUES (:ten_danh_muc,:mo_ta)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_danh_muc' => $ten_danh_muc,
                ':mo_ta' => $mo_ta,
            ]);

            return true;
        }catch(Exception $e){
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailCategory($id){
        try{
            $sql='SELECT * FROM danhmucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id,               
            ]);

            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function updateCategory($id,$ten_danh_muc,$mo_ta){
        try{
            $sql='UPDATE  danhmucs SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_danh_muc' => $ten_danh_muc,
                ':mo_ta' => $mo_ta,
                ':id' => $id,
            ]);

            return true;
        }catch(Exception $e){
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function destroyCategory($id){
        try{
            $sql='DELETE FROM  danhmucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id,
            ]);

            return true;
        }catch(Exception $e){
            echo "Lỗi" . $e->getMessage();
        }
    }

}