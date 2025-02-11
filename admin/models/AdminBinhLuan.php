<?php

class AdminBinhLuan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllBinhLuan()
    {
        try {

            $sql = "SELECT
                    san_pham_id,
                    san_phams.ten_san_pham,
                    COUNT(*) AS comment_count
                FROM binh_luans
                INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                GROUP BY san_pham_id, san_phams.ten_san_pham";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getAllDetailBinhLuan($id)
    {
        try {

            $sql  = "SELECT * FROM binh_luans WHERE san_pham_id = :san_pham_id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':san_pham_id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getIdBinhLuan($id)
    {
        try {

            $sql  = "SELECT * FROM binh_luans WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function deleteBinhLuan($id)
    {
        try {

            $sql  = "DELETE FROM binh_luans WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getBinhLuanFromKhachHang($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham
            FROM binh_luans
            INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
            WHERE binh_luans.tai_khoan_id = :id 
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute(['id'=>$id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
}