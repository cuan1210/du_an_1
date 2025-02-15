<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once __DIR__ . '/admin/models/AdminDanhMuc.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    '/' => (new HomeController())->home(),
    
    'trangchu' => (new HomeController())->home(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham($_GET['id'] ?? 0),
    'list-san-pham' => (new HomeController())->dssanpham(),
    // 'danh-sach-san-pham' => (new HomeController())->danhSachSanPham(),

    //đăng kí đăng nhập client
    'login' => (new HomeController())->formlogin(),
    'check-login' => (new HomeController())->postLogin(),
    'register' => (new HomeController())->formRegister(),
    'check-register' => (new HomeController())->postRegister(),
    'logout-clinet' => (new HomeController())->Logout(),

    // Giỏ hàng
    'them-gio-hang' => (new HomeController())->addGioHang(),
    'gio-hang' => (new HomeController())->gioHang(),
    'xoa-gio-hang' => (new HomeController())->deleteGioHang(),
    

    // Thanh toán
    'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController())->postThanhToan(),
    'lich-su-mua-hang' => (new HomeController())->lichSuMuaHang(),
    'chi-tiet-mua-hang' => (new HomeController())->chiTietMuaHang(),
    'huy-don-hang' => (new HomeController())->huyDonHang(),

    // Bình luận
    'gui-binh-luan' => (new HomeController())->guiBinhLuan(),
    


};