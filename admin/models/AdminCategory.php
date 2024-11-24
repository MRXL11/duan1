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

            return $stmt;
        }catch(Exception $e){
            echo "Lỗi" . $e->getMessage();
        }
    }
}