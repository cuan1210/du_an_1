<?php
require_once('./models/taiKhoan.php');

class HomeController
{
  public $modelSanPham;
  public $danhMuc;
  public $modelTaiKhoan;
  public $modelGioHang;
  public $modelDonHang;

  public function __construct()
  {
    $this->modelSanPham = new AdminSanPham();
    $this->danhMuc = new AdminDanhMuc();
    $this->modelTaiKhoan = new AdminTaiKhoan();
    $this->modelGioHang = new AdminGioHang();
    $this->modelDonHang = new DonHang();
  }

  public function home()
  {
    $keyword = $_GET['keyword'] ?? ''; 
    $listDanhMuc = $this->danhMuc->getAllDanhMuc(); 
    $tongDonHang = $this->tongDonHang();
    if(!empty($keyword)){
        $listSanPham = $this->modelSanPham->searchSanPhamByName($keyword); 
        require_once './views/dssanpham.php'; 
        return; 
    }
    $listSanPham = $this->modelSanPham->getAllSanPham(); 
    require_once './views/home.php'; 
}
  public function dssanpham()
{
    $danhMucId = isset($_GET['danh_muc_id']) ? intval($_GET['danh_muc_id']) : 0;
    $listDanhMuc = $this->danhMuc->getAllDanhMuc();
    $tongDonHang = $this->tongDonHang();

    if ($danhMucId>0){
      $listSanPham = $this->modelSanPham->getListSanPhamDanhMuc($danhMucId);
    }else{
        $listSanPham = $this->modelSanPham->getAllSanPham();
    }

    require_once './views/dssanpham.php';
}


  public function chiTietSanPham()
  {
    $id = $_GET['id_san_pham'];
    $sanPham = $this->modelSanPham->getDetailSanPham($id);
    $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
    $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
    $tongDonHang = $this->tongDonHang();

      if ($sanPham) {
      require_once './views/detailSanPham.php';
    } else {
      header("Location: " . BASE_URL);
      exit();
    }
  }
  
  public function formLogin()
  {
      require_once './views/auth/formLogin.php';
      unset($_SESSION['errors']); // Xóa thông báo lỗi sau khi hiển thị
  }
  
  public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
    
            if (is_array($user)) { // Kiểm tra nếu $user là mảng
                $_SESSION['user_client_id'] = $user['id'];
                $_SESSION['user_clinet'] = $user['email'];
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['errors'] = $user; // Lưu thông báo lỗi từ checkLogin
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }
    // Hiển thị form đăng ký
    public function formRegister()
    {
        require_once './views/auth/formRegister.php'; // Truyền đến view đăng ký
    }
    // Xử lý đăng ký
    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $dia_chi = $_POST['dia_chi'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Kiểm tra giới tính chỉ có "Nam" hoặc "Nữ"
            if (!in_array($gioi_tinh, ['Nam', 'Nữ'])) {
                $_SESSION['errors'] = 'Giới tính không hợp lệ. Vui lòng chọn Nam hoặc Nữ.';
                header("Location: " . BASE_URL . '?act=register');
                exit();
            }

            // Kiểm tra ngày sinh phải trước năm hiện tại
            $currentYear = date("Y");
            $birthYear = date("Y", strtotime($ngay_sinh));
            if ($birthYear >= $currentYear) {
                $_SESSION['errors'] = 'Ngày sinh không hợp lệ. Vui lòng chọn năm trước năm hiện tại.';
                header("Location: " . BASE_URL . '?act=register');
                exit();
            }

            // Kiểm tra mật khẩu và xác nhận mật khẩu có khớp không
            if ($password !== $confirm_password) {
                $_SESSION['errors'] = 'Mật khẩu và xác nhận mật khẩu không khớp.';
                header("Location: " . BASE_URL . '?act=register');
                exit();
            }

            // Gọi phương thức từ Model để xử lý đăng ký
            $result = $this->modelTaiKhoan->registerUser(
                $ho_ten,
                $ngay_sinh,
                $so_dien_thoai,
                $gioi_tinh,
                $dia_chi,
                $email,
                $password
            );

            if ($result === true) { // Đăng ký thành công
                $_SESSION['register_success'] = 'Đăng ký thành công. Vui lòng đăng nhập!';
                header("Location: " . BASE_URL . '?act=login');
                exit();
            } else { // Thông báo lỗi nếu có
                $_SESSION['errors'] = $result;
                header("Location: " . BASE_URL . '?act=register');
                exit();
            }
        }
    }
    // Xử lý đăng xuất
   public function Logout()
    {
        if (isset($_SESSION['user_clinet'])) {
            unset($_SESSION['user_clinet']);
            header("Location: " . BASE_URL . '?act=/');
            exit();
        }
        if (isset($_SESSION['ho_ten'])) {
            unset($_SESSION['ho_ten']);
            header("Location: " . BASE_URL . '?act=/');
            exit();
        }
    }

    public function addGioHang()
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['user_clinet'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_clinet']);
            // var_dump($mail['id']);die();
            // Lấy dữ liệu giỏ hàng của người dùng  
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId]; 
                $chiTietGioHang = $this->modelGioHang->getDeltailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDeltailGioHang($gioHang['id']);
            }

            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];

            $checkSanPham = false;

            foreach ($chiTietGioHang as $detail) {
                if ($detail['san_pham_id'] == $san_pham_id) {
                    $newSoLuong = $detail['so_luong'] + $so_luong;
                    $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                    $checkSanPham = true;
                    break;
                }
            }
            if (!$checkSanPham) {
                $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
            }
            header ("Location: " . BASE_URL . '?act=gio-hang');
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';
            // var_dump($_SESSION['message']);die();

            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
      }  
    }

    public function gioHang() 
    {
        if (isset($_SESSION['user_clinet'])) {
            $tongDonHang = $this->tongDonHang();

            $mail = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_clinet']);
            // var_dump($mail['id']);die();
            // Lấy dữ liệu giỏ hàng của người dùng  
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId]; 
                $chiTietGioHang = $this->modelGioHang->getDeltailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDeltailGioHang($gioHang['id']);
            }
           
            require_once './views/gioHang.php';
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';
            // var_dump($_SESSION['message']);die();

            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }

    public function deleteGioHang()
    {
        if (isset($_SESSION['user_clinet'])) {
            $gioHangId = $_GET['id'];

            $chiTietGH = $this->modelGioHang->getProductGioHang($gioHangId);

            if ($chiTietGH) {
                $this->modelGioHang->deleteProductGioHang($gioHangId);
            }
            // var_dump($gioHangId);die();

            header("Location: " . BASE_URL . '?act=gio-hang');
            die();
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            die();
        }
    }

    public function thanhToan()
    {
        if (isset($_SESSION['user_clinet'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_clinet']);
            // var_dump($mail['id']);die();
            // Lấy dữ liệu giỏ hàng của người dùng  
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId]; 
                $chiTietGioHang = $this->modelGioHang->getDeltailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDeltailGioHang($gioHang['id']);
            }

            if (empty($chiTietGioHang)) {
                // Nếu giỏ hàng không có sản phẩm, hiển thị thông báo alert và dừng tiếp tục
                echo '<script type="text/javascript">
                    alert("Giỏ hàng của bạn hiện tại không có sản phẩm nào. Vui lòng thêm sản phẩm vào giỏ hàng để thanh toán.");
                    window.location.href = " ./"; 
                  </script>';
                die;
            }
           
            require_once './views/thanhToan.php';
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';
            // var_dump($_SESSION['message']);die();

            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);die();
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan']; 
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan']; 
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan']; 
            $ghi_chu = $_POST['ghi_chu']; 
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            
            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_clinet']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH-' . rand(1000,9999);

            // Thêm thông tin vào db
            $donHang = $this->modelDonHang->addDonHang(
                $tai_khoan_id, 
                $ten_nguoi_nhan, 
                $email_nguoi_nhan, 
                $sdt_nguoi_nhan, 
                $dia_chi_nguoi_nhan, 
                $ghi_chu, $tong_tien, 
                $phuong_thuc_thanh_toan_id, 
                $ngay_dat, 
                $ma_don_hang, 
                $trang_thai_id
            );

            // Lấy thông tin giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

            // Lưu sản phẩm vào chi tiết đơn hàng
            if ($donHang) {
                // Lấy ra toàn bộ sản phẩm trong giỏ hàng
                $chiTietGioHang = $this->modelGioHang->getDeltailGioHang($gioHang['id']);

                // Thêm từng sản phẩm từ giỏ hàng vào bảng chi tiết đơn hàng
                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham']; 

                    $this->modelDonHang->addChiTietDonHang(
                        $donHang, 
                        $item['san_pham_id'], 
                        $donGia,  
                        $item['so_luong'], 
                        $donGia * $item['so_luong'] 
                    );
                }

                // Sau khi thêm xog phải tiến hàng xóa sản phẩm trong giỏ hàng
                $this->modelGioHang->deleteDetailGioHang($gioHang['id']);

                // Xóa toàn bộ trong chi tiết giỏ hàng
                $this->modelGioHang->deleteGioHang($tai_khoan_id);

                header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
                exit();
            } else {
                var_dump("Lỗi đặt hàng. Vui lòng thử lại sau");
                die;
            }
        }
    }

    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_clinet'])) {
            $tongDonHang = $this->TongDonHang();

            // Lấy ra thông tin tài khoản đăng nhập
            $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_clinet']);
            $tai_khoan_id = $user['id'];

            // Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            // Lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getAllPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // Lấy ra danh sách tất cả đơn hàng của tài khoản
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            // var_dump($donHang);die();
            require_once "./views/lichSuMuaHang.php";
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }

    public function chiTietMuaHang()
    {
        if (isset($_SESSION['user_clinet'])) {
            $tongDonHang = $this->TongDonHang();
            // Lấy ra thông tin tài khoản đăng nhập
            $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_clinet']);
            $tai_khoan_id = $user['id'];

            // Lấy id đơn hàng truyền từ url
            $donHangId = $_GET['id'];

            // Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            // Lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getAllPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // Lấy ra thông tin đơn hàng theo id
            $donHang = $this->modelDonHang->getDonHangById($donHangId);
         
            // Lấy thông tin sản phẩm của đơn hàng trong bảng chi tiết đơn hàng
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);
            // echo '<pre>';
            //     var_dump($chiTietDonHang);die();
            // echo '</pre>';

            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền truy cập đơn hàng này";
                exit;
            }
            require_once "./views/chiTietMuaHang.php";
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }

    public function huyDonHang()
    {
        if (isset($_SESSION['user_clinet'])) {
            // Lấy ra thông tin tài khoản đăng nhập
            $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_clinet']);
            $tai_khoan_id = $user['id'];

            // Lấy id đơn hàng truyền từ url
            $donHangId = $_GET['id'];

            // Kiểm tra đơn hàng
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            // Hủy đơn hàng
            $this->modelDonHang->updateTrangThaiDonHang($donHangId,11);

            header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
            exit();
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }

    public function guiBinhLuan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_SESSION['user_clinet'])) {
            // var_dump($_SESSION['user_client']);die();
            // var_dump($_POST);die();

            $tai_khoan_id = $_SESSION['user_client_id'];
            $noi_dung = $_POST['noi_dung'] ?? '';
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            $ngay_dang = date('Y-m-d H:i:s');
            $status = $this->modelTaiKhoan->binhLuan($tai_khoan_id, $san_pham_id, $noi_dung, $ngay_dang);
            // var_dump($status);die();
            if ($status) {
                $_SESSION['success_message'] = 'Bình luận của bạn đã được gửi thành công.';
            } else {
                $_SESSION['error_message'] = 'Có lỗi xảy ra. Vui lòng thử lại.';
            }
            header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }

    public function tongDonHang()
    {
        if (isset($_SESSION['user_clinet'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_clinet']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
            }

            $chiTietGioHang = $this->modelGioHang->getDeltailGioHang($gioHang['id']);

            return count($chiTietGioHang);
        } 
    }
}