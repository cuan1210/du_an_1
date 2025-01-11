<?php 

class HomeController
{
    public $modelSanPham;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }

    public function home()
    {
      echo"Test";
    }
    public function trangChu()
    {
      echo"Test";
    } 
    public function danhSachSanPham()
    {
      $listProduct = $this->modelSanPham->getAllProduct();

      require_once './views/ListProduct.php';
    } 

}