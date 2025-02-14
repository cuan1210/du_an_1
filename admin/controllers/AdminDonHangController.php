<?php

class AdminDonHangController
{
    public $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }

    public function danhSachDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();

        require_once './views/DonHang/listDonHang.php';
    }

    public function detailDonHang() 
    {
        $don_hang_id = $_GET['id_don_hang'];
        
        // Lấy thông tin đơn hàng ở bảng don_hangs
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

        // Lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hangs
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

        // Trạng thái đơn hàng
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        require_once './views/DonHang/detailDonHang.php';
    }

    public function formEditDonHang()
    {
        $id = $_GET['id_don_hang'] ?? null;

        $donHang = $this->modelDonHang->getDetailDonHang($id);

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($id);

        if ($donHang) {
            require_once './views/donhang/editDonHang.php';
            deleteSessionError();
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-don-hang');
            exit();
        }
    }

    public function postEditDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $don_hang_id = $_POST['don_hang_id'];
            $trang_thai_id = $_POST['trang_thai_id'];

            $errors = [];
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Trạng thái đơn hàng không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $this->modelDonHang->updateDonHang($don_hang_id, $trang_thai_id);
                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-don-hang');
                exit();
            } else {
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
    }
}
