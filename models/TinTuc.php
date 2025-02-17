<?php
class TinTuc
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); 
    }

    public function getAllTinTuc()
    {
        try {
            $sql = 'SELECT * FROM tin_tucs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            // return false;
        }
    }

    public function getTinTucById($id) 
    {
        try {
            $query = "SELECT * FROM tin_tucs WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return null;
        }
    }
}
?>