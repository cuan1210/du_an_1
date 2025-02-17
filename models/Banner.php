<?php
class Banner
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); 
    }

    public function getAllBanners()
    {
        try {
            $sql = 'SELECT * FROM banners';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            // return false;
        }
    }
}
?>