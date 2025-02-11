<?php

class HomeController
{
  public $modelSanPham;
  public $modelDanhMuc;

  public function __construct()
  {
    $this->modelSanPham = new AdminSanPham();
    $this->modelDanhMuc = new AdminDanhMuc();
  }

  public function home()
{
    $keyword = $_GET['keyword'] ?? ''; // Lấy từ khóa tìm kiếm từ URL (nếu có)
    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc(); // Lấy danh mục (dùng chung)

    if (!empty($keyword)) {
        $listSanPham = $this->modelSanPham->searchSanPhamByName($keyword); // Tìm sản phẩm theo tên
        require_once './views/dssanpham.php'; // Nếu tìm kiếm thì chỉ load trang này
        return; // Dừng function để không load tiếp home.php
    }

    $listSanPham = $this->modelSanPham->getAllSanPham(); // Hiển thị tất cả sản phẩm nếu không tìm kiếm
    require_once './views/home.php'; // Chỉ load home khi không tìm kiếm
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