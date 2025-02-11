<?php

class AdminDashboardController  
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
        $this->modelBinhLuan = new AdminBinhLuan();
    }

    public function trangchu()
    {
        // $listDonHang = $this->modelDonHang->getAllDetailDonHang();
        $listAllDonHang = $this->modelDonHang->getAllDonHang();
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoanThongKe();
        $tongThuNhap = $this->modelDonHang->tongThuNhap();
        // var_dump($tongThuNhap);die();

        require_once './views/trangChuAdmin.php';
    }

    // public function formAddDanhMuc()
    // {
    //     // Hiển thị form thêm danh mục
    //     require_once './views/DanhMuc/addDanhMuc.php';
    // }

    // public function themDanhMuc()
    // {
    //     // kiểm tra dữ liệu
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         $ten_danh_muc = $_POST['ten_danh_muc'];
    //         $mo_ta = $_POST['mo_ta'];

    //         $errors = [];

    //         if (empty($ten_danh_muc)) {
    //             $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
    //         }

    //         if (empty($errors)) {
    //             // Nếu không có lỗi tiến hành thêm danh mục

    //             $this->modelDanhMuc->addDanhMuc($ten_danh_muc, $mo_ta);
    //             header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //             exit();
    //         } else {
    //             // Có lỗi thì trả lại trang thêm danh mục
    //             require_once './views/DanhMuc/addDanhMuc.php';
    //         }
    //     }
    // }

    // public function formEditDanhMuc()
    // {
    //     // Hiển thị form thêm danh mục
    //     // Lấy ra thông tin của danh mục cần sửa
    //     $id = $_GET['id_danh_muc'];
    //     $danhMuc = $this->modelDanhMuc->getByIdDanhMuc($id);
    //     if ($danhMuc) {
    //         require_once './views/DanhMuc/editDanhMuc.php';
    //     } else {
    //         header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //     }
    // }

    // public function suaDanhMuc()
    // {
    //     // kiểm tra dữ liệu
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         $id = $_POST['id'];
    //         $ten_danh_muc = $_POST['ten_danh_muc'];
    //         $mo_ta = $_POST['mo_ta'];

    //         $errors = [];

    //         if (empty($ten_danh_muc)) {
    //             $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
    //         }

    //         if (empty($errors)) {
    //             // Nếu không có lỗi tiến hành thêm danh mục

    //             $this->modelDanhMuc->editDanhMuc($id, $ten_danh_muc, $mo_ta);
    //             header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //             exit();
    //         } else {
    //             // Có lỗi thì trả lại trang thêm danh mục
    //             $danhMuc = [
    //                 'id' => $id,
    //                 'ten_danh_muc' => $ten_danh_muc,
    //                 'mo_ta' => $mo_ta

    //             ];
    //             require_once './views/DanhMuc/editDanhMuc.php';
    //         }
    //     }
    // }
    // public function xoaDanhMuc()
    // {

    //     $id = $_GET['id_danh_muc'];
    //     $danhMuc = $this->modelDanhMuc->getByIdDanhMuc($id);

    //     if ($danhMuc) {
    //         $this->modelDanhMuc->deleteDanhMuc($id);
    //     }
    //     header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //     exit();
    // }
}
