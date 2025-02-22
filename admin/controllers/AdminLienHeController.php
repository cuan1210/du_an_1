<?php

class AdminLienHeController
{

    public $modelLienHe;

    public function __construct()
    {
        $this->modelLienHe = new AdminLienHe();
    }

    public function danhSachLienHe()
    {
        $listLienHe = $this->modelLienHe->getAllLienHe();
        require_once './views/LienHe/listLienHe.php';
    }

    public function formEditLienHe()
    {
        $id = $_GET['id'] ?? null;
        // var_dump($id);die();
        $lienHe = $this->modelLienHe->getDetailLienHe($id);

        if ($lienHe) {
            require_once('./views/LienHe/editLienHe.php');
        } else {
            header('Location:' . BASE_URL_ADMIN . '?act=lien-he');
            exit();
        }
    }

    public function postEditLienHe()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $lien_he_id = $_POST['lien_he_id'];
            $trang_thai_lien_he = $_POST['trang_thai_lien_he'];

            $errors = [];
            if (empty($trang_thai_lien_he)) {
                $errors['trang_thai_lien_he'] = 'Trạng thái đơn hàng không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $this->modelLienHe->updateLienHe($lien_he_id, $trang_thai_lien_he);
                // var_dump($this->modelLienHe->updateLienHe($lien_he_id, $trang_thai_lien_he));die();
                header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
                exit();
            } else {
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-lien-he&id_lien_he=' . $lien_he_id);
                exit();
            }
        }
    }

    public function deleteLienHe()
    {
        $id = $_GET['id'] ?? null;
        $lienHe = $this->modelLienHe->getDetailLienHe($id);

        if ($lienHe) {
            $this->modelLienHe->deleteLienHe($id);
        }

        header('Location:' . BASE_URL_ADMIN . '?act=lien-he');
        exit();
    }
}
