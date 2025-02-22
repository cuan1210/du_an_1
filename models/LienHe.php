<?php
class LienHe
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); 
    }

    public function insertLienHe($tai_khoan_id, $ho_ten, $email, $so_dien_thoai, $chu_de_lien_he, $noi_dung) {
        try {
            $sql = "INSERT INTO lien_hes (tai_khoan_id, ho_ten, email, so_dien_thoai, chu_de_lien_he, noi_dung)
                    VALUES (:tai_khoan_id, :ho_ten, :email, :so_dien_thoai, :chu_de_lien_he, :noi_dung)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id'=>$tai_khoan_id,
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':chu_de_lien_he' => $chu_de_lien_he,
                ':noi_dung' => $noi_dung,
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            error_log("Error inserting contact message: " . $e->getMessage());
            return false;  
        }
    }
}
?>