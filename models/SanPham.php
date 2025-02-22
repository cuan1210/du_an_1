<?php

class AdminSanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllSanPham()
    {
        try {
            $sql = "SELECT DISTINCT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về dữ liệu không trùng
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDetailSanPham($id){
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
                    WHERE san_phams.id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id'=>$id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    
    public function getBinhLuanFromSanPham($id){
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien
                    FROM binh_luans 
                    INNER JOIN tai_khoans 
                    ON binh_luans.tai_khoan_id = tai_khoans.id
                    WHERE binh_luans.san_pham_id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getListSanPhamDanhMuc($danh_muc_id){
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
        INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.danh_muc_id = '. $danh_muc_id;
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getListSanPhamLienQuan($danh_muc_id, $id_san_pham_hien_tai){
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.danh_muc_id = :danh_muc_id
                    AND san_phams.id != :id_san_pham_hien_tai'; // Loại bỏ sản phẩm hiện tại
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id, PDO::PARAM_INT);
            $stmt->bindParam(':id_san_pham_hien_tai', $id_san_pham_hien_tai, PDO::PARAM_INT);
    
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    
    public function searchSanPhamByName($keyword)
    {
        $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE :keyword";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['keyword' => "%$keyword%"]);
        return $stmt->fetchAll();
    }

    public function getSoLuong($san_pham_id)
    {
        $sql = "SELECT so_luong FROM san_phams WHERE id = :san_pham_id";
        
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            'san_pham_id' => $san_pham_id
        ]);

        return $stmt->fetchColumn(); // trả về cột số lượng
    } 

    public function giamSoLuong($san_pham_id, $so_luong_dat)
    {
        try {
            $sql = "UPDATE san_phams  SET so_luong = so_luong - :so_luong 
                WHERE id = :san_pham_id AND so_luong >= :so_luong";

            $stmt = $this->conn->prepare($sql);

            // Sử dụng bindValue để gán giá trị cho các tham số
            // bindValue(':param_name', $value, $data_type);
            //          :param_name: Tên tham số trong câu lệnh SQL.
            //          $value: Giá trị bạn muốn gán cho tham số.
            //          $data_type (tùy chọn): Loại dữ liệu của tham số (ví dụ: PDO::PARAM_INT, PDO::PARAM_STR, PDO::PARAM_BOOL, ...).
            $stmt->bindValue(':so_luong', $so_luong_dat, PDO::PARAM_INT);
            $stmt->bindValue(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

    public function tangSoLuong($san_pham_id, $so_luong)
    {
        try {
            $sql = "UPDATE san_phams SET so_luong = so_luong + :so_luong 
                WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);

            // Sử dụng bindValue để gán giá trị cho các tham số
            // bindValue(':param_name', $value, $data_type);
            //          :param_name: Tên tham số trong câu lệnh SQL.
            //          $value: Giá trị bạn muốn gán cho tham số.
            //          $data_type (tùy chọn): Loại dữ liệu của tham số (ví dụ: PDO::PARAM_INT, PDO::PARAM_STR, PDO::PARAM_BOOL, ...).
            $stmt->bindValue(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
            $stmt->bindValue(':so_luong', $so_luong, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
}
