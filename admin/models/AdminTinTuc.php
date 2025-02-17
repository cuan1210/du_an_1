<?php

class AdminTinTuc
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllTinTuc()
    {
        try {

            $sql = "SELECT * FROM tin_tucs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function insertTinTuc($name, $thong_tin, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO tin_tucs (name, thong_tin, hinh_anh) 
                    VALUES (:name, :thong_tin, :hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':name' => $name, 
                ':thong_tin' => $thong_tin,
                ':hinh_anh' => $hinh_anh
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
    }

    public function getDetailTinTuc($id)
    {
        try {
            $sql = "SELECT * FROM tin_tucs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute(
                [
                    ':id' => $id
                ]
            );

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateTinTuc($id, $name, $thong_tin, $hinh_anh)
    {
        try {
            $sql = 'UPDATE tin_tucs 
                    SET name = :name, thong_tin = :thong_tin, hinh_anh = :hinh_anh 
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':name' => $name,
                ':thong_tin' => $thong_tin,
                ':hinh_anh' => $hinh_anh,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
    }

    public function deleteTinTuc($id)
    {
        try {
            $sql = 'DELETE FROM tin_tucs 
                    WHERE id = :id';
                    
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);
            
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }
}