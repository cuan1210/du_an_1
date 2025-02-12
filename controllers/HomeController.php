<?php
require_once('./models/taiKhoan.php');

class HomeController
{
  public $modelSanPham;
  public $danhMuc;
  public $modelTaiKhoan;
  public $modelGioHang;

  public function __construct()
  {
    $this->modelSanPham = new AdminSanPham();
    $this->danhMuc = new AdminDanhMuc();
    $this->modelTaiKhoan = new AdminTaiKhoan();
    $this->modelGioHang = new AdminGioHang();
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
    $listDanhMuc = $this->danhMuc->getAllDanhMuc();

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
                $_SESSION['user_id'] = $user['id'];
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
            var_dump('Bạn chưa đăng nhập');die();
        }
      }  
    }

    public function gioHang() {
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
           
            require_once './views/gioHang.php';
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';
            // var_dump($_SESSION['message']);die();

            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }
}