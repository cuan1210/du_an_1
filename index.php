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
require_once './models/Banner.php';
require_once './models/TinTuc.php';
require_once './models/LienHe.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    '/' => (new HomeController())->home(),
    
    'trangchu' => (new HomeController())->home(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham($_GET['id'] ?? 0),
    'list-san-pham' => (new HomeController())->dssanpham(),
    'gioi-thieu' => (new HomeController())->gioiThieu(),
    // 'danh-sach-san-pham' => (new HomeController())->danhSachSanPham(),

    //đăng kí đăng nhập client
    'login' => (new HomeController())->formlogin(),
    'check-login' => (new HomeController())->postLogin(),
    'register' => (new HomeController())->formRegister(),
    'check-register' => (new HomeController())->postRegister(),
    'logout-clinet' => (new HomeController())->Logout(),

    // thông tin chi tiết khách hàng
    'chi-tiet-khach-hang' => (new HomeController())->chiTietKhachHang(),
    'sua-khach-hang' => (new HomeController())->suaKhachHang(),
    'doi-mat-khau-khach-hang' => (new HomeController())->doiMatKhauKhachHang(),


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
    
    // Tin tức
    'tin-tuc' => (new HomeController())->danhSachTinTuc(),
    'chi-tiet-tin-tuc' => (new HomeController())->chiTietTinTuc($_GET['id'] ?? null),

    // Liên hệ
    'lien-he' => (new HomeController())->lienHe(),
    'them-lien-he' => (new HomeController())->postAddLienHe(),


};