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
        // $listDonHang = $this->modelDonHang->getAllDonHangDetail();

        $listDetailDonHang = $this->modelDonHang->getAllDetailDonHangSanPhamBanChay();
        require_once './views/trangChuAdmin.php';
    }

}
