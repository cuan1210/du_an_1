<?php

class AdminLienHe
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllLienHe()
    {
        try {

            $sql = "SELECT * FROM lien_hes";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }



    public function getDetailLienHe($id)
    {
        try {
            $sql = "SELECT * FROM lien_hes WHERE id = :id";

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

    public function updateLienHe($id, $trang_thai_lien_he) {
        try {
            $sql = "UPDATE lien_hes 
                    SET trang_thai_lien_he = :trang_thai_lien_he
                    WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                'trang_thai_lien_he' => $trang_thai_lien_he,
                ':id' => $id,
            ]);

            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function deleteLienHe($id)
    {
        try {
            $sql = 'DELETE FROM lien_hes 
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