<?php
class AdminTaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTaiKhoan($chuc_vu_id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':chuc_vu_id' => $chuc_vu_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
    public function insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id)
    {
        $sql_check = 'SELECT * FROM tai_khoans WHERE email = :email';
        $stmt_check = $this->conn->prepare($sql_check);
        $stmt_check->execute([':email' => $email]);

        if ($stmt_check->rowCount() > 0) {
            return false;
        }

        $sql = 'INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id) 
        VALUES (:ho_ten, :email, :password, :chuc_vu_id)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ho_ten'     => $ho_ten,
            ':email'      => $email,
            ':password'   => $password,
            ':chuc_vu_id' => $chuc_vu_id,
        ]);
        return true;
    }

    public function getDetailTaiKhoan($id)
    {
        try {
            $sql = 'SELECT * FROM  tai_khoans WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
    public function updateTaiKhoan($id, $ho_ten, $email, $so_dien_thoai, $trang_thai,)
    {
        try {
            $sql = 'UPDATE tai_khoans 
                SET 
                    ho_ten = :ho_ten, 
                    email = :email, 
                    so_dien_thoai = :so_dien_thoai, 
                    trang_thai = :trang_thai
                WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
            return false;
        }
    }
    public function resetPassword($id, $mat_khau)
    {
        try {
            $sql = 'UPDATE tai_khoans 
                SET 
                    mat_khau = :mat_khau
                WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
            return false;
        }
    }
    public function updateKhachHang($id, $ho_ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai)
    {
        try {
            $sql = 'UPDATE tai_khoans 
                SET 
                    ho_ten = :ho_ten, 
                    email = :email, 
                    so_dien_thoai = :so_dien_thoai, 
                    ngay_sinh = :ngay_sinh, 
                    gioi_tinh = :gioi_tinh, 
                    dia_chi = :dia_chi, 
                    trang_thai = :trang_thai
                WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':ngay_sinh' => $ngay_sinh,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
            return false;
        }
    }
    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if (!$user) {
                return "Sai email hoặc mật khẩu!";
            }
            
            // Kiểm tra trạng thái tài khoản trước
            if ($user['trang_thai'] != 1) {
                return "Tài khoản của bạn đã bị khóa! Vui lòng liên hệ quản trị viên.";
            }
            
            // Kiểm tra quyền Admin
            if ($user['chuc_vu_id'] != 1) {
                return "Bạn không có quyền truy cập vào trang Admin!";
            }
            
            // Kiểm tra mật khẩu sau cùng
            if (!password_verify($mat_khau, $user['mat_khau'])) {
                return "Sai email hoặc mật khẩu!";
            }
            
            return true; // Đăng nhập thành công
            
        } catch (\Exception $e) {
            return "Lỗi hệ thống: " . $e->getMessage();
        }
    }

    public function getAllTaiKhoanThongKe()
    {
        try {

            $sql = "SELECT * FROM tai_khoans";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}