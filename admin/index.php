<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ
// checkLoginAdmin()

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDashboardController.php';
require_once './controllers/AdminTaiKhoanController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminBinhLuanController.php';
require_once './controllers/AdminBannerController.php';
require_once './controllers/AdminTinTucController.php';
require_once './controllers/AdminLienHeController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminTaiKhoan.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminBinhLuan.php';
require_once './models/AdminBanner.php';
require_once './models/AdminTinTuc.php';
require_once './models/AdminLienHe.php';

// Route
$act = $_GET['act'] ?? '/';
if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin') {
    checkLoginAdmin();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    '/' => (new AdminDashboardController())->trangChu(),
    // Route quản lí danh mục
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->themDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->suaDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->xoaDanhMuc(),

    // Rount Quản Lý Tài Khoản
    'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->danhSachQuanTri(),
    'from-them-quan-tri' => (new AdminTaiKhoanController())->fromAddQuanTri(),
    'them-quan-tri' => (new AdminTaiKhoanController())->themQuanTri(),
    'from-edit-quan-tri' => (new AdminTaiKhoanController())->fromEditQuanTri(),
    'edit-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),
    // Rout dùng chung cho các tài khoản
    'reset-password' => (new AdminTaiKhoanController())->resetPassword(),
    // Rout Quản Lý Tài Khoản Khách Hàng
    'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())->danhSachKhachHang(),
    'from-edit-khach-hang' => (new AdminTaiKhoanController())->fromEditKhachHang(),
    'edit-khach-hang' => (new AdminTaiKhoanController())->postEditKhachHang(),
    'chi-tiet-khach-hang' => (new AdminTaiKhoanController())->deltailKhachHang(),

    // router quản lý tài khoản cá nhân(quản trị)
    'form-sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->formEditTaiKhoanCaNhan(),
    'sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditCaNhanQuanTri(),
    'sua-mat-khau-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditMatKhauCaNhanQuanTri(),

     // route auth
    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
    'logout-admin' => (new AdminTaiKhoanController())->logout(),

    // Route quản lí sản phẩm
    'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->themSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),
    'sua-san-pham' => (new AdminSanPhamController())->suaSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController())->xoaSanPham(),
    'chi-tiet-san-pham' => (new AdminSanPhamController())->detailSanPham(),

    // Route quản lí đơn hàng
    'quan-ly-don-hang' => (new AdminDonHangController())->danhSachDonHang(),
    'form-sua-don-hang' => (new AdminDonHangController())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangController())->postEditDonHang(),
    'chi-tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),

    // Route quản lí bình luận
    'quan-ly-binh-luan' => (new AdminBinhLuanController())->danhSachBinhLuan(),
    'danh-sach-binh-luan' => (new AdminBinhLuanController())->danhSachDetailBinhLuan(),
    'xoa-binh-luan' => (new AdminBinhLuanController())->deleteBinhLuan(),

    // Route quản lí banner
    'banner' => (new AdminBannerController())->danhSachBanner(),
    'form-them-banner' => (new AdminBannerController())->formAddBanner(),
    'them-banner' => (new AdminBannerController())->postAddBanner(),
    'form-sua-banner' => (new AdminBannerController())->formEditBanner(),
    'sua-banner' => (new AdminBannerController())->postEditBanner(),
    'xoa-banner' => (new AdminBannerController())->deleteBanner(),

    // Route quản lí tin tức
    'tin-tuc' => (new AdminTinTucController())->danhSachTinTuc(),
    'form-them-tin-tuc' => (new AdminTinTucController())->formAddTinTuc(),
    'them-tin-tuc' => (new AdminTinTucController())->postAddTinTuc(),
    'form-sua-tin-tuc' => (new AdminTinTucController())->formEditTinTuc(),
    'sua-tin-tuc' => (new AdminTinTucController())->postEditTinTuc(),
    'xoa-tin-tuc' => (new AdminTinTucController())->deleteTinTuc(),

    // Route quản lí liên hệ
    'lien-he' => (new AdminLienHeController())->danhSachLienHe(),
    'form-sua-lien-he' => (new AdminLienHeController())->formEditLienHe(),
    'sua-lien-he' => (new AdminLienHeController())->postEditLienHe(),
    'xoa-lien-he' => (new AdminLienHeController())->deleteLienHe(),
};