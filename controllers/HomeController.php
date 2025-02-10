<?php

class HomeController
{
  public $modelSanPham;
  public $modelDanhMuc;
  // public $modelTaiKhoan;

  public function __construct()
  {
    $this->modelSanPham = new AdminSanPham();
    $this->modelDanhMuc = new AdminDanhMuc();
  }

  public function home()
  {
    $listSanPham = $this->modelSanPham->getAllSanPham();
    require_once './views/home.php';

  }
  public function dssanpham()
{
    $danhMucId = isset($_GET['danh_muc_id']) ? intval($_GET['danh_muc_id']) : 0;

    // Lấy danh sách danh mục
    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

    // Nếu có danh mục -> lấy sản phẩm theo danh mục, nếu không lấy tất cả sản phẩm
    if ($danhMucId > 0) {
        $listSanPham = $this->modelSanPham->getListSanPhamDanhMuc($danhMucId);
    } else {
        $listSanPham = $this->modelSanPham->getAllSanPham();
    }

    require_once './views/dssanpham.php';
}


  public function chiTietSanPham()
  {
    $id = $_GET['id_san_pham'];

    $sanPham = $this->modelSanPham->getDetailSanPham($id);

    $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

    $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

    $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);

    if ($sanPham) {
      require_once './views/detailSanPham.php';
    } else {
      header("Location: " . BASE_URL);
      exit();
    }
  }
}