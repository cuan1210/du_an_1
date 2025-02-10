<?php

class AdminBinhLuanController
{

    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelBinhLuan = new AdminBinhLuan();
    }

    public function danhSachBinhLuan()
    {
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();

        require_once './views/BinhLuan/listBinhLuan.php';
    }

    public function danhSachDetailBinhLuan()
    {
        $id = $_GET['id'];

        $listBinhLuan = $this->modelBinhLuan->getAllDetailBinhLuan($id);
        
        require_once './views/BinhLuan/detailBinhLuan.php';
    }

    public function deleteBinhLuan()
    {
        $id = $_GET['id'];
        $BinhLuan = $this->modelBinhLuan->getIdBinhLuan($id);

        if (isset($BinhLuan)) {
            $this->modelBinhLuan->deleteBinhLuan($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-binh-luan');
    }
}
