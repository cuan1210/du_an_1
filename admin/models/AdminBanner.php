<?php

class AdminBanner
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllBanner()
    {
        try {

            $sql = "SELECT * FROM banners";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function insertBanner($ten_banner, $mo_ta, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO banners (ten_banner, mo_ta, hinh_anh)
                    VALUES (:ten_banner, :mo_ta, :hinh_anh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_banner' => $ten_banner,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh
            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
    }

    public function getDetailBanner($id)
    {
        try {
            $sql = "SELECT * FROM banners WHERE id = :id";

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

    public function updateBanner($id, $ten_banner, $mo_ta, $hinh_anh)
    {
        try {
            $sql = 'UPDATE banners 
                    SET ten_banner = :ten_banner, mo_ta = :mo_ta, hinh_anh = :hinh_anh 
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_banner' => $ten_banner, 
                ':mo_ta' => $mo_ta, 
                ':hinh_anh' => $hinh_anh, 
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }

    public function deleteBanner($id)
    {
        try {
            $sql = 'DELETE FROM banners 
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